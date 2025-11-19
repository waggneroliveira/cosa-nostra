@extends('admin.core.admin')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
            
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">{{__('dashboard.title_dashboard')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('dashboard.title_dashboard')}}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @if (Auth::user()->hasRole('Super') || 
    Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
    Auth::user()->hasPermissionTo('slide.visualizar') || 
    Auth::user()->hasPermissionTo('reservas.visualizar') || 
    Auth::user()->hasPermissionTo('newsletter.visualizar') || 
    Auth::user()->hasPermissionTo('contato.visualizar') || 
    Auth::user()->hasPermissionTo('lead contato.visualizar') || 
    Auth::user()->hasPermissionTo('horario de funcionamento.visualizar') || 
    Auth::user()->hasPermissionTo('sobre nos.visualizar') || 
    Auth::user()->hasPermissionTo('servicos.visualizar') || 
    Auth::user()->hasPermissionTo('secao servicos.visualizar') || 
    Auth::user()->hasPermissionTo('estatistica do sobre.visualizar') || 
    Auth::user()->hasPermissionTo('galeria.visualizar') || 
    Auth::user()->hasPermissionTo('secao depoimento.visualizar') || 
    Auth::user()->hasPermissionTo('depoimentos.visualizar') || 
    Auth::user()->hasPermissionTo('secao reserve aqui.visualizar') || 
    Auth::user()->hasPermissionTo('topicos.visualizar'))
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title "><i class="mdi mdi-home"></i> Home</h4>
                </div>
            </div>
            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
            Auth::user()->hasPermissionTo('slide.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.slide.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-image font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Slides</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
            Auth::user()->hasPermissionTo('topicos.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.topic.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-format-list-bulleted font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Tópicos</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
            Auth::user()->hasPermissionTo('sobre nos.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.about.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-information font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Sobre Nós</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
            Auth::user()->hasPermissionTo('estatistica do sobre.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.unionized.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-chart-bar font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Estatística do sobre</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
            Auth::user()->hasPermissionTo('secao servicos.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.statute.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-briefcase font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Seção Serviços</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
            Auth::user()->hasPermissionTo('servicos.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.direction.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-tools font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Serviços</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') ||
            Auth::user()->hasPermissionTo('galeria.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.benefitTopic.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-image-multiple font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Galeria</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') ||
            Auth::user()->hasPermissionTo('secao reserve aqui.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.reservationHere.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-calendar-check font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Seção reserve aqui</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') ||
            Auth::user()->hasPermissionTo('secao depoimento.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.report.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-message-text font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Informações Seção Depoimento</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') ||
            Auth::user()->hasPermissionTo('depoimentos.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.depoiment.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-account-voice font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Depoimentos</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
            Auth::user()->hasPermissionTo('reservas.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.reservation.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-bookmark-check font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Reservas</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
            Auth::user()->hasPermissionTo('contato.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.contact.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-contacts font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Contato</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
            Auth::user()->hasPermissionTo('lead contato.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.formIndex.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-account-box-outline font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Lead Contato</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
            Auth::user()->hasPermissionTo('newsletter.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.newsletter.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-email-newsletter font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Newsletter</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
            Auth::user()->hasPermissionTo('horario de funcionamento.visualizar'))            
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.noticies.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-clock-outline font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Horários de Funcionamento</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif
        </div>
    @endif      
        
    @if (Auth::user()->hasRole('Super') || 
    Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
    Auth::user()->hasPermissionTo('noticias.visualizar') || 
    Auth::user()->hasPermissionTo('categorias do noticias.visualizar'))      
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title "><i class="mdi mdi-newspaper-variant"></i> Notícias</h4>
                </div>
            </div>
            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
            Auth::user()->hasPermissionTo('categorias do noticias.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.blogCategory.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-tag-multiple font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Categorias das Notícias</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || 
            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
            Auth::user()->hasPermissionTo('noticias.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.blog.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-newspaper font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">Notícias</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif
        </div>
    @endif

    <div class="row">
        @if (Auth::user()->hasRole('Super') || 
        Auth::user()->can('usuario.tornar usuario master') || 
        Auth::user()->can('email.visualizar'))
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title "><i class="mdi mdi-email-edit"></i> {{__('dashboard.setting_smtp')}}</h4>
                </div>
            </div>
            <div class="col-md-5 col-xl-3">
                <div class="card borda-cx ratio ratio-4x3 border-whi">
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="{{route('admin.dashboard.settingEmail.index')}}">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <div class="avatar-xl bg-hoom rounded-circle text-center">
                                        <i class="avatar-md mdi mdi-email-send font-48 text-muted"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 col-12 text-center">
                                <h5 class="text-uppercase text-muted">{{__('dashboard.setting_email')}}</h5>
                            </div>
                        </a>
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col -->
        @endif
    </div>

    <div class="row">
        @if (Auth::user()->hasRole('Super') || 
        Auth::user()->can('usuario.tornar usuario master') || 
        Auth::user()->can('auditoria.visualizar') || 
        Auth::user()->can('usuario.visualizar')|| 
        Auth::user()->can('grupo.visualizar'))
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title "><i class="mdi mdi-shield-account"></i> {{__('dashboard.security_and_access_control')}}</h4>
                </div>
            </div>
            @if (Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can('auditoria.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.audit.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-clipboard-text font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">{{__('dashboard.audit')}}</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif
            
            @if (Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can('grupo.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.group.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="mdi mdi-account-group font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">{{__('dashboard.group_and_permission')}}</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif

            @if (Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can('usuario.visualizar'))
                <div class="col-md-5 col-xl-3">
                    <div class="card borda-cx ratio ratio-4x3 border-whi">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{route('admin.dashboard.user.index')}}">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <div class="avatar-xl bg-hoom rounded-circle text-center">
                                            <i class="avatar-md mdi mdi-account-multiple font-48 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-12 text-center">
                                    <h5 class="text-uppercase text-muted">{{__('dashboard.users')}}</h5>
                                </div>
                            </a>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            @endif
        @endif
    </div>
    <!-- end row -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div><a href="https://www.whi.dev.br/" target="_blank" style="color:#94a0ad;"><script>document.write(new Date().getFullYear())</script> © WHI - Web de Alta Inspiração</a></div>
                </div>
                <div class="col-md-6">
                    <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end footer-links">
                        <a href="https://www.whi.dev.br/" target="_blank" rel="noopener noreferrer">Sobre a WHI</a>
                        <a href="https://wa.me/5571992768360" target="_blank" rel="noopener noreferrer">Fale conosco</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @include('admin.loadPage.loading')
    <!-- end Footer -->
@endsection