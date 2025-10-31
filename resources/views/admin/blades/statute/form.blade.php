<div class="row g-3">
    <div class="mb-3 col-12">
        <label for="title" class="form-label">Título</label>
        <input 
            type="text" 
            name="title" 
            class="form-control" 
            id="title{{ isset($statute->id) ? $statute->id : '' }}" 
            value="{{ isset($statute) ? $statute->title : '' }}" 
            placeholder="Título"
        >
    </div>
</div>
<div class="row g-3">
    <div class="mb-3 col-12">
        <label for="description" class="form-label">Subtitulo</label>
        <input 
            type="text" 
            name="description" 
            class="form-control" 
            id="description{{ isset($statute->id) ? $statute->id : '' }}" 
            value="{{ isset($statute) ? $statute->description : '' }}" 
            placeholder="Subtítulo"
        >
    </div>
</div>

<div class="mb-3 col-12">
    <label for="path_file" class="form-label">Imagem</label>
    <input 
        type="file" 
        name="path_file" 
        accept="image/*" 
        data-plugins="dropify" 
        data-default-file="{{ isset($statute) && $statute->path_file != '' ? url('storage/'.$statute->path_file) : '' }}" 
        class="form-control"
    />
    <p class="text-muted text-center mt-2 mb-0">
        {{ __('dashboard.text_img_size') }} <b class="text-danger">3 MB</b>.
    </p>
</div>

<div class="mb-3 col-12">
    <div class="form-check">
        <input 
            name="active" 
            {{ isset($statute->active) && $statute->active == 1 ? 'checked' : '' }} 
            type="checkbox" 
            class="form-check-input" 
            id="invalidCheck{{ isset($statute->id) ? $statute->id : '' }}" 
        />
        <label class="form-check-label" for="invalidCheck{{ isset($statute->id) ? $statute->id : '' }}">
            {{ __('dashboard.active') }}?
        </label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
</div>
