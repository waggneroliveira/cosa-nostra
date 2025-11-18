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
                                    <li class="breadcrumb-item active">Seção reserve aqui</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Seção reserve aqui</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-12 d-flex justify-end">
                                        <div class="col-12 d-flex justify-content-end">
                                            @if (Auth::user()->can('secao reserve aqui.visualizar') &&
                                            Auth::user()->can('secao reserve aqui.criar') ||
                                            Auth::user()->can('usuario.tornar usuario master') || 
                                            Auth::user()->hasRole('Super'))
                                                @if (!isset($reservationHere))                                                    
                                                    <button type="button" class="btn btn-primary text-black waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#reservationHere-create"><i class="mdi mdi-plus-circle me-1"></i> {{__('dashboard.btn_create')}}</button>
                                                @endif
                                                <!-- Modal -->
                                                <div class="modal fade" id="reservationHere-create" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" style="max-width: 980px;">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-light">
                                                                <h4 class="modal-title" id="myCenterModalLabel">{{__('dashboard.btn_create')}}</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                            </div>
                                                            <div class="modal-body p-2 px-3 px-md-4">
                                                                <form action="{{ route('admin.dashboard.reservationHere.store') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @include('admin.blades.reservationHere.form')  
                                                                    <div class="d-flex justify-content-end gap-2">
                                                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">{{__('dashboard.btn_cancel')}}</button>
                                                                        <button type="submit" class="btn btn-primary text-black waves-effect waves-light">{{__('dashboard.btn_create')}}</button>
                                                                    </div> 
                                                                </form>
                                                            </div>

                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                                                  
                                <div class="table-responsive">
                                    <table class="table-sortable table table-centered table-nowrap table-striped">
                                        <thead>
                                            <tr>
                                                {{-- <th></th> --}}
                                                <th class="bs-checkbox">
                                                    <label><input name="btnSelectAll" type="checkbox"></label>
                                                </th>
                                                {{-- <th>Link</th> --}}
                                                <th>Título</th>
                                                <th>Status</th>
                                                <th style="width: 85px;">Ações</th>
                                            </tr>
                                        </thead>
                                        @if (isset($reservationHere))                                            
                                            <tbody>                                                
                                                <tr>
                                                    {{-- <td><span class="btnDrag mdi mdi-drag-horizontal font-22"></span></td> --}}
                                                    <td class="bs-checkbox">
                                                        <label><input data-index="" name="btnSelectItem" class="btnSelectItem" type="checkbox" value=""></label>
                                                    </td>
                                                    <td>{{$reservationHere->title}}</td>
                                                    <td>
                                                        @switch($reservationHere->active)
                                                            @case(0) <span class="badge bg-danger">Inativo</span> @break
                                                            @case(1) <span class="badge bg-success">Ativo</span> @break
                                                        @endswitch
                                                    </td>
                                                    <td class="d-flex gap-lg-1 justify-center">
                                                        @if (Auth::user()->can('secao reserve aqui.visualizar') &&
                                                        Auth::user()->can('secao reserve aqui.editar') ||
                                                        Auth::user()->can('usuario.tornar usuario master') || 
                                                        Auth::user()->hasRole('Super'))
                                                        <a href="{{route('admin.dashboard.reservationHere.edit', ['reservationHere' => $reservationHere->id])}}" class="table-edit-button btn btn-primary text-black" style="padding: 2px 8px;width: 30px"><span class="mdi mdi-pencil"></span></a>
                                                        @endif

                                                        @if (Auth::user()->can('secao reserve aqui.visualizar') &&
                                                        Auth::user()->can('secao reserve aqui.remover') ||
                                                        Auth::user()->can('usuario.tornar usuario master') || 
                                                        Auth::user()->hasRole('Super'))
                                                            <form action="{{route('admin.dashboard.reservationHere.destroy',['reservationHere' => $reservationHere->id])}}" style="width: 30px" method="POST">
                                                                @method('DELETE') @csrf        
                                                                
                                                                <button type="button" style="width: 30px"class="demo-delete-row btn btn-danger btn-xs btn-icon btSubmitDeleteItem"><i class="fa fa-times"></i></button>
                                                            </form>                                                    
                                                        @endif
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        @endif
                                    </table>
                                </div>                                

                                {{-- PAGINATION --}}
                                <div class="mt-3 float-end">
                                   {{-- {{$reservationHere->links()}} --}}
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row -->
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
    <style>
        .cke_notification_warning{
            opacity: -1;
            z-index: -2;
        }
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
        
        function initializeCKEditor(modal) {
            setTimeout(() => {
                const eventElement = modal.querySelector('textarea[name="event"]');
                const benefitElement = modal.querySelector('textarea[name="benefit"]');
                
                if (eventElement && benefitElement) {
                    // NÃO remover o style - deixe o CKEditor cuidar da exibição
                    // eventElement.removeAttribute('style');
                    // benefitElement.removeAttribute('style');
                    
                    if (typeof CKEDITOR !== 'undefined') {
                        // Destruir instâncias existentes primeiro
                        if (CKEDITOR.instances[eventElement.id]) {
                            CKEDITOR.instances[eventElement.id].destroy(true);
                        }
                        if (CKEDITOR.instances[benefitElement.id]) {
                            CKEDITOR.instances[benefitElement.id].destroy(true);
                        }
                        
                        // Inicializar editores
                        CKEDITOR.replace(eventElement.id, editorConfig);
                        
                        setTimeout(() => {
                            CKEDITOR.replace(benefitElement.id, editorConfig);
                        }, 100);
                    }
                }
            }, 100);
        }
        
        function destroyCKEditor(modal) {
            const eventElement = modal.querySelector('textarea[name="event"]');
            const benefitElement = modal.querySelector('textarea[name="benefit"]');
            
            [eventElement, benefitElement].forEach(element => {
                if (element && element.id && CKEDITOR.instances[element.id]) {
                    CKEDITOR.instances[element.id].destroy(true);
                }
            });
        }
        
        // Configurar modais
        const createModal = document.getElementById('reservationHere-create');
        if (createModal) {
            createModal.addEventListener('shown.bs.modal', function() {
                initializeCKEditor(this);
            });
            createModal.addEventListener('hidden.bs.modal', function() {
                destroyCKEditor(this);
            });
        }
    });
