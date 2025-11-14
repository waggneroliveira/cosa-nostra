<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::orderBy('date', 'ASC')->where('status', 'stand_by')->get();
        $reservationCounts = Reservation::orderBy('date', 'ASC')->where('status', 'confirmed')->get();
        
        // Horários do estabelecimento
        $horarios = [
            1 => ['12:00–15:30', '18:00–21:30'],
            2 => ['12:00–15:30', '18:00–21:30'],
            3 => ['12:00–15:30', '18:00–21:30'],
            4 => ['12:00–15:30', '18:00–21:30'],
            5 => ['12:00–15:30', '18:00–21:30'],
            6 => ['12:00–16:30', '18:00–21:30'],
            0 => ['12:00–16:30', '18:00–21:30']
        ];
        
        // Limites por local
        $limites = [
            'varanda' => 16,
            'interna' => 60
        ];
        
        // Array para armazenar a contagem por data, horário e local
        $contagemPorHorario = [];
            
        foreach ($reservationCounts as $reservation) {
            $data = $reservation->date;
            $horario = $reservation->time_hoursslot;
            $local = $reservation->location_area;
            $pessoas = $reservation->number_of_people;
            
            if (!array_key_exists($local, $limites)) {
                continue;
            }
            
            $chave = $data . '_' . $horario . '_' . $local;
            
            if (!isset($contagemPorHorario[$chave])) {
                $contagemPorHorario[$chave] = [
                    'data' => $data,
                    'horario' => $horario,
                    'local' => $local,
                    'total_pessoas' => 0,
                    'limite_atingido' => false,
                    'limite_maximo' => $limites[$local]
                ];
            }
            
            $contagemPorHorario[$chave]['total_pessoas'] += $pessoas;
            
            if ($contagemPorHorario[$chave]['total_pessoas'] >= $limites[$local]) {
                $contagemPorHorario[$chave]['limite_atingido'] = true;
            }
        }
        
        // ADICIONE ESTA PARTE: Verificar limite para cada reserva stand_by
        foreach ($reservations as $reservation) {
            $chaveReserva = $reservation->date . '_' . $reservation->time_hoursslot . '_' . $reservation->location_area;
            $reservation->limite_atingido = isset($contagemPorHorario[$chaveReserva]) && $contagemPorHorario[$chaveReserva]['limite_atingido'];
        }
        
        return view('admin.blades.reservation.index', compact('reservations', 'contagemPorHorario', 'limites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'name_complete' => 'required|string|min:3|max:255',
            'phone_whatsapp' => 'required|string|min:9|max:20',
            'email' => 'required|email|max:255',
            'number_of_people' => 'required|integer|min:1',
            'date' => 'required|date|after_or_equal:today',
            'hours' => 'required|string',
            'message' => 'nullable|string|max:1000',
            'location_area' => 'nullable|string|max:20',
        ], [
            'name_complete.required' => 'O nome completo é obrigatório.',
            'phone_whatsapp.required' => 'O telefone WhatsApp é obrigatório.',
            'number_of_people.required' => 'O número de pessoas é obrigatório.',
            'date.required' => 'A data é obrigatória.',
            'date.after_or_equal' => 'A data não pode ser retroativa.',
            'hours.required' => 'O horário é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'location_area.required' => 'O campo é obrigatório.'
        ]);


        try {
            DB::beginTransaction();

            Reservation::create([
                'name_complete' => $validated['name_complete'],
                'phone_whatsapp' => $validated['phone_whatsapp'],
                'number_of_people' => $validated['number_of_people'],
                'date' => $validated['date'],
                'location_area' => $validated['location_area'],
                'hours' => $validated['hours'],
                'email' => $validated['email'],
                'message' => $validated['message'],
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Solicitação enviada com sucesso!',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'error' => true,
                'message' => 'Ocorreu um erro ao cadastrar. Por favor, tente novamente.',
                'details' => $e->getMessage()
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
        } catch (\Exception $e) {
            DB::rollBack();
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
