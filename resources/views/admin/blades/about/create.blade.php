@extends('admin.core.admin')
@section('content')
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Sobre</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Sobre</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <form action="{{route('admin.dashboard.about.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6">        
                            <div class="mb-3 col-12">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Digite o título">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="subtitle" class="form-label">Subtítulo</label>
                                <input type="text" name="subtitle" class="form-control" id="subtitle" placeholder="Digite o Subtítulo">
                            </div>
                            <div class="mb-3">
                                <label for="btn_link" class="form-label">Link </label>
                                <input type="text" name="btn_link" class="form-control" id="btn_link" placeholder="Link">
                            </div>
                            <div class="mb-3">
                                <label for="title_button" class="form-label">Título do botão </label>
                                <input type="text" name="title_button" class="form-control" placeholder="Título do botão">
                            </div>
                            
                            <div class="mb-3 col-12 d-flex align-items-start flex-column">
                                <label for="textarea-create" class="form-label">Texto</label>
                                <textarea name="text" class="form-control col-12" id="textarea-create" rows="5"></textarea>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input name="active" type="checkbox" class="form-check-input" id="invalidCheck{{isset($about->id)?$about->id:''}}" />
                                    <label class="form-check-label" for="invalidCheck">{{__('dashboard.active')}}?</label>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mt-3">
                                        <label for="path_image" class="form-label">Imagem</label>
                                        <input type="file" name="path_image" data-plugins="dropify" />
                                        <p class="text-muted text-center mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
                                    </div>
                                </div>
                            </div>                            
                            @if(Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                                Auth::user()->hasRole('Super') || Auth::user()->hasPermissionTo('sobre nos.visualizar') && Auth::user()->hasPermissionTo('sobre nos.criar'))
                                <div class="d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">{{__('dashboard.btn_cancel')}}</button>
                                    <button type="submit" class="btn btn-primary text-black waves-effect waves-light">{{__('dashboard.btn_create')}}</button>
                                </div>  
                            @endif                                               
                        </div>
                    </div>
                </form> 
            </div> <!-- fecha a row aberta -->

        </div> <!-- fecha container-fluid -->
    </div> <!-- fecha content -->
</div> <!-- fecha content-page -->

<script>
    // Inicializa o CKEditor para o textarea de criação
    CKEDITOR.replace('textarea-create', {
        allowedContent: true,
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript'] },
            { name: 'paragraph', items: [
                'NumberedList', 'BulletedList', '-', 
                'Outdent', 'Indent', '-', 
                'Blockquote', '-', 
                'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'
            ] },
            { name: 'links', items: ['Link', 'Unlink'] },
            { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] },
            { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'tools', items: ['Maximize'] }
        ],
        filebrowserUploadUrl: "{{ route('admin.dashboard.about.uploadImageCkeditorAbout') }}",
        fileTools_requestHeaders: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

</script>
@endsection