@php
    $statusNames = [
        'stand_by'  => 'Aguardando Resposta',
        'confirmed' => 'Confirmado',
        'canceled'  => 'Cancelado',
    ];
@endphp

<div class="row g-3">

    <div class="col-12 col-lg-7">
        <label class="form-label">Nome completo</label>
        <input type="text" class="form-control"
               value="{{ isset($reservation->name_complete) ? $reservation->name_complete : '' }}"
               readonly>
    </div>

    <div class="col-12 col-lg-5">
        <label class="form-label">WhatsApp</label>
        <input type="text" class="form-control"
               value="{{ isset($reservation->phone_whatsapp) ? $reservation->phone_whatsapp : '' }}"
               readonly>
    </div>
    
    <div class="col-12 col-lg-5">
        <label class="form-label">E-mail</label>
        <input type="text" class="form-control"
                value="{{ isset($reservation->email) ? $reservation->email : '' }}"
                readonly>
    </div>

    <div class="col-12 col-lg-3">
        <label class="form-label">Número de pessoas</label>
        <input type="number" class="form-control"
                value="{{ isset($reservation->number_of_people) ? $reservation->number_of_people : '' }}"
                readonly>
    </div>
    
    <div class="col-12 col-lg-4">
        <label class="form-label">Status</label>
        <input type="text" class="form-control"
            value="{{ isset($reservation) ? $statusNames[$reservation->status] ?? '' : ''}}"
            readonly>
    </div>
    
    <div class="col-12 col-lg-4">
        <label class="form-label">Data para agendamento</label>
        <input type="text" class="form-control"
            value="{{ isset($reservation->date) ? \Carbon\Carbon::parse($reservation->date)->format('d/m/Y') : '' }}"
            readonly>
    </div>

    <div class="col-12 col-lg-3">
        <label class="form-label">Horário</label>
        <input type="text" class="form-control"
               value="{{ isset($reservation->hours) ? $reservation->hours : '' }}"
               readonly>
    </div>

    <div class="col-12 col-lg-5">
        <label class="form-label">Área reservada</label>
        <input type="text" class="form-control"
                value="{{ isset($reservation) ? $reservation->location_area : '' }}"
                readonly>
    </div>

    <div class="col-12">
        <label class="form-label">Mensagem</label>
        <textarea class="form-control" rows="4" readonly>{{ isset($reservation->message) ? $reservation->message : '' }}</textarea>
    </div>

</div>
