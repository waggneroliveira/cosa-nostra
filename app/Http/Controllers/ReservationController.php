<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
