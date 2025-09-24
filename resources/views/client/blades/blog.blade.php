@extends('client.core.client')
@section('content')
<!-- Pop-up -->
@if (isset($popUp))
   <div id="popup" class="popup" style="display: flex;">
      <div class="popup-content">
         <span class="close-btn font-24 rethink-sans-bold">x</span>
         @if ($popUp->link != null)            
            <a href="{{ $popUp->link }}" target="_blank" rel="noopener noreferrer">
               <img 
                  src="{{ asset('storage/' . $popUp->path_image) }}" 
                  alt="Pop-up"
                  fetchpriority="high" 
                  width="500" 
                  height="auto"
                  decoding="async"
                  loading="eager"
               />
            </a>
            @else
            <img 
               src="{{ asset('storage/' . $popUp->path_image) }}" 
               alt="Pop-up"
               fetchpriority="high" 
               width="500" 
               height="auto"
               decoding="async"
               loading="eager"
            />
         @endif

      </div>
   </div>
   <script defer>
      document.addEventListener("DOMContentLoaded", function () {
         let popup = document.getElementById("popup");
         let closeBtn = document.querySelector(".close-btn");
         popup.style.display = "flex";
         closeBtn.addEventListener("click", () => popup.style.display = "none");
         window.addEventListener("click", (e) => { if (e.target === popup) popup.style.display = "none"; });
      });
   </script>
@endif

<section class="blog mb-5">
   <div class="banner-inner position-relative">
      <div class="max-width m-auto">
         <h1 class="h2 m-0 text-white text-uppercase rethink-sans-bold font-50 d-block">Blog WHI</h1>
         <p class="text-white mb-0 rethink-sans-regular font-20 col-12 col-lg-12 mt-4">Confira uma área repleta de informações sobre o universo digital. Aqui escrevermos sobre tecnologia e tudo  feito pra quem vive — ou quer viver — o digital de verdade.</p>
         <ol class="breadcrumb mt-4 align-items-center">
            <li class="breadcrumb-item">
               <a href="{{route('index')}}">
                  <i class="fas fa-home me-2"></i>Home
               </a>
            </li>
            <li class="breadcrumb-item active">Blog WHI</li>			               			
         </ol>
      </div>
   </div>
</section>

