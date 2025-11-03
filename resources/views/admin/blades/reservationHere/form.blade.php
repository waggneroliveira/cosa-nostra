<div class="row g-3">
    <div class="mb-3 col-7">
        <label for="title" class="form-label">Título</label>
        <input 
            type="text" 
            name="title" 
            class="form-control" 
            id="title{{ isset($reservationHere->id) ? $reservationHere->id : '' }}" 
            value="{{ isset($reservationHere) ? $reservationHere->title : '' }}" 
            placeholder="Nome"
        >
    </div>
    <div class="mb-3 col-5">
        <label for="subtitle" class="form-label">Subtitulo</label>
        <input 
            type="text" 
            name="subtitle" 
            class="form-control" 
            id="subtitle{{ isset($reservationHere->id) ? $reservationHere->id : '' }}" 
            value="{{ isset($reservationHere) ? $reservationHere->subtitle : '' }}" 
            placeholder="Tempo como cliente"
        >
    </div>
</div>

<div class="row g-3">
    <div class="mb-3 col-12">
        <label for="link" class="form-label">Link do vídeo</label>
        <input 
            type="text" 
            name="link" 
            class="form-control" 
            id="link{{ isset($reservationHere->id) ? $reservationHere->id : '' }}" 
            value="{{ isset($reservationHere) ? $reservationHere->link : '' }}" 
            placeholder="Tempo como cliente"
        >
    </div>
</div>

<div class="mb-3 col-12 d-flex align-items-start flex-column">
    <label for="textarea-event-{{ isset($reservationHere->id) ? $reservationHere->id : 'create' }}" class="form-label">Evento</label>
    <textarea name="event" class="form-control col-12 ckeditor-textarea" id="textarea-event-{{ isset($reservationHere->id) ? $reservationHere->id : 'create' }}" rows="5">
        {!! isset($reservationHere) ? $reservationHere->event : '' !!}
    </textarea>
</div>

<div class="mb-3 col-12 d-flex align-items-start flex-column">
    <label for="textarea-benefit-{{ isset($reservationHere->id) ? $reservationHere->id : 'create' }}" class="form-label">Benefícios</label>
    <textarea name="benefit" class="form-control col-12 ckeditor-textarea" id="textarea-benefit-{{ isset($reservationHere->id) ? $reservationHere->id : 'create' }}" rows="5">
        {!! isset($reservationHere) ? $reservationHere->benefit : '' !!}
    </textarea>
</div>

<div class="mb-3 col-12">
    <div class="form-check">
        <input 
            name="active" 
            {{ isset($reservationHere->active) && $reservationHere->active == 1 ? 'checked' : '' }} 
            type="checkbox" 
            class="form-check-input" 
            id="invalidCheck{{ isset($reservationHere->id) ? $reservationHere->id : '' }}" 
        />
        <label class="form-check-label" for="invalidCheck{{ isset($reservationHere->id) ? $reservationHere->id : '' }}">
            {{ __('dashboard.active') }}?
        </label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
</div>
