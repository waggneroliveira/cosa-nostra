<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Services\MessageSanitizer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Cache\RateLimiting\Limit;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $reservationQuery = Reservation::query();

        // ============================
        // 1 - FILTRO ESPECIAL: DUPLICADOS
        // ============================
        if ($request->duplicados == 1) {

            // Busca todos os registros stand_by ou confirmed
            $all = Reservation::whereIn('status', ['stand_by', 'confirmed'])->get();

            // Busca pares duplicados
            $gruposDuplicados = [];

            foreach ($all as $res) {

                $duplicados = Reservation::whereDate('date', $res->date)
                    ->where(function ($q) use ($res) {
                        $q->where('name_complete', $res->name_complete)
                        ->orWhere('email', $res->email);
                    })
                    ->where('id', '!=', $res->id)
                    ->whereIn('status', ['stand_by', 'confirmed'])
                    ->pluck('id')
                    ->toArray();

                if (!empty($duplicados)) {
                    // inclui o próprio no grupo
                    $duplicados[] = $res->id;
                    sort($duplicados);
                    $gruposDuplicados[] = $duplicados;
                }
            }

            // Remove grupos repetidos
            $gruposDuplicados = array_map("unserialize", array_unique(array_map("serialize", $gruposDuplicados)));

            // Junta todos IDs duplicados
            $idsDuplicados = [];
            foreach ($gruposDuplicados as $grupo) {
                $idsDuplicados = array_merge($idsDuplicados, $grupo);
            }
            $idsDuplicados = array_unique($idsDuplicados);

            // Busca todos os duplicados
            $reservations = Reservation::whereIn('id', $idsDuplicados)
                ->orderBy('date', 'ASC')
                ->get();

            // Marca duplicados
            foreach ($reservations as $r) {
                $r->duplicada = true;
            }

            $existeDuplicados = true;

            return view('admin.blades.reservation.index', compact('reservations', 'existeDuplicados'));
        }

        // ============================
        // 2 - FILTRAR NORMAL
        // ============================

        // Detecta se filtrou por nome ou email
        $filtrouNomeOuEmail = $request->filled('name_complete') || $request->filled('email');

        // ====================
        // STATUS
        // ====================
        if ($filtrouNomeOuEmail) {

            // Se filtrou nome ou email, só filtra status se o usuário escolheu explicitamente
            if ($request->filled('status')) {
                $reservationQuery->where('status', $request->status);
            }

        } else {

            // Caso NÃO tenha filtrado nome/email → segue regra normal
            if ($request->filled('status')) {
                $reservationQuery->where('status', $request->status);
            } else {
                $reservationQuery->where('status', 'stand_by');
            }
        }

        if ($request->filled('email')) {
            $reservationQuery->where('email', $request->email);
        }

        if ($request->filled('name_complete')) {
            $reservationQuery->where('name_complete', 'like', '%' . $request->name_complete . '%');
        }

        if ($request->filled('hours')) {
            $reservationQuery->where('hours', $request->hours);
        }

        if ($request->filled('date')) {
            $reservationQuery->whereDate('date', $request->date);
        }

        // Paginação
        $reservations = $reservationQuery
            ->orderBy('date', 'ASC')
            ->paginate(50)
            ->withQueryString();

        // ====================================
        // MARCA DUPLICADOS NA LISTAGEM NORMAL
        // ====================================
        foreach ($reservations as $reservation) {
            $duplicates = Reservation::whereDate('date', $reservation->date)
                ->where(function ($q) use ($reservation) {
                    $q->where('name_complete', $reservation->name_complete)
                    ->orWhere('email', $reservation->email);
                })
                ->where('id', '!=', $reservation->id)
                ->whereIn('status', ['stand_by', 'confirmed'])
                ->exists();

            $reservation->duplicada = $duplicates;
        }

        $existeDuplicados = $reservations->contains('duplicada', true);

        return view('admin.blades.reservation.index', compact('reservations', 'existeDuplicados'));
    }

    public function store(Request $request)
    {
        // =====================================
        // PROTEÇÃO CONTRA DDOS E RATE LIMITING
        // =====================================
        
        // Rate limiting por IP (máximo 10 tentativas por minuto)
        $ipKey = 'reservation_ip:' . $request->ip();
        if (RateLimiter::tooManyAttempts($ipKey, 10)) {
            $seconds = RateLimiter::availableIn($ipKey);
            return response()->json([
                'error' => true,
                'message' => 'Muitas tentativas. Tente novamente em ' . ceil($seconds / 60) . ' minutos.'
            ], 422);
        }
        RateLimiter::hit($ipKey, 60); // Expira em 1 minuto

        // Rate limiting por email (máximo 3 reservas por hora por email)
        $emailKey = 'reservation_email:' . $request->email;
        if (RateLimiter::tooManyAttempts($emailKey, 3)) {
            $seconds = RateLimiter::availableIn($emailKey);
            return response()->json([
                'errors' => [
                    'email' => ['Muitas solicitações com este email. Tente novamente em ' . ceil($seconds / 60) . ' minutos.']
                ]
            ], 422);
        }

        // Validação
        $validated = $request->validate([
            'name_complete'      => 'required|string|min:3|max:255',
            'phone_whatsapp'     => 'required|string|min:9|max:20',
            'email'              => 'required|email|max:255',
            'number_of_people'   => 'required|integer|min:1',
            'date'               => 'required|date|after_or_equal:today',
            'hours'              => 'required|string',
            'message'            => 'nullable|string|max:1000',
            'location_area'      => 'required|string|max:20',
        ]);

        // =====================================
        // VERIFICAÇÃO DE MÚLTIPLOS ENVIOS - POR EMAIL E TELEFONE
        // =====================================
        $recentSubmissions = Reservation::where(function($query) use ($validated) {
                $query->where('email', $validated['email'])
                    ->orWhere('phone_whatsapp', $validated['phone_whatsapp']);
            })
            ->where('created_at', '>=', now()->subHours(24)) // Últimas 24 horas
            ->count();

        if ($recentSubmissions >= 3) {
            return response()->json([
                'errors' => [
                    'email' => ['Você já atingiu o limite de 3 solicitações por dia. Tente novamente amanhã.']
                ]
            ], 422);
        }

        // =====================================
        // VERIFICAÇÃO DE RESERVA DUPLICADA (MESMO EMAIL/TELEFONE + DATA/HORA)
        // =====================================
        $duplicateReservation = Reservation::where(function($query) use ($validated) {
                $query->where('email', $validated['email'])
                    ->orWhere('phone_whatsapp', $validated['phone_whatsapp']);
            })
            ->where('date', $validated['date'])
            ->where('hours', $validated['hours'])
            ->where('created_at', '>=', now()->subHours(1)) // Última hora
            ->exists();

        if ($duplicateReservation) {
            return response()->json([
                'errors' => [
                    'email' => ['Você já possui uma reserva para esta data e horário. Aguarde pelo menos 1 hora para fazer nova solicitação.']
                ]
            ], 422);
        }

        // =====================================
        // TRATAMENTO DO CAMPO MESSAGE
        // =====================================
        if (!empty($validated['message'])) {
            $validated['message'] = MessageSanitizer::sanitize($validated['message']);
            
            if (empty(trim($validated['message']))) {
                return response()->json([
                    'errors' => [
                        'message' => ['A mensagem contém conteúdo não permitido.']
                    ]
                ], 422);
            }
        }

        // =====================================
        // VERIFICA SE O HORÁRIO JÁ PASSOU HOJE
        // =====================================
        $reservationDateTime = Carbon::parse("{$validated['date']} {$validated['hours']}");
        $now = Carbon::now();

        if ($reservationDateTime->isPast()) {
            return response()->json([
                'errors' => [
                    'hours' => ['O horário selecionado já passou. Escolha um horário válido.']
                ]
            ], 422);
        }

        try {
            DB::beginTransaction();

            // -----------------------------------------------
            // DEFINIR LIMITES POR ÁREA
            // -----------------------------------------------
            $limit = $validated['location_area'] === 'varanda' ? 16 : 60;

            // -----------------------------------------------
            // SOMA DE APROVADAS
            // -----------------------------------------------
            $approvedSum = Reservation::where('date', $validated['date'])
                ->where('hours', $validated['hours'])
                ->where('location_area', $validated['location_area'])
                ->where('status', 'confirmed')
                ->sum('number_of_people');

            // -----------------------------------------------
            // SOMA DE STAND_BY
            // -----------------------------------------------
            $standBySum = Reservation::where('date', $validated['date'])
                ->where('hours', $validated['hours'])
                ->where('location_area', $validated['location_area'])
                ->where('status', 'stand_by')
                ->sum('number_of_people');

            // -----------------------------------------------
            // CALCULAR OCUPAÇÃO TOTAL COM O QUE O CLIENTE PEDIU
            // -----------------------------------------------
            $totalOcupado = $approvedSum + $standBySum + $validated['number_of_people'];

            if ($totalOcupado > $limit) {
                $restante = $limit - ($approvedSum + $standBySum);
                return response()->json([
                    'errors' => [
                        'number_of_people' => [
                            "Não é possível reservar {$validated['number_of_people']} pessoas. Restam apenas {$restante} vagas para esta área neste horário."
                        ]
                    ]
                ], 422);
            }

            // -----------------------------------------------
            // SE PASSOU NA VERIFICAÇÃO → CRIA COMO STAND_BY
            // -----------------------------------------------
            Reservation::create([
                'name_complete'    => $validated['name_complete'],
                'phone_whatsapp'   => $validated['phone_whatsapp'],
                'number_of_people' => $validated['number_of_people'],
                'date'             => $validated['date'],
                'location_area'    => $validated['location_area'],
                'hours'            => $validated['hours'],
                'email'            => $validated['email'],
                'message'          => $validated['message'] ?? '',
                'status'           => 'stand_by',
            ]);

            // Incrementa o rate limiting por email após sucesso
            RateLimiter::hit($emailKey, 3600); // 1 hora

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Solicitação enviada com sucesso!',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'error'    => true,
                'message'  => 'Ocorreu um erro ao cadastrar. Por favor, tente novamente.',
                'details'  => $e->getMessage()
            ], 500);
        }
    }
    
    public function confirmed(Request $request, Reservation $reservation)
    {
        try {
            DB::beginTransaction();
            
            $reservation->status = 'confirmed';
            $reservation->save();
            
            DB::commit();
            
            return redirect()->back()->with('success', 'Reserva confirmada com sucesso!');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao confirmar reserva: ' . $e->getMessage());
        }
    }
    public function canceled(Request $request, Reservation $reservation)
    {
        try {
            DB::beginTransaction();
                $reservation->update([
                    'status' => 'canceled',
                ]);
            DB::commit();
            return redirect()->back()->with('success', 'Reserva cancelada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cancelar reserva: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
