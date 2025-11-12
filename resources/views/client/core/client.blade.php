<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#0d0d0d">
    <meta name="description" content="Criação de sites, lojas virtuais e estratégias de marketing digital em Salvador. A WHI desenvolve soluções profissionais e personalizadas para o seu negócio crescer online.">
    <meta name="keywords" content="Agência de marketing Salvador, criação de sites Salvador, marketing digital, desenvolvimento web, loja virtual, SEO local, redes sociais, tráfego pago, Google Ads, branding, identidade visual, WHI">
    <title>WHI | Agência de Marketing Digital e Criação de Sites em Salvador</title>
    @if(isset($blogInner))
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="article">
        <meta property="og:title" content="{{ $blogInner->title }}">
        <meta property="og:description" content="{{ Str::limit(strip_tags($blogInner->text), 150) }}">
        <meta property="og:image" content="{{ asset('storage/' . $blogInner->path_image_thumbnail) }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url()->current() }}">
        <meta name="twitter:title" content="{{ $blogInner->title }}">
        <meta name="twitter:description" content="{{ Str::limit(strip_tags($blogInner->text), 150) }}">
        <meta name="twitter:image" content="{{ asset('storage/' . $blogInner->path_image_thumbnail) }}">
    @else
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="WHI | Agência de Marketing Digital e Criação de Sites em Salvador">
        <meta property="og:description" content="Soluções digitais completas em Salvador: sites profissionais, marketing de performance, identidade visual e presença online com a WHI.">
        <meta property="og:image" content="{{asset('build/client/images/compartilhamento.png')}}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url()->current() }}">
        <meta name="twitter:title" content="WHI | Agência de Marketing Digital e Criação de Sites em Salvador">
        <meta name="twitter:description" content="Soluções digitais completas em Salvador: sites profissionais, marketing de performance, identidade visual e presença online com a WHI.">
        <meta name="twitter:image" content="{{asset('build/client/images/compartilhamento.png')}}">
    @endif
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="copyright" content="Direitos reservados WHI">
    <meta name="author" content="WHI">
    <meta name="google-site-verification" content="kpN-gFJ5IGqEAXcdrwnTxAcJXZF-LsaP3bPwONwcvsY" />
    <link rel="shortcut icon" href="{{ asset('build/admin/images/favicon.png') }}">

    {{-- <link rel="preload" as="image" href="{{asset('build/client/images/bann-1.webp')}}"> --}}

    <!-- LOADING FONTS AND ICONS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/client/rev/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/client/rev/fonts/font-awesome/css/font-awesome.css') }}">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/client/rev/css/rs6.css') }}">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('build/client/fonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/client/fonts/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('build/client/fonts/ionicons/ionicons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/client/fonts/flaticons/flaticon.css') }}">

    <link rel="preload" href="{{ asset('build/admin/js/libs/sweetalert2/sweetalert2.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="{{ asset('build/admin/js/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"></noscript>
    <link rel="preload" href="{{ asset('build/admin/js/libs/dropzone/min/dropzone.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">  
    <noscript><link href="{{ asset('build/admin/js/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css"></noscript>
    <link rel="preload" href="{{ asset('build/admin/js/libs/dropify/css/dropify.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="{{ asset('build/admin/js/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css"></noscript>
    <link href="{{ asset('build/client/css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('build/client/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('build/client/css/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('build/client/css/animations.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('build/client/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('build/client/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('build/client/lgpd/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        
    <script defer src="https://cdn.userway.org/widget.js" data-account="qSpdtrySSt"></script>
    <link rel="preconnect" href="https://vlibras.gov.br" crossorigin>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6RXZ6TZT0V"></script>
    <script defer>
        function gtag() {
            dataLayer.push(arguments)
        }
        window.dataLayer = window.dataLayer || [], gtag("js", new Date), gtag("config", "G-6RXZ6TZT0V")
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "@id": "https://whi.dev.br/#organization",
            "name": "WHI",
            "legalName": "WHI Agência Digital",
            "url": "https://whi.dev.br",
            "logo": "https://whi.dev.br/assets/images/logo.png",
            "image": "https://whi.dev.br/assets/images/logo.png",
            "description": "Agência de desenvolvimento web e marketing digital em Salvador - Criação de sites, lojas virtuais e estratégias digitais personalizadas.",
            "foundingDate": "2023",
            "email": "contato@whi.dev.br",
            "telephone": "+55-71-99276-8360",
            "sameAs": [
                "https://www.instagram.com/agenciawhi",
                "https://www.linkedin.com/company/106948313"
            ],
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Rua Ápio Patrocínio, 148 - Boa Vista de São Caetano",
                "addressLocality": "Salvador",
                "addressRegion": "BA",
                "postalCode": "40386-050",
                "addressCountry": "BR"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+55-71-9276-8360",
                "contactType": "customer service",
                "email": "contato@whi.dev.br",
                "areaServed": "BR",
                "availableLanguage": ["Portuguese", "English"]
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday"
                ],
                "opens": "09:00",
                "closes": "18:00"
            },
            "duns": "39.985.136/0001-33",
            "slogan": "Web de Alta Inspiração",
            "keywords": [
                "Criação de sites",
                "Lojas virtuais",
                "Marketing digital",
                "Agência WHI",
                "Salvador",
                "Desenvolvimento Web",
                "Google Ads",
                "Tráfego pago",
                "SEO",
                "Agência de Desenvolvimento Web em Salvador",
                "WHI"
            ]
        }
    </script>
</head>
<body>
    <div id="organization" hidden></div>
    <!--Loading-->
    <div id="pq-loading">
        <div id="pq-loading-center">
            <img src="{{ asset('build/client/images/header-logo/logo_header.svg') }}" alt="loading">
        </div>
    </div>
    <!--Loading-->
    <!-- <header-start> -->
    <header id="pq-header" class="pq-header-default">
        <div class="pq-top-header">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-md-6 text-right">
                        <div class="pq-header-social text-right">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pq-header-contact ">
                            <ul class="d-flex gap-5 justify-content-start align-items-center">
                                <li>
                                    <a href="tel:+1800001658">
                                        <i class="fas fa-phone"></i>
                                        <span>+1800-001-658</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:peacefulqode@gmail.com">
                                        <i class="fas fa-envelope"></i>
                                        <span>peacefulqode@gmail.com</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pq-bottom-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand p-0" href="{{route("index")}}">
                                <img class="img-fluid logo" src="{{ asset('build/client/images/header-logo/logo_header.svg') }}" alt="millennium">
                            </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div id="pq-menu-contain" class="pq-menu-contain">
                                    <ul id="pq-main-menu" class="navbar-nav ml-auto">
                                        <li class="menu-item {{ request()->is('/') ? 'current-menu-item' : '' }}">
                                            <a href="{{ route('index') }}">Home</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ request()->is('/') ? '#about' : url('/') . '#about' }}">Quem Somos</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ request()->is('/') ? '#gallery' : url('/') . '#gallery' }}">Galeria</a>
                                        </li>
                                        <li class="menu-item {{ request()->is('blog') || request()->is('blog/*') ? 'current-menu-item' : '' }}">
                                            <a href="{{ route('blog') }}">Blog</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ request()->is('/') ? '#reservation' : url('/') . '#reservation' }}">Contato</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pq-menu-search-block">
                                <a href="javascript:void(0)" id="pq-seacrh-btn">
                                    <i class="ti-search"></i>
                                </a>
                                <div class="pq-search-form">
                                    <form role="search" method="get" class="search-form">
                                        <label>
                                            <span class="screen-reader-text">Search for:</span>
                                            <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                                        </label>
                                        <button class="search-submit">
                                            <span class="screen-reader-text">Search</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="pq-btn-container">
                                <a href="booking-table.html" class="pq-button">
                                    <div class="pq-button-block">
                                        <span class="pq-button-line-left"></span>
                                        <span class="pq-button-text text-black">Book a table</span>
                                        <span class="pq-button-line-right"></span>
                                    </div>
                                </a>
                            </div>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- <header-end> -->

    @include('client/includes/lgpd/lgpd')

    <a
        href="https://wa.me/555571992768360?text=Olá! Encontrei seu site e gostaria de conhecer mais sobre os planos disponíveis.%0A"
        class="whatsapp-float"
        aria-label="Fale conosco no WhatsApp"
        target="_blank"
        rel="noopener noreferrer"
        >
        <!-- Ícone SVG do WhatsApp -->
        <svg viewBox="0 0 32 32" aria-hidden="true">
            <path d="M19.11 17.27c-.23-.12-1.37-.67-1.58-.75-.21-.08-.36-.12-.52.12-.16.23-.6.74-.74.89-.14.15-.27.17-.5.06-.23-.12-.97-.36-1.85-1.12-.68-.6-1.14-1.34-1.27-1.57-.13-.23-.01-.35.1-.47.1-.1.23-.27.35-.4.12-.13.16-.23.24-.39.08-.16.04-.3-.02-.42-.06-.12-.52-1.25-.71-1.72-.19-.46-.38-.4-.52-.4h-.45c-.16 0-.42.06-.64.3-.22.23-.84.82-.84 2 0 1.18.86 2.32.98 2.48.12.16 1.69 2.58 4.1 3.61.57.25 1.01.4 1.35.52.57.18 1.1.16 1.52.1.46-.07 1.37-.56 1.57-1.1.19-.54.19-1 .13-1.1-.06-.1-.21-.16-.44-.27zM16 3.2c-7.06 0-12.8 5.73-12.8 12.8 0 2.26.61 4.36 1.67 6.17L3.2 28.8l6.78-1.6c1.74.95 3.74 1.5 5.87 1.5 7.07 0 12.8-5.73 12.8-12.8S23.07 3.2 16 3.2zm0 22.94c-1.98 0-3.81-.58-5.35-1.57l-.38-.24-4.02.95.95-3.92-.25-.4a10.58 10.58 0 0 1-1.64-5.62c0-5.86 4.77-10.62 10.63-10.62S26.62 9.38 26.62 15.24 21.86 26.14 16 26.14z"/>
        </svg>
    </a>
    <style>
        .whatsapp-float{
            position: fixed;
            bottom: 38.4%;
            right: 10px;
            transform: translateY(-30%);
            width: 43px;
            height: 43px;
            border-radius: 9999px;
            background: #25D366;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: 0 10px 25px rgba(0,0,0,.15);
            z-index: 9999;
            transition: transform .15s ease, filter .15s ease, box-shadow .15s ease;
        }
        .whatsapp-float svg{
            width: 32px;
            height: 32px;
            fill: #fff;
            display: block;
        }
        .whatsapp-float:hover{
            transform: translateY(-30%) scale(1.05);
            filter: brightness(1.05);
            box-shadow: 0 14px 32px rgba(0,0,0,.2);
        }

        /* Não mostrar na impressão */
        @media print{
            .whatsapp-float{ display: none; }
        }
        /* Respeita usuários com redução de movimento */
        @media (prefers-reduced-motion: reduce){
            .whatsapp-float{ transition: none; }
            .whatsapp-float:hover{ transform: translateY(-50%); }
        }
    </style>
    <!-- Modal de Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content header-color">

                <div class="modal-header green-color">
                    <h5 class="modal-title rethink-sans-bold font-22 text-p" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar" style="line-height: 15px; padding: 10px 8px 5px 8px;">X</button>
                </div>

                <div class="modal-body">
                    <form action="{{route('client.user.authenticate')}}" method="POST">
                        <!-- CSRF token (Laravel) -->
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label rethink-sans-bold font-15 text-black">E-mail</label>
                            <input type="email" class="form-control rethink-sans-regular font-15" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label rethink-sans-bold font-15 text-black">Senha</label>
                            <input type="password" class="form-control rethink-sans-regular font-15" id="password" name="password" required>
                        </div>

                        <div class="mb-4 col-12 col-lg-4 m-auto">
                            <button type="submit" class="mt-3 btn px-5 background-red rounded-0 text-black text-black rethink-sans-bold font-15">Entrar</button>
                        </div>

                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <p class="rethink-sans-regular font-15 text-black text-center">
                                Ainda não tem uma conta?
                                <a href="#" class="text-decoration-underline rethink-sans-bold ms-1 under" 
                                data-bs-dismiss="modal"
                                data-bs-toggle="modal"
                                data-bs-target="#registerModal">Registre-se</a>
                                aqui <br>
                                <a href="#" 
                                class="text-decoration-underline rethink-sans-bold ms-1 under" 
                                data-bs-dismiss="modal"
                                data-bs-toggle="modal"
                                data-bs-target="#forgotPasswordModal">
                                Esqueceu sua senha?
                                </a>
                            </p>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
    <!-- Modal de Cadastro -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content header-color">

                <div class="modal-header green-color">
                    <h5 class="modal-title rethink-sans-bold font-22 text-p" id="registerModalLabel">Cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar" style="line-height: 15px; padding: 10px 8px 5px 8px;">X</button>
                </div>

                <div class="modal-body">
                    <form action="{{route('register-client')}}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label rethink-sans-bold font-15 text-black">Nome</label>
                            <input type="text" class="form-control rethink-sans-regular font-15" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="emailRegister" class="form-label rethink-sans-bold font-15 text-black">E-mail</label>
                            <input type="email" class="form-control rethink-sans-regular font-15" id="emailRegister" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="passwordRegister" class="form-label rethink-sans-bold font-15 text-black">Senha</label>
                            <input type="password" class="form-control rethink-sans-regular font-15" id="passwordRegister" name="password" required>
                        </div>

                        <div class="col-12 col-lg-4 m-auto my-2">
                            <button type="submit" class="btn mt-3 px-4 background-red rounded-0 text-black rethink-sans-bold font-15">Cadastrar</button>
                        </div>

                        <div class="d-flex justify-content-center">
                            <p class="rethink-sans-regular font-15 text-black text-center">
                                Já tem uma conta?
                                <a href="#" class="text-decoration-underline rethink-sans-bold ms-1 under"
                                data-bs-dismiss="modal"
                                data-bs-toggle="modal"
                                data-bs-target="#loginModal">
                                Fazer login
                                </a>
                            </p>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    @if (Auth::guard('client')->check())
        @php
            $user = Auth::guard('client')->user();
            $defaultImage = $user && $user->path_image ? url('storage/'.$user->path_image) : '';
        @endphp
        <!-- Modal de Edição -->
        <div class="modal fade" id="editClientModal-{{Auth::guard('client')->user()->id}}" tabindex="-1" aria-labelledby="editClientModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content header-color">

                    <div class="modal-header green-color">
                        <h5 class="modal-title rethink-sans-bold font-22 text-p" id="editClientModalLabel">Editar Informações</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar" style="line-height: 15px; padding: 10px 8px 5px 8px;">X</button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('client.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label rethink-sans-bold font-15 text-black">Nome</label>
                                <input type="text" class="form-control rethink-sans-regular font-15" id="name" name="name" value="{{Auth::guard('client')->user()->name}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="emailRegister" class="form-label rethink-sans-bold font-15 text-black">E-mail</label>
                                <input type="email" class="form-control rethink-sans-regular font-15" id="emailRegister" name="email" value="{{Auth::guard('client')->user()->email}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="passwordRegister" class="form-label rethink-sans-bold font-15 text-black">Senha</label>
                                <input type="password" class="form-control rethink-sans-regular font-15" id="passwordRegister" name="password">
                            </div>
                            <div class="col-lg-12">
                                <div class="mt-3">
                                    <label for="title" class="form-label rethink-sans-regular font-15">Imagem de perfil </label>
                                    <input 
                                        type="file" 
                                        name="path_image" 
                                        data-plugins="dropify" 
                                        data-default-file="{{ $defaultImage }}" 
                                        class="mb-1"
                                    />
                                    <p class="rethink-sans-regular text-black font-12 mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn bg-light rounded-0 text-black rethink-sans-bold font-15" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn px-4 background-red rounded-0 text-black rethink-sans-bold font-15">Salvar alterações</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>        
        </div>
    @endif

    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content header-color">

                <div class="modal-header green-color">
                    <h5 class="modal-title rethink-sans-bold font-22 text-p" id="forgotPasswordModalLabel">
                        Recuperar Senha
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar" style="line-height: 15px; padding: 10px 8px 5px 8px;">X</button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('client.password.email') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="recover_email" class="form-label rethink-sans-bold font-15 text-black">Digite seu e-mail</label>
                            <input type="email" class="form-control rethink-sans-regular font-15" id="recover_email" name="email" required>
                        </div>

                        <div class="col-12 col-lg-9 m-auto mb-4">
                            <button type="submit" class="btn mt-3 px-5 background-red rounded-0 text-black rethink-sans-bold font-15">
                                Enviar link de recuperação
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <main>
        @yield('content') 
    </main>

    <!-- <footer-start> -->
    <footer id="pq-footer">
        <div class="pq-footer-style-1">
            <div class="pq-footer-top pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <img src="{{ asset('build/client/images/footer-logo/logo_header.svg') }}" class="pq-footer-logo" alt="Millennium-footer-logo">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget rhoncus consectetur enim.</p>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="pq-footer-social">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="footer">
                                <h4 class="footer-title">Use Full Link</h4>
                                <div class="menu-use-full-link-container">
                                    <ul id="menu-use-full-link" class="menu">
                                        <li class="menu-item">
                                            <a href="team-single.html">Team Signal</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="team-single.html">Contact Us</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="booking-table.html">Booking Table</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="our-kitchen.html">Our Kitchen</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="our-menu.html">Our Menu</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="our-team.html">Our team</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="about-us.html">About Us</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="faq.html">FAQ</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="footer footer-port-1">
                                <h4 class="footer-title">Contact Us</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="pq-contact">
                                            <li>
                                                <a href="tel:+1800001658">
                                                    <i class="fa fa-phone"></i>
                                                    <span>+1800-001-658</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="mailto:peacefulqode@gmail.com">
                                                    <i class="fa fa-envelope"></i>
                                                    <span>peacefulqode@gmail.com</span>
                                                </a>
                                            </li>
                                            <li>
                                                <i class="fa fa-map-marker"></i>
                                                <span>Themeforest, Envato HQ 24 Fifth st., Los Angeles, USA</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="footer opening-hours">
                                <h4 class="footer-title">Opening Hours</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="pq-time">
                                            <li>
                                                <span class="day">Mon - Tue</span>
                                                <span class="time">09.00 am - 10.00 pm</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="footer opening-hours">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="pq-time">
                                            <li>
                                                <span class="day">Wed - Thu</span>
                                                <span class="time">10.00am - 11.00pm</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="footer opening-hours">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="pq-time">
                                            <li>
                                                <span class="day">Sat</span>
                                                <span class="time">07.00am - 08.00pm</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="footer opening-hours">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="pq-time">
                                            <li>
                                                <span class="day">Sun</span>
                                                <span class="time">9:00 am - 8 Pm</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pq-copyright-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
                            <span class="pq-copyright">Copyright 2022 Millennium All Rights Reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- <footer-end> -->
    <!--Back To Top start-->
    <div id="back-to-top">
        <div class="top" id="top">
            <a id="pq-back-to-top" href="#" class="on">
                <span class="pq-icon-up">
                    <i class="ion-ios-arrow-up"></i>
                </span>
            </a>
        </div>
    </div>