<section id="news" class="blog-content pt-0 my-5">
   <!-- News With Sidebar Start -->
   <div class="container-fluid">
       <div class="max-width m-auto">

         <div class="row">
            
            <div class="col-lg-12 mb-4" data-aos="fade-right" data-aos-delay="100">
               @if ($blogAll->count())                     
                  <div class="mb-5 rounded-top-left">
                     <h3 class="m-0 text-uppercase rethink-sans-bold font-22 title-blue">Notícias</h3>
                  </div>

                  <div class="col-12">
                     <div class="row">
                        <div class="col-12 col-lg-6">
                           @if ($blogCategories->count())                        
                                 <!-- Tags Start -->
                                 <div class="mb-3">
                                    <div class="bg-white border-top-0">
                                          <div class="d-flex flex-wrap m-n1">
                                             @foreach ($blogCategories as $blogCategory)
                                                <a href="{{ route('blog', ['category' => $blogCategory->slug]) }}#news"
                                                   class="btn btn-sm btn-outline-secondary text-p rethink-sans-semiBold font-14 m-1
                                                   {{ (request()->routeIs('blog') && request()->route('category') === $blogCategory->slug) ? 'active background-red' : '' }}">
                                                   {{$blogCategory->title}}
                                                </a>
                                             @endforeach
                                          </div>
                                    </div>
                                 </div>
                                 <!-- Tags End -->
                              @endif
                        </div>
                        <div class="col-12 col-lg-6 d-flex justify-content-end gap-3 flex-wrap align-items-center">
                           @if (Route::currentRouteName() == 'blog-search')
                              <a href="{{ route('blog') }}#news" class="btn background-red text-white rethink-sans-bold py-2 font-15">Limpar</a>
                           @endif
   
                           <form action="{{route('blog-search')}}#news" class="search col-12 col-lg-10 h-75" method="post">
                              @csrf
                              <div class="input-group input-group-lg h-100">
                                 <input type="search" name="search" class="form-control border-end-0 text-color rethink-sans-regular bg-white py-0" placeholder="Pesquise aqui">
                                 <button type="submit" title="search" class="btn-reset input-group-text bg-white border">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99989 0C3.13331 0 0 3.13427 0 6.99979C0 10.8663 3.13351 14.0004 6.99989 14.0004C8.49916 14.0004 9.88877 13.5285 11.0281 12.7252L15.9512 17.6491C16.4199 18.117 17.1798 18.117 17.6485 17.6491C18.1172 17.1804 18.1172 16.4205 17.6485 15.9518L12.7254 11.0288C13.5279 9.88936 13.9998 8.4997 13.9998 6.99983C13.9998 3.13411 10.8655 0 6.99989 0ZM2.39962 6.99979C2.39962 4.45981 4.45907 2.40019 6.99989 2.40019C9.54072 2.40019 11.6002 4.45961 11.6002 6.99979C11.6002 9.54058 9.54072 11.6 6.99989 11.6C4.45907 11.6 2.39962 9.54058 2.39962 6.99979Z" fill="#31404B"/>
                                    </svg>                                    
                                 </button>
                              </div>
                           </form>                        
                        </div>
                     </div>

                     <div class="row mt-5">
                        @foreach($blogAll as $blog)   
                           @php
                              \Carbon\Carbon::setLocale('pt_BR');
                              $dataFormatada = \Carbon\Carbon::parse($blog->date)->translatedFormat('d \d\e F \d\e Y');
                           @endphp                     
                           <article class="col-lg-4 col-md-6 col-12 mb-4 d-flex">
                              <div class="news-lg border rounded-2 overflow-hidden bg-white w-100 d-flex flex-column">
                                 <div class="img-bann overflow-hidden d-flex justify-content-center align-items-center">
                                    <img loading="lazy" class="img-fluid h-100 w-100 object-fit-cover"
                                       src="{{ $blog->path_image_thumbnail ? asset('storage/'.$blog->path_image_thumbnail) : 'https://placehold.co/600x400?text=Sem+imagem&font=montserrat' }}"
                                       alt="{{ $blog->title ? $blog->title : 'Sem imagem'}}"
                                       style="aspect-ratio: 1.91/ 1; object-fit: cover;">
                                 </div>
                                 <div class="d-flex flex-column px-0">
                                    <div class="p-4 d-flex flex-column">
                                       <div class="mb-2 d-flex justify-content-start align-items-center gap-1 flex-wrap">
                                          <span class="badge badge-primary rethink-sans-semiBold font-12 me-2 background-red text-uppercase font-weight-semi-bold p-2">
                                             {{$blog->category->title}}
                                          </span>
                                          <p class="text-color mb-0 rethink-sans-regular font-14">
                                             {{$dataFormatada}}
                                          </p>
                                       </div>
                                       <a href="{{route('blog-inner', ['slug' => $blog->slug])}}" class="underline">
                                          <h2 class="h4 d-block mb-3 text-uppercase rethink-sans-semiBold font-20 title-blue">
                                             {{$blog->title}}
                                          </h2>
                                       </a>
                                       <p class="m-0 text-color rethink-sans-regular font-16">
                                          {!! substr(strip_tags($blog->text), 0, 180) !!}...
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </article>
                        @endforeach
                     </div>

                  </div>
                  <div class="mt-3">
                     {{$blogAll->links()}}
                  </div>
                  @else
                  <div class="alert alert-warning d-flex align-items-center flex-column text-center py-4" role="alert">
                     <i class="bi bi-emoji-frown fs-1 mb-2"></i>
                     <h3 class="alert-heading text-uppercase rethink-sans-bold font-20">Nenhuma notícia encontrada</h3>
                  </div>
               @endif
            </div>
         </div>
       </div>
   </div>
   <!-- News With Sidebar End -->
</section>
@endsection