</script>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🚀 Script CKEditor 4 carregado');
            
            function initializeCKEditor(modal) {
                console.log('🎯 Inicializando CKEditor 4 para modal:', modal.id);
                
                let attempts = 0;
                const maxAttempts = 10;
                
                function attemptInitialization() {
                    attempts++;
                    console.log(`🔄 Tentativa ${attempts} de encontrar os textareas...`);
                    
                    const eventElement = modal.querySelector('textarea[name="event"]');
                    const benefitElement = modal.querySelector('textarea[name="benefit"]');
                    
                    console.log('🔍 Event element:', eventElement);
                    console.log('🔍 Benefit element:', benefitElement);
                    
                    if (eventElement && benefitElement) {
                        console.log('✅ Elementos encontrados na tentativa', attempts);
                        
                        // Remover atributos de estilo que podem estar escondendo os elementos
                        eventElement.removeAttribute('style');
                        benefitElement.removeAttribute('style');
                        
                        // USAR CKEDITOR 4
                        if (typeof CKEDITOR !== 'undefined') {
                            console.log('📝 Usando CKEditor 4');
                            
                            // Destruir instâncias existentes primeiro (se houver)
                            if (eventElement.id && CKEDITOR.instances[eventElement.id]) {
                                CKEDITOR.instances[eventElement.id].destroy(true);
                                console.log('♻️ Instância anterior do EVENT destruída');
                            }
                            
                            if (benefitElement.id && CKEDITOR.instances[benefitElement.id]) {
                                CKEDITOR.instances[benefitElement.id].destroy(true);
                                console.log('♻️ Instância anterior do BENEFIT destruída');
                            }
                            
                            // Inicializar primeiro editor
                            if (eventElement.id) {
                                try {
                                    CKEDITOR.replace(eventElement.id);
                                    console.log('✅ Editor EVENT inicializado (CK4)');
                                } catch (error) {
                                    console.error('❌ Erro ao inicializar EVENT:', error);
                                }
                            }
                            
                            // Inicializar segundo editor com um pequeno delay
                            setTimeout(() => {
                                if (benefitElement.id) {
                                    try {
                                        CKEDITOR.replace(benefitElement.id);
                                        console.log('✅ Editor BENEFIT inicializado (CK4)');
                                    } catch (error) {
                                        console.error('❌ Erro ao inicializar BENEFIT:', error);
                                    }
                                }
                            }, 300);
                        } else {
                            console.error('❌ CKEDITOR não está definido');
                        }
                            
                        return true;
                    }
                    
                    if (attempts < maxAttempts) {
                        setTimeout(attemptInitialization, 200);
                    } else {
                        console.error('❌ Não foi possível encontrar os textareas após', maxAttempts, 'tentativas');
                    }
                    
                    return false;
                }
                
                setTimeout(attemptInitialization, 100);
            }
            
            // Função para destruir CKEditor quando modal fechar
            function destroyCKEditor(modal) {
                const eventElement = modal.querySelector('textarea[name="event"]');
                const benefitElement = modal.querySelector('textarea[name="benefit"]');
                
                if (eventElement && eventElement.id && CKEDITOR.instances[eventElement.id]) {
                    CKEDITOR.instances[eventElement.id].destroy(true);
                    console.log('🗑️ Editor EVENT destruído');
                }
                
                if (benefitElement && benefitElement.id && CKEDITOR.instances[benefitElement.id]) {
                    CKEDITOR.instances[benefitElement.id].destroy(true);
                    console.log('🗑️ Editor BENEFIT destruído');
                }
            }
            
            // Configurar para o modal de CREATE
            const createModal = document.getElementById('reservationHere-create');
            if (createModal) {
                createModal.addEventListener('shown.bs.modal', function() {
                    initializeCKEditor(this);
                });
                
                createModal.addEventListener('hidden.bs.modal', function() {
                    destroyCKEditor(this);
                });
            }
            
            // Configurar para todos os modais de EDIT
            document.querySelectorAll('[id^="modal-group-edit-"]').forEach(modal => {
                modal.addEventListener('shown.bs.modal', function() {
                    initializeCKEditor(this);
                });
                
                modal.addEventListener('hidden.bs.modal', function() {
                    destroyCKEditor(this);
                });
            });
        });
    </script> --}}
@endsection