{{-- <p id="footer-text"></p>
                    <script defer>
                        const currentYear = (new Date).getFullYear();
                        document.getElementById("footer-text").innerHTML = `WHI© ${currentYear} <span> todos os direitos reservados.</span>`
                    </script> --}}
        <!--jquery js-->
        <script src="{{ asset('build/client/js/jquery.min.js') }}"></script>
        <!--bootstrap js-->
        <script src="{{ asset('build/client/js/bootstrap.min.js') }}"></script>
        <!--owl-carousal-->
        <script src="{{ asset('build/client/js/owl.carousel.min.js') }}"></script>
        <!--countTo js-->
        <script src="{{ asset('build/client/js/jquery.countTo.min.js') }}"></script>
        <!--Maginfic-Popup js-->
        <script src="{{ asset('build/client/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Rev-Slider -->
        <script src="{{ asset('build/client/rev/js/rbtools.min.js') }}"></script>
        <script src="{{ asset('build/client/rev/js/rs6.min.js') }}"></script>
        <script src="{{ asset('build/client/js/rev-custom.js') }}"></script>
        <!--Map-chart js-->
        <script src="{{ asset('build/client/js/am-charts-core.js') }}"></script>
        <script src="{{ asset('build/client/js/am-charts-maps.js') }}"></script>
        <script src="{{ asset('build/client/js/am-charts-worldlow.js') }}"></script>
        <script src="{{ asset('build/client/js/am-charts-animated.js') }}"></script>
        <script src="{{ asset('build/client/js/map-chart.js') }}"></script>
        <!--custom js-->
        <script src="{{ asset('build/client/js/custom.js') }}"></script>
        <script>
        $(document).ready(function() {
            $('.gallery').magnificPopup({
                delegate: 'a', // pega apenas os links dentro do .gallery
                type: 'image',
                gallery: {
                    enabled: true, // ativa navegação entre as imagens
                    preload: [0,1] // pré-carrega anterior e próxima
                }
            });
        });
        </script>

    </body>
    <script>
        'undefined' === typeof _trfq || (window._trfq = []);
        'undefined' === typeof _trfd && (window._trfd = []),
        _trfd.push({
            'tccl.baseHost': 'secureserver.net'
        }, {
            'ap': 'cpbh-mt'
        }, {
            'server': 'sg2plmcpnl492384'
        }, {
            'dcenter': 'sg2'
        }, {
            'cp_id': '9858662'
        }, {
            'cp_cache': ''
        }, {
            'cp_cl': '8'
        })
        // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.
    </script>
    <script src='https://img1.wsimg.com/traffic-assets/js/tccl.min.js'></script>

    <script src="https://cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('build/admin/js/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('build/admin/js/libs/dropzone/min/dropzone.min.js') }}"></script>
    @if($temDropify ?? false)
        <script src="{{ asset('build/admin/js/libs/dropify/js/dropify.min.js') }}"></script>
        <script src="{{ asset('build/admin/js/pages/form-fileuploads.init.js') }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                $(".dropify").dropify();
            });
        </script>
    @endif
    <script src="{{ asset('build/client/lgpd/script.js') }}"></script>
    <script>
        const starUrl = "{{ asset('build/client/images/star.svg') }}";
    </script>
    {{-- <script src="{{ asset('build/client/js/default.js') }}"></script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuItems = document.querySelectorAll('#pq-main-menu .menu-item');

            menuItems.forEach(item => {
                const link = item.querySelector('a');
                link.addEventListener('click', () => {
                    // Remove a classe de todos
                    menuItems.forEach(i => i.classList.remove('current-menu-item'));
                    // Adiciona apenas no item clicado
                    item.classList.add('current-menu-item');
                });
            });
        });
    </script>

    {{-- Modais alert --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let successMessage = @json(session('success'));
            let errorMessage = @json(session('error'));

            if (successMessage) {
                Swal.fire({
                    title: 'Sucesso!',
                    text: successMessage,
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                });
            }

            if (errorMessage) {
                Swal.fire({
                    title: 'Erro!',
                    text: errorMessage,
                    icon: 'error',
                    timer: 2500,
                    showConfirmButton: false
                });
            }
        });
    </script>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                Swal.fire({
                    title: 'Erro!',
                    text: @json($error),
                    icon: 'error',
                    timer: 2500,
                    showConfirmButton: false
                });
            </script>
        @endforeach
    @endif

    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", (function() {
            const o = document.createElement("script");
            o.src = "https://vlibras.gov.br/app/vlibras-plugin.js", o.onload = function() {
                window.VLibras && window.VLibras.Widget ? (new window.VLibras.Widget("https://vlibras.gov.br/app")) : console.warn("VLibras não foi carregado corretamente.")
            }, document.body.appendChild(o)
        }))
    </script>
</body>
</html>