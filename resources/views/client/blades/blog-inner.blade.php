@extends('client.core.client')
@section('content')
   <div class="banner-inner position-relative d-flex justify-content-start align-items-center mt-3">
      <div class="container" style="z-index: 10;">
         <h1 class="h2 m-0 text-white text-uppercase rethink-sans-bold font-38 d-block" data-aos="fade-right" data-aos-delay="100">{{$blogInner->title}}</h1>
         <ol class="breadcrumb mt-4 align-items-center" data-aos="fade-right" data-aos-delay="500">
            <li class="breadcrumb-item list-unstyled">
               <a href="{{route('index')}}" class="text-white">
                  <i class="fas fa-home me-2"></i>Home
               </a>
            </li>
            <li class="breadcrumb-item list-unstyled blog">
               <a href="{{route('blog')}}" class="text-white">
                  <i class="fas fa-newspaper me-2"></i>Blog
               </a>
            </li>
            <li class="breadcrumb-item list-unstyled active">{{$blogInner->title}}</li>			               			
         </ol>
      </div>
   </div>

    <!-- News With Sidebar Start -->
    <div class="container mb-5 blog-inn mt-4">
        <div class="max-width m-auto">
            <div class="row">
                <div class="col-lg-8" data-aos="fade-right" data-aos-delay="750">
                    @php
                        \Carbon\Carbon::setLocale('pt_BR');
                        $dataFormatada = \Carbon\Carbon::parse($blogInner->date)->translatedFormat('d \d\e F \d\e Y');
                    @endphp
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <article>                            
                            <div class="position-relative">
                                <div class="position-absolute pq-post-date">
                                    <p class="text-color mb-0 montserrat-regular font-15">{{$dataFormatada}}</p>
                                </div>

                                <img class="border img-fluid w-100 rounded-3 image-inner d-flex justify-content-center align-items-center"
                                src="{{ $blogInner->path_image_thumbnail ? asset('storage/'.$blogInner->path_image_thumbnail) : 'https://placehold.co/600x400?text=Sem+imagem&font=montserrat' }}"
                                alt="{{ $blogInner->title ? $blogInner->title : 'Sem imagem'}}"
                                style="aspect-ratio:1.91/1;object-fit: cover;" loading="lazy">
                                
                                <div class="category mt-2">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 7.90625V1.5C0 0.6875 0.65625 0 1.5 0H7.875C8.28125 0 8.65625 0.1875 8.9375 0.46875L15.5312 7.0625C16.125 7.65625 16.125 8.625 15.5312 9.1875L9.15625 15.5625C8.59375 16.1562 7.625 16.1562 7.03125 15.5625L0.4375 8.96875C0.15625 8.6875 0 8.3125 0 7.90625ZM3.5 2C2.65625 2 2 2.6875 2 3.5C2 4.34375 2.65625 5 3.5 5C4.3125 5 5 4.34375 5 3.5C5 2.6875 4.3125 2 3.5 2Z" fill="#CA232A"/>
                                    </svg>
                                    <span class="badge background-red rethink-sans-regular font-12 p-0">{{$blogInner->category->title}}</span>
                                </div>
                                <h2 class="mb-3 title-blue rethink-sans-bold font-22 mt-3">{{$blogInner->title}}</h2>
                            </div>
                            <div class="py-2">
                                <div class="black-color rethink-sans-regular font-16 mt-0 text-audio text-blog-inner">
                                    {!! $blogInner->text !!}
                                </div>                                
                            </div>                        
                        </article>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{route('blog')}}" class="to-back border border-black black-color rethink-sans-regular font-16 d-flex justify-content-between align-items-center background-red py-1 px-3 rounded-0">
                                Voltar
                            </a>

                            <div class="position-relative d-flex justify-content-center align-items-end flex-column">
                                <button id="shareBtn" class="border border-black rethink-sans-regular black-color font-16 d-flex justify-content-around align-items-center btn background-red py-2 px-3 rounded-0">
                                    Compartilhar
                                </button>
                                <div id="socialLinks" class="socialLinks mt-2 opacity-0">
                                    <div class="d-flex gap-2">
                                        <a href="https://api.whatsapp.com/send?text={{ urlencode($blogInner->title . ' ' . url()->current()) }}" target="_blank" class="d-flex justify-content-center align-items-center p-0 btn btn-sm bg-whatsapp"><i class="fab fa-whatsapp text-black font-24"></i></a>    
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blogInner->title) }}" target="_blank" class="d-flex justify-content-center align-items-center p-0 btn btn-sm btn-twiter">
                                            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 30 30" width="24px" height="24px"><path d="M26.37,26l-8.795-12.822l0.015,0.012L25.52,4h-2.65l-6.46,7.48L11.28,4H4.33l8.211,11.971L12.54,15.97L3.88,26h2.65 l7.182-8.322L19.42,26H26.37z M10.23,6l12.34,18h-2.1L8.12,6H10.23z"/></svg>
                                        </a>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="d-flex justify-content-center align-items-center p-0 btn btn-facebook btn-sm"><i class="fab fa-facebook-f text-black font-24"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment Form Start -->
                    <div class="mb-0 mt-5 border border-black p-4">
                        <div class="section-title mb-0 d-flex flex-wrap justify-content-between align-items-center">
                            <h4 class="m-0 rethink-sans-bold font-25 title-blue col-12 col-lg-8 mb-2">Escreva um comentário</h4>
                            <div class="d-flex justify-content-start align-items-start gap-1 col-12 col-lg-4">                        
                                @if (Auth::guard('client')->check())
                                    @php
                                        $user = Auth::guard('client')->user();
                                        $defaultImage = $user && $user->path_image ? url($user->path_image) : '';
                                    @endphp
                                    <div class="image-profile">
                                        <picture>
                                            <source srcset="{{ isset($defaultImage) && $defaultImage <> null ?$defaultImage:asset('build/client/images/user.jpg') }}" type="image/svg+xml">
                                            <img src="{{ isset($defaultImage) && $defaultImage <> null ?$defaultImage:asset('build/client/images/user.jpg') }}"
                                                alt="Imagem de Login"
                                                class="img-fluid rounded-circle" loading="lazy" style="width: 40px;height:40px;">
                                        </picture>
                                    </div>
                                    <div class="d-flex flex-column align-items-start gap-1" style="line-height: 0;">
                                        <div class="d-flex justify-content-start align-items-center gap-2">
                                            <h2 class="loginOn m-0 rethink-sans-regular font-12 text-start text-p" style="line-height: 0;">Logado com,</h2>   
                                            <h3 class="m-0 rethink-sans-regular font-12 text-start text-p" style="line-height: 0;">{{$names = collect(explode(' ', Auth::guard('client')->user()->name))->slice(0, 1)->implode(' ')}}!</h3>      
                                            <a class="nav-link waves-effect waves-light" href="#" data-bs-toggle="modal" data-bs-target="#editClientModal-{{Auth::guard('client')->user()->id}}">
                                                <i class="bi bi-gear font-18 text-black"></i>
                                            </a>                 
                                        </div>  
                                        <a href="{{route('client.user.logout')}}" class="d-flex justify-content-start align-items-center gap-2 text-decoration-none">
                                            <i class="bi bi-box-arrow-right font-15 text-black" style="line-height: 0;"></i>
                                            <h4 class="rethink-sans-regular font-12 m-0 text-black" style="line-height: 0;">Sair</h4>
                                        </a>                                               
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="position-relative">
                            <form id="commentForm">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{ $blogInner->id }}">

                                <div class="mb-3">
                                    <textarea id="message" placeholder="* Escreva seu comentário" name="comment" required cols="30" rows="5" class="form-control montserrat-regular font-15 rounded-0 border border-black bg-transparent"></textarea>
                                </div>
                                                                
                                <div class="mb-0 text-start">
                                    <button type="submit" class="btn background-red rounded-0 rethink-sans-regular text-black font-15 px-4 py-1">Comentar</button>
                                </div>
                            </form>
                            <div id="commentMessage" class="mt-3 montserrat-regular font-15"></div>
                        </div>
                    </div>
                    <!-- Comment Form End -->

                    <!-- Comment List Start -->
                    @if (isset($blogInner->comments) && $blogInner->comments->count() > 0)                        
                        <div class="mb-3 mt-4 comments">
                            <div class="section-title mb-3 title-blue">
                                <h4 class="m-0 rethink-sans-bold font-25 title-blue">{{$blogInner->comments->count()}} Comentários</h4>
                            </div>
                            <div class="bg-transparentborder comment-scroll">
                                @foreach ($blogInner->comments as $comment)
                                    @php
                                        \Carbon\Carbon::setLocale('pt_BR');
                                        $dataFormatada = \Carbon\Carbon::parse($comment->created_at)->translatedFormat('d \d\e F \d\e Y');
                                        $client = $comment->client;
                                    @endphp

                                    @if ($client)
                                        <div class="d-flex gap-2 flex-column mb-3 p-3" style="background: #1F1D1E;">
                                            <div class="d-flex mb-0 gap-3">
                                                <img src="{{ $client->path_image ? url($client->path_image) : asset('build/client/images/user.jpg') }}"
                                                    alt="Imagem do cliente"
                                                    class="img-fluid mr-3 mt-1"
                                                    style="width: 100px; height: 100px; object-fit: cover;" loading="lazy">
                                                <div class="d-flex flex-column col-10 comment">
                                                    <h6 class="title-blue text-white rethink-sans-bold font-18 mb-0">{{ $client->name }}</h6>
                                                    <small class="title-blue mb-0 montserrat-regular font-12" style="line-height: 12px;">
                                                        {{ $dataFormatada }}
                                                    </small>
                                                    <div class="w-100 mt-3">
                                                        <div class="comment-text font-14" style="line-height: 23px;">
                                                            {!! $comment->comment !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <!-- Comment List End -->
                </div>                

                <div class="col-lg-4" data-aos="fade-left" data-aos-delay="750">
                  <aside>
                    <style>
                        .comment-text p{
                            font-size: 0.938rem;
                            font-family: "Sora";
                            font-weight: 400;
                            color: #10131C;
                        }
                        @media (max-width: 576px) {
                            .mb-3.title-blue.rethink-sans-bold.font-28.text-uppercase{
                                font-size: 1.25rem !important;
                            }
                            .cat-mt {
                                margin-top: 15px;
                            }
                            .text-blog-inner.montserrat-regular.font-16 p img{
                                max-width: 350px;
                                max-height: inherit;
                                margin: 0;
                            }
                        }
                    </style>
   
                      @if ($blogRelacionados)                        
                        <!-- Popular News Start -->
                        <div class="mb-3 border p-3" style="border-color: #777777 !important;">
                            <div class="section-title mb-0">
                                <h4 class="m-0 rethink-sans-bold font-22 title-blue">Relacionados</h4>
                            </div>
                            <div class="bg-transparent py-3">
                                @foreach($blogRelacionados as $relacionado)    
                                    @php
                                        \Carbon\Carbon::setLocale('pt_BR');
                                        $dataFormatada = \Carbon\Carbon::parse($relacionado->date)->translatedFormat('d \d\e F \d\e Y');
                                    @endphp                               
                                    <article>
                                        <div class="d-flex align-items-center bg-transparentmb-3 overflow-hidden">
                                            <div class="w-100 h-100 px-1 d-flex flex-column justify-content-center">
                                                <a href="{{route('blog-inner', ['slug' => $relacionado->slug])}}" class="underline w-100 gap-1 d-flex justofy-content-start align-items-center">
                                                    <span class="icon">
                                                        <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.07812 4.62891L1.28906 8.4375C1.09375 8.61328 0.800781 8.61328 0.625 8.4375L0.175781 7.98828C0 7.8125 0 7.51953 0.175781 7.32422L3.18359 4.29688L0.175781 1.28906C0 1.09375 0 0.800781 0.175781 0.625L0.625 0.175781C0.800781 0 1.09375 0 1.28906 0.175781L5.07812 3.98438C5.25391 4.16016 5.25391 4.45312 5.07812 4.62891Z" fill="#CA232A"/>
                                                        </svg>
                                                    </span> 
                                                    <h3 class="h6 m-0 rethink-sans-bold font-14 title-blue">{{$relacionado->title}}</h3>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                        <!-- Popular News End -->
                      @endif
   
                     <!-- Tags Start -->
                      <div class="mb-3 border p-3" style="border-color: #777777 !important;">
                          <div class="section-title mb-0 cat-mt">
                              <h4 class="m-0 rethink-sans-bold font-22 title-blue">Categorias</h4>
                          </div>
                          <div class="bg-transparentpy-3">
                              <div class="d-flex flex-wrap m-n1">
                                  @foreach ($blogCategories as $category)
                                    <li class="nav-link">
                                        <a href="{{ route('blog', ['category' => $category->slug]) }}#news"
                                        class="btn btn-sm rethink-sans-regular font-14 m-1
                                        {{ (request()->routeIs('blog-inner') && isset($blogInner) && $blogInner->category->id === $category->id) ? 'active background-red' : '' }}">
                                            <span class="icon">
                                                <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.07812 4.62891L1.28906 8.4375C1.09375 8.61328 0.800781 8.61328 0.625 8.4375L0.175781 7.98828C0 7.8125 0 7.51953 0.175781 7.32422L3.18359 4.29688L0.175781 1.28906C0 1.09375 0 0.800781 0.175781 0.625L0.625 0.175781C0.800781 0 1.09375 0 1.28906 0.175781L5.07812 3.98438C5.25391 4.16016 5.25391 4.45312 5.07812 4.62891Z" fill="#CA232A"/>
                                                </svg>
                                            </span>  
                                            {{ $category->title }}
                                        </a>
                                    </li>
                                @endforeach
                              </div>
                          </div>
                      </div>
                      <!-- Tags End -->

                      <!-- Newsletter Start -->
                      <div class="mb-3 border p-3" style="border-color: #777777 !important;">
                          <div class="section-title mb-0">
                              <h4 class="m-0 text-uppercase rethink-sans-bold font-22 title-blue">Newsletter</h4>
                          </div>
                          @include('client.includes.newsletter')
                      </div>
                      <!-- Newsletter End -->

                  </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer>
        function showMessage(message, type) {
             $('#commentMessage').html(
                 `<div class="alert alert-${type}">${message}</div>`
             );
 
             setTimeout(() => {
                 $('#commentMessage').fadeOut('slow', function () {
                     $(this).html('').show();
                 });
             }, 3000);
         }
        //Envio do comentario via ajax
        $('#commentForm').on('submit', function (e) {
            e.preventDefault();

            // Atualiza textarea com conteúdo do CKEditor
            for (let instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }

            const comment = $('#message').val();

            // Remove tags HTML e espaços para verificar se tem conteúdo real
            const commentText = $('<div>').html(comment).text().trim();

            if (!commentText) {
                showMessage('O campo mensagem é obrigatório e não pode conter apenas espaços.', 'danger');
                return;
            }

            const $btn = $(this).find('button[type="submit"]');
            $btn.prop('disabled', true);

            const formData = $(this).serialize();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('blog.comment') }}",
                method: "POST",
                data: formData,
                success: function (response) {
                    showMessage(response.message, 'success');
                    $('#commentForm')[0].reset();

                    for (let instance in CKEDITOR.instances) {
                        CKEDITOR.instances[instance].setData('');
                    }
                    $btn.prop('disabled', false);
                },
                error: function (xhr) {
                    $btn.prop('disabled', false);

                    console.log('Erro status:', xhr.status);
                    console.log('Erro response:', xhr.responseText);

                    if (xhr.status === 401) {
                        showMessage(xhr.responseJSON?.message || 'É necessário estar logado para enviar um comentário.', 'warning');

                        const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
                        loginModal.show();
                    } else if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        let errorMessages = '';
                        for (let field in errors) {
                            errorMessages += `<div>${errors[field][0]}</div>`;
                        }
                        showMessage(errorMessages, 'danger');
                    } else {
                        showMessage('Erro inesperado. Por favor, tente novamente.', 'danger');
                    }
                }
            });
        });
    </script>
    
    <style>
        #cke_notifications_area_message {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            z-index: -1 !important;
            height: 0 !important;
            overflow: hidden !important;
        }
        .cke_notifications_area {
            display: none !important;
        }

    </style>
@endsection