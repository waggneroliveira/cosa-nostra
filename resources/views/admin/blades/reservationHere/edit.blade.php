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
                                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard.reservationHere.index')}}">Seção reserve aqui</a></li>
                                <li class="breadcrumb-item active">Editar Seção reserve aqui</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Seção reserve aqui</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <form action="{{ route('admin.dashboard.reservationHere.update', ['reservationHere' => $reservationHere->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('admin.blades.reservationHere.form')    
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">{{__('dashboard.btn_cancel')}}</button>
                        <button type="submit" class="btn btn-primary text-black waves-effect waves-light">{{__('dashboard.btn_save')}}</button>
                    </div>                                                                                                                                                                                            
                </form> 
            </div> <!-- fecha a row aberta -->

        </div> <!-- fecha container-fluid -->
    </div> <!-- fecha content -->
</div> <!-- fecha content-page -->
<style>
    .cke_chrome{
        width: 100%;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // Configuração personalizada do CKEditor
        const editorConfig = {
            toolbar: [
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', 'Blockquote'] },
                { name: 'links', items: ['Link', 'Unlink'] },
                { name: 'tools', items: ['Maximize'] },
                { name: 'document', items: ['Source'] }
            ],
            height: 200,
            removePlugins: 'elementspath',
            resize_enabled: false
        };
        
        // Inicializar CKEditor apenas na página de edição (não em modais)
        function initializePageEditors() {
            // Verificar se estamos em uma página de edição (não em modal)
            const isEditPage = document.querySelector('form[action*="edit"]') || 
                              window.location.pathname.includes('edit');
            
            if (isEditPage) {
                setTimeout(() => {
                    const eventElement = document.querySelector('textarea[name="event"]');
                    const benefitElement = document.querySelector('textarea[name="benefit"]');
                    
                    if (eventElement && typeof CKEDITOR !== 'undefined') {
                        // Destruir instâncias existentes primeiro
                        if (CKEDITOR.instances[eventElement.id]) {
                            CKEDITOR.instances[eventElement.id].destroy(true);
                        }
                        
                        // Inicializar editor de evento
                        CKEDITOR.replace(eventElement.id, editorConfig);
                    }
                    
                    if (benefitElement && typeof CKEDITOR !== 'undefined') {
                        // Destruir instâncias existentes primeiro
                        if (CKEDITOR.instances[benefitElement.id]) {
                            CKEDITOR.instances[benefitElement.id].destroy(true);
                        }
                        
                        // Inicializar editor de benefício com pequeno delay
                        setTimeout(() => {
                            CKEDITOR.replace(benefitElement.id, editorConfig);
                        }, 100);
                    }
                }, 100);
            }
        }
        
        // Inicializar os editores quando a página carregar
        initializePageEditors();
        
        // Se você precisar reinicializar em algum momento (ex: após AJAX)
        window.reinitializeCKEditors = function() {
            initializePageEditors();
        };
    });
</script>
@endsection    
