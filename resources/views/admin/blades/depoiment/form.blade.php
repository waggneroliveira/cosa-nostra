<div class="row g-3">
    <div class="mb-3 col-12">
        <label for="title" class="form-label">Título</label>
        <input 
            type="text" 
            name="title" 
            class="form-control" 
            id="title{{ isset($depoiment->id) ? $depoiment->id : '' }}" 
            value="{{ isset($depoiment) ? $depoiment->title : '' }}" 
            placeholder="Nome"
        >
    </div>
</div>
<div class="row g-3">
    <div class="mb-3 col-12">
        <label for="details" class="form-label">Tempo como cliente</label>
        <input 
            type="text" 
            name="details" 
            class="form-control" 
            id="details{{ isset($depoiment->id) ? $depoiment->id : '' }}" 
            value="{{ isset($depoiment) ? $depoiment->details : '' }}" 
            placeholder="Tempo como cliente"
        >
    </div>
</div>

<div class="row mb-3">
    <label for="text" class="form-label">texto</label>
    <textarea name="text" id="" cols="30" rows="10"></textarea>
</div>

<div class="mb-3 col-12">
    <div class="form-check">
        <input 
            name="active" 
            {{ isset($depoiment->active) && $depoiment->active == 1 ? 'checked' : '' }} 
            type="checkbox" 
            class="form-check-input" 
            id="invalidCheck{{ isset($depoiment->id) ? $depoiment->id : '' }}" 
        />
        <label class="form-check-label" for="invalidCheck{{ isset($depoiment->id) ? $depoiment->id : '' }}">
            {{ __('dashboard.active') }}?
        </label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
</div>
