<div class="row g-3">
    <div class="mb-3 col-12 col-md-6">
        <label for="title" class="form-label">Dia(s)</label>
        <input 
            type="text" 
            name="title" 
            class="form-control" 
            id="title{{ isset($noticie->id) ? $noticie->id : '' }}" 
            value="{{ isset($noticie) ? $noticie->title : '' }}" 
            placeholder="Dia(s)"
        >
    </div>
    <div class="mb-3 col-12 col-md-6">
        <label for="hours" class="form-label">Horário de funcionamento</label>
        <input 
            type="text" 
            name="hours" 
            class="form-control" 
            id="hours{{ isset($noticie->id) ? $noticie->id : '' }}" 
            value="{{ isset($noticie) ? $noticie->hours : '' }}" 
            placeholder="Horário de funcionamento"
        >
    </div>    
</div>

<div class="mb-3 col-12">
    <div class="form-check">
        <input 
            name="active" 
            {{ isset($noticie->active) && $noticie->active == 1 ? 'checked' : '' }} 
            type="checkbox" 
            class="form-check-input" 
            id="invalidCheck{{ isset($noticie->id) ? $noticie->id : '' }}" 
        />
        <label class="form-check-label" for="invalidCheck{{ isset($noticie->id) ? $noticie->id : '' }}">
            {{ __('dashboard.active') }}?
        </label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
</div>
