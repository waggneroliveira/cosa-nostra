@extends('client.core.client')
@section('content')
<!-- <banner-start> -->
<!-- START home 3 REVOLUTION SLIDER 6.6.8 -->
<p class="rs-p-wp-fix"></p>
@if ($slides->count() > 0)
    <rs-module-wrap id="rev_slider_16_1_wrapper" data-alias="home-1-11" data-source="gallery" style="visibility:hidden;background:transparent;padding:0;margin:0px auto;margin-top:0;margin-bottom:0;">
        <rs-module id="rev_slider_16_1" data-version="6.6.8">
            <rs-slides style="overflow: hidden; position: absolute;">
                @foreach ($slides as $slide)
                    <rs-slide style="position: absolute;" data-key="rs-{{$slide->id}}" data-title="Slide" data-thumb="{{ asset('storage/' .$slide->path_image_mobile) }}" data-anim="adpr:false;ms:100;" data-in="o:0;" data-out="a:false;">
                        <img src="{{ asset('build/client/rev/assets/dummy.png') }}" alt="" title="1" width="1920" height="900" class="rev-slidebg tp-rs-img rs-lazyload" data-lazyload="{{ asset('storage/' .$slide->path_image) }}" data-no-retina>

                        @if($slide->subtitle)
                            <rs-layer id="slider-16-slide-{{$slide->id}}-layer-0" class="pq-banner-subtitle" data-type="text" data-color="#c9ab81" data-rsp_ch="on" data-xy="x:c;y:m;yo:-185px,-144px,-103px,-85px;" data-text="w:normal;s:18,16,16,14;l:28,24,26,22;" data-frame_0="y:50,39,29,17;" data-frame_1="st:100;sp:1000;sR:100;" data-frame_999="o:0;st:w;sR:7900;" style="z-index:13;font-family:'Miniver';text-transform:uppercase;">{{$slide->subtitle}}
                            </rs-layer>
                        @endif
                        
                        @if($slide->title)
                            <rs-layer id="slider-16-slide-{{$slide->id}}-layer-1" data-type="text" data-rsp_ch="on" data-xy="x:c;xo:1px,0,0,0;y:m;yo:-96px,-60px,-35px,-30px;" data-text="w:normal;s:64,56,44,32;l:72,64,52,40;fw:500;a:center;" data-dim="w:1440px,680px,516px,314px;" data-frame_0="y:50,39,29,17;" data-frame_1="st:300;sp:1000;sR:300;" data-frame_999="o:0;st:w;sR:7700;" style="z-index:12;font-family:'Josefin Sans';text-transform:capitalize;">{{$slide->title}}
                            </rs-layer>
                        @endif

                        @if($slide->description)
                        <rs-layer id="slider-16-slide-{{$slide->id}}-layer-2" data-type="text" data-rsp_ch="on" data-xy="x:c;xo:0,0,22px,13px;y:m;yo:4px,28px,-49px,-71px;" data-text="w:normal;s:20,18,0,4;l:28,26,19,11;fw:300;a:center;" data-dim="w:auto,auto,404px,249px;h:auto,auto,58px,35px;" data-vbility="t,t,f,f" data-frame_0="y:50,39,29,17;" data-frame_1="st:600;sp:1000;sR:600;" data-frame_999="o:0;st:w;sR:7400;" style="z-index:11;font-family:'Josefin Sans';text-transform:capitalize;">{!!$slide->description!!} </rs-layer>
                        @endif
                
                        @if($slide->link && $slide->btn_title)
                            <a id="slider-16-slide-{{$slide->id}}-layer-3" class="rs-layer pq-button pq-button-flat rev-btn" href="{{$slide->link}}" target="_self" data-type="button" data-rsp_ch="on" data-xy="x:c;y:m;yo:89px,100px,66px,57px;" data-text="w:normal;s:18,16,14,16;l:26,24,22,21;fw:300;" data-dim="minh:0px,none,none,none;" data-padding="t:14,12,12,12;r:30;b:14,12,12,12;l:30;" data-border="bos:solid;boc:#ffffff;bow:1px,1px,1px,1px;" data-frame_0="y:50,39,29,17;" data-frame_1="st:900;sp:1000;sR:900;" data-frame_999="o:0;st:w;sR:7100;" data-frame_hover="bgc:#c6a87d;boc:#c6a87d;bor:0px,0px,0px,0px;bos:solid;bow:1px,1px,1px,1px;bri:120%;" style="z-index:10;background-color:rgba(201,171,129,0);font-family:'Josefin Sans';text-transform:capitalize;">
                                <div class="pq-button-block">
                                    <br/>
                                    <span class="pq-button-line-left"></span>
                                    <br/>
                                    <span class="pq-button-text">{{$slide->btn_title}}</span>
                                    <br/>
                                    <span class="pq-button-line-right"></span>
                                    <br/>
                                </div>
                            </a>
                        @endif
                    </rs-slide>
                @endforeach
            </rs-slides>
        </rs-module>
    </rs-module-wrap>
@endif
<!-- END REVOLUTION SLIDER -->
<!-- <banner-end> -->
<!-- <portfolio-start> -->
@if ($topics->count() > 0)
    <section class="portfolio p-0 pq-mt-60">
        <div class="container">
            <div class="row">
                @foreach($topics as $topic)
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="pq-main-portfolio-box p-0">
                            <div class="pq-portfolio-box-img mb-0 position-relative">
                                <img src="{{ asset('storage/' .$topic->path_image) }}" class="img-fluid animation-bob" alt="{{$topic->title}}">
                                <div class="pq-portfolio-image-box-content position-absolute bottom-0 start-50 translate-middle-x">
                                    @if($topic->link <> null)
                                        <h5 class="pq-portfolio-image-box-title text-white">
                                            <a href="{{$topic->link}}">{{$topic->title}}</a>
                                        </h5>
                                        @else
                                        <h5 class="pq-portfolio-image-box-title text-white">
                                            {{$topic->title}}
                                        </h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
<!-- <portfolio-end> -->
<!-- <about-start> -->
@if(isset($about) || $unionizeds->count() > 0)
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-12 col-md-12 pe-xl-5">
                    <div class="pq-about-img3">
                        <img src="{{ asset('storage/' . $about->path_image) }}" alt="about">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="pq-section-title-style-1 ">
                        <span class="pq-section-sub-title">{{$about->subtitle}}</span>
                        <h5 class="pq-section-title mb-2">{{$about->title}}</h5>
                        <p>
                            {!! $about->text !!}
                        </p>
                        <div class="pq-section-svg"></div>
                    </div>
                    @if ($about->btn_link && $about->title_button)                        
                        <div class="pq-about-btn">
                            <div class="pq-btn-container">
                                <a class="pq-button pq-button-flat" href="{{$about->btn_link}}">
                                    <div class="pq-button-block">
                                        <span class="pq-button-line-left"></span>
                                        <span class="pq-button-text text-white">{{$about->title_button}}</span>
                                        <span class="pq-button-line-right"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row m-auto mt-5 container-fluid">
            @foreach ($unionizeds as $unionized)                
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="pq-counter pq-counter-style-2 active m-0">
                        <div class="pq-counter-info">
                            <div class="pq-counter-num-prefix">
                                <h5 class="timer" data-to="{{$unionized->title}}" data-speed="5000">{{$unionized->title}}</h5>
                                <span class="pq-counter-prefix">+</span>
                            </div>
                            <p class="pq-counter-description">{{$unionized->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach            
        </div>
    </section>
@endif
<!-- <about-end> -->
<!-- <service-start> -->
@if (isset($statute) || $directions->count() > 0)
    <section id="experience" class="section pq-service-bg-dark-color pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if ($statute)                    
                        <div class="pq-section-title-style-1 ">
                            <span class="pq-section-sub-title">{{$statute->description}}</span>
                            <h5 class="pq-section-title text-white col-lg-5 col-12">
                                {{$statute->title}}
                            </h5>
                            <div class="col-lg-3 col-md-12 mt-4">
                                <div class="pq-btn-container">
                                    <a class="pq-button pq-button-flat" href="#reservation">
                                        <div class="pq-button-block">
                                            <span class="pq-button-line-left"></span>
                                            <span class="pq-button-text text-white">Reserve agora</span>
                                            <span class="pq-button-line-right"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="pq-secondary-dark-color">
                        <div class="row">
                            @foreach ($directions as $direction)                            
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <div class="pq-fancybox-style-2 text-center">
                                        <div class="pq-service-icon-main">
                                            <div class="pq-service-icon">
                                                <img src="{{asset('storage/' .$direction->path_image)}}" alt="{{$direction->title}}">
                                            </div>
                                        </div>
                                        <div class="pq-fancy-box-info">
                                            <h5 class="pq-fancy-box-title text-white">{{$direction->title}}</h5>
                                            <div class="pq-fancy-box-content">
                                                <p class="pq-fancybox-description m-0">{{$direction->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if (isset($statute) && $statute->path_file <> null)                
                    <div class="pq-service-bg-img">
                        <img src="{{ asset('storage/' .$statute->path_file) }}" alt="Service">
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
<!-- <service-end> -->
<!-- <gallery-start> -->
@if ($benefitTopics->count() > 0)
    <section id="gallery" class="portfolio py-0">
        <div class="container-fluid p-0">
            <div class="row g-0 gallery">
                @foreach ($benefitTopics as $benefitTopics)
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="{{ asset('storage/' .$benefitTopics->path_image) }}">
                        <img src="{{ asset('storage/' .$benefitTopics->path_image) }}" class="img-fluid w-100" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
<!-- <gallery-end> -->
<!-- <pop-up-start> -->
@if (isset($reservationHere))        
    <section id="event" class="popup p-0">
        <div class="container-fluid p-0">
            <div class="row pq-bg-dark-color pq-ms-30">
                <div class="col-xl-5 pq-popup-video-bg-img pq-popup-video-bg-img-dark-layer">
                    <div class="pq-popup-video-block">
                        @if ($reservationHere->link <> null)
                            <div class="pq-video-icon">
                                <a href="{{$reservationHere->link}}" class="pq-video default popup-youtube">
                                <i aria-hidden="true" class="ion ion-play"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-7 pq-tab-padding">
                    <div class="pq-dark-section-side-right">
                    </div>
                    <div class="pq-section-title-style-1">
                        <span class="pq-section-sub-title">{{$reservationHere->subtitle}}</span>
                        <h5 class="pq-section-title">{{$reservationHere->title}}</h5>
                    </div>
                    <div class="pq-advance-tab pq-about-tab">
                        <div class="nav nav-tabs nav-fill pq-mb-30" id="advance-nav-tab" role="tablist">
                            <a class="pq-tabs nav-item nav-link active" id="{{$reservationHere->event}}" data-bs-toggle="tab" href="#advance-nav-0" role="tab" aria-controls="{{$reservationHere->event}}" aria-selected="true">
                            Eventos
                            </a>
                            <a class="pq-tabs nav-item nav-link " id="{{$reservationHere->benefit}}" data-bs-toggle="tab" href="#advance-nav-1" role="tab" aria-controls="{{$reservationHere->benefit}}" aria-selected="false" tabindex="-1">
                            Benefícios
                            </a>
                        </div>
                        <div class="tab-content" id="advance-nav-tabContent">
                            <div class="pq-advance-tab-content tab-pane fade show active" id="advance-nav-0" role="tabpanel" aria-labelledby="{{$reservationHere->event}}">
                                <div class="row">
                                    <div class="col-lg-12 advance-list">
                                        {!!$reservationHere->event!!}
                                        <a class="pq-button pq-button-flat pq-mt-30" href="#reservation">
                                            <div class="pq-button-block">
                                                <span class="pq-button-line-left"></span>
                                                <span class="pq-button-text text-white">Reserve seu Evento</span>
                                                <span class="pq-button-line-right"></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="pq-advance-tab-content tab-pane fade " id="advance-nav-1" role="tabpanel" aria-labelledby="{{$reservationHere->benefit}}">
                                <div class="row">
                                    <div class="col-lg-12 advance-list">
                                        {!!$reservationHere->benefit!!}
                                        <a class="pq-button pq-button-flat pq-mt-30" href="#reservation">
                                            <div class="pq-button-block">
                                                <span class="pq-button-line-left"></span>
                                                <span class="pq-button-text text-white">Reserve seu Evento</span>
                                                <span class="pq-button-line-right"></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- <pop-up-end> -->
<!-- <depoiment-start> -->
@if (isset($report) || $depoiments->count() > 0)
    <section id="depoiment" class="testimonial py-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 pq-testimonial-padding">
                    @if (isset($report) && $report->description <> null)                    
                        <h4 class="pq-section-sub-title">{{$report->description}}</h4>
                    @endif
                    @if (isset($report) && $report->title <> null)                    
                        <h5 class="text-white">{{$report->title}} </h5>
                    @endif
                    @if (isset($depoiments) && $depoiments->count() > 0)
                        <div class="owl-carousel" data-dots="true" data-nav="false" data-desk_num="1" data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="false" data-loop="true" data-margin="30">
                            @foreach ($depoiments as $depoiment)
                                <div class="item">
                                    <div class="pq-testimonial-box pq-testimonialbox-2 mt-4 col-12 col-lg-11">
                                        <div class="pq-testimonial-star">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        </div>
                                        <div class="pq-testimonial-info">
                                            <div class="pq-testimonial-content">
                                                <div class="pq-quote"><i class="fa fa-quote-right"></i></div>
                                                <p>{{$depoiment->text}}</p>
                                            </div>
                                            <div class="pq-testimonial-img">
                                                <div class="pq-testimonial-meta">
                                                    <h5 class="text-white">{{$depoiment->title}}</h5>
                                                    <span>{{$depoiment->details}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                @if (isset($report) && $report->path_image <> null)                
                    <div class="col-xl-6 col-lg-6 pq-testimonial-bg-img-2" style="--bg-image: url('{{ asset('storage/' . $report->path_image) }}')"></div>
                @endif
            </div>
        </div>
    </section>
@endif
<!-- <depoiment-end> -->
<!-- <cta-start> -->
<section class="cta pq-cta-bg-img">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-12">
                <div class="pq-section-title-style-1 mb-0">
                    <span class="pq-section-sub-title">Precisa de uma mesa?</span>
                    <h5 class="pq-section-title text-white">reserve Sua mesa para A Família inteira</h5>
                    <div class="pq-section-svg"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="pq-btn-container">
                    <a class="pq-button pq-button-flat" href="#reservation">
                        <div class="pq-button-block">
                            <span class="pq-button-line-left"></span>
                            <span class="pq-button-text text-white">Reserve sua mesa</span>
                            <span class="pq-button-line-right"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <cta-end> -->
<!-- <blog-start> -->
@if ($blogHighlights->count() > 0)
    <section class="blog p-0 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pq-section-title-style-1 text-center">
                        <span class="pq-section-sub-title">Acompanhe nosso blog!</span>
                        <h5 class="pq-section-title">dicas e novidades exclusivas</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogHighlights as $blogHighlight)    
                    @php
                        \Carbon\Carbon::setLocale('pt_BR');
                        $dataFormatada = \Carbon\Carbon::parse($blogHighlight->date)->translatedFormat('d \d\e F \d\e Y');
                    @endphp             
                    <div class="col-lg-4 col-md-12">
                        <div class="pq-blog-post">
                            <div class="pq-post-media">
                                <img src="{{ asset('storage/' . $blogHighlight->path_image_thumbnail) }}" alt="team">
                                <div class="pq-post-date">
                                    <a href="{{route('blog-inner', ['slug' => $blogHighlight->slug])}}">
                                    <span>{{$dataFormatada}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="pq-blog-contain">
                                <div class="pq-post-meta">
                                    <ul>
                                        <li class="pq-post-tag">
                                            <a href="{{route('blog-inner', ['slug' => $blogHighlight->slug])}}">
                                            <i class="fa fa-tag"></i>
                                            {{$blogHighlight->category->title}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <h5 class="pq-blog-title">
                                    <a href="{{route('blog-inner', ['slug' => $blogHighlight->slug])}}">{{$blogHighlight->title}}</a>
                                </h5>
                                <div class="pq-blog-info mt-3">
                                <p>{!! substr(strip_tags($blogHighlight->text), 0, 60) !!}</p> 
                                </div>
                                <div class="pq-btn-container">
                                    <a class="pq-button pq-btn-link" href="{{route('blog-inner', ['slug' => $blogHighlight->slug])}}">
                                        <div class="pq-button-block">
                                            <span class="pq-button-line-left"></span>
                                            <span class="pq-button-text">Ler matéria</span>
                                            <span class="pq-button-line-right"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
<!-- <blog-end> -->
<!-- <reservation-start> -->
<section id="reservation" class="reservation p-0 pb-5 pt-0 pq-bg-dark-color">
    <div class="container">
        <div class="row align-items-baseline padding-top">
            <div class="col-lg-9 col-md-12 align-self-start mt-4 mt-lg-0">
                @if (isset($contact))    
                    @if ($contact->name_section_social_media || $contact->name_section || $contact->text)                        
                        <div class="text-start">
                            <span class="pq-section-sub-title">{{$contact->name_section_social_media}}</span>
                            <h5 class="pq-section-title text-white">{{$contact->name_section}}</h5>
                            <p class="description">{{$contact->text}}</p>
                        </div>
                    @endif                
                    <div class="row gy-4">
                        <!-- Localização -->
                        @if (isset($contact->address_one))                            
                            <div class="col-12 col-md-4 d-flex">
                                <div class="p-2 me-3 icon-location d-flex justify-content-center align-items-center">
                                    <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 1.67188C12.8906 1.67188 7.03125 7.45312 7.03125 14.6406C7.03125 24.875 18.5938 38.3125 19.1406 38.9375L20 39.9531L20.8594 38.9375C21.4062 38.3125 32.9688 24.875 32.9688 14.6406C32.9688 7.45312 27.1094 1.67188 20 1.67188ZM20 36.2812C17.2656 32.9219 9.375 22.4531 9.375 14.6406C9.375 8.78125 14.1406 4.01562 20 4.01562C25.8594 4.01562 30.625 8.78125 30.625 14.6406C30.625 22.4531 22.7344 32.9219 20 36.2812ZM20 7.92188C16.0938 7.92188 12.9688 11.0469 12.9688 14.9531C12.9688 18.8594 16.0938 21.9844 20 21.9844C23.9062 21.9844 27.0312 18.8594 27.0312 14.9531C27.0312 11.0469 23.9062 7.92188 20 7.92188ZM20 19.6406C17.4219 19.6406 15.3125 17.5312 15.3125 14.9531C15.3125 12.375 17.4219 10.2656 20 10.2656C22.5781 10.2656 24.6875 12.375 24.6875 14.9531C24.6875 17.5312 22.5781 19.6406 20 19.6406Z" fill="#1F1D1E"/>
                                    </svg>
                                </div>
                                <div class="col-10 pe-1">
                                    <h5 class="text-light mb-1">Localização</h5>
                                    <p class="text-light mb-0 small">
                                        {{$contact->address_one}}
                                    </p>
                                </div>
                            </div>
                        @endif
                        <!-- Contato -->
                        @if (isset($contact->phone_two))                            
                            <div class="col-12 col-md-4 d-flex mb-3">
                                <div class="p-2 me-3 icon-location d-flex justify-content-center align-items-center">
                                    <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M36.875 14.6406C34.6094 6.28125 27.8125 0.5 20 0.5C12.2656 0.5 5.39062 6.28125 3.125 14.6406C1.40625 14.875 0 16.3594 0 18.1562V27.5312C0 29.0156 0.9375 30.2656 2.1875 30.8125C2.65625 34.9531 6.09375 38.1562 10.3125 38.1562H16.7188C17.1875 39.4844 18.4375 40.5 20 40.5H27.0312C28.9844 40.5 30.625 38.9375 30.625 36.9844C30.625 35.0312 28.9844 33.4688 27.0312 33.4688H20C18.4375 33.4688 17.1875 34.4062 16.7188 35.8125H10.3125C7.5 35.8125 5.07812 33.7812 4.53125 31.125H7.03125V28.7031H9.375V16.9844H7.03125V14.6406H5.625C7.8125 7.6875 13.5156 2.84375 20 2.84375C26.4844 2.84375 32.1875 7.60938 34.375 14.6406H32.9688V16.9844H30.625V28.7031H32.9688V31.125H36.4844C38.4375 31.125 40 29.4844 40 27.5312V18.1562C40 16.3594 38.5938 14.875 36.875 14.6406ZM20 35.8125H27.0312C27.7344 35.8125 28.2031 36.3594 28.2031 36.9844C28.2031 37.6094 27.7344 38.1562 27.0312 38.1562H20C19.375 38.1562 18.8281 37.6094 18.8281 36.9844C18.8281 36.3594 19.375 35.8125 20 35.8125ZM4.6875 28.7031H3.51562C2.89062 28.7031 2.34375 28.2344 2.34375 27.5312V18.1562C2.34375 17.5312 2.89062 16.9844 3.51562 16.9844H4.6875V28.7031ZM37.6562 27.5312C37.6562 28.2344 37.1094 28.7031 36.4844 28.7031H35.3125V16.9844H36.4844C37.1094 16.9844 37.6562 17.5312 37.6562 18.1562V27.5312Z" fill="#1F1D1E"/>
                                    </svg>
                                </div>
                                <div class="col-10 pe-1">
                                    <h5 class="text-light mb-1">Contato</h5>
                                    <p class="text-light mb-0 small">
                                        {{$contact->phone_two}}
                                    </p>
                                </div>
                            </div>
                        @endif
                        <!-- Email -->
                        @if (isset($contact->name_three))                            
                            <div class="col-12 col-md-4 d-flex">
                                <div class="p-2 me-3 icon-location d-flex justify-content-center align-items-center">
                                    <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 5.1875V35.8125H40V5.1875H0ZM20 23.625L3.75 7.53125H36.25L20 23.625ZM13.5156 20.5L2.34375 31.5156V9.48438L13.5156 20.5ZM15.2344 22.2188L20 26.9062L24.6875 22.2969L35.9375 33.4688H3.82812L15.2344 22.2188ZM26.3281 20.6562L37.6562 9.48438V31.75L26.3281 20.6562Z" fill="#1F1D1E"/>
                                    </svg>
                                </div>
                                <div class="col-10 pe-1">
                                    <h5 class="text-light mb-1">E-Mail</h5>
                                    <p class="text-light mb-0 small">
                                        {{$contact->name_three}}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
                <div class="pq-reservation-main-form p-0 mt-3 mb-0">
                    <form id="reservationForm" class="pq-applyform" novalidate>
                        @csrf
                        <div class="row g-2">
                            <div class="col-12 col-lg-8">
                                <input type="text" name="name_complete" class="form-control text-muted border-white" placeholder="*Nome completo" required>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input type="text" id="phone-wpp" name="phone_whatsapp" class="form-control text-muted border-white" placeholder="*WhatsApp" required>
                            </div>
                        </div>

                        <div class="row g-2 mt-2">
                            <div class="col-12">
                                <input type="email" name="email" class="form-control text-muted border-white" placeholder="*Email" required>
                            </div>
                        </div>

                        <div class="row g-2 mt-2">
                            <div class="col-6 col-lg-3">
                                <input type="date" id="reservationDate" name="date" class="form-control text-muted border-white" required>
                            </div>
                            <div class="col-6 col-lg-3">
                                <select id="reservationTime" name="hours" class="form-control text-muted border-white" required disabled>
                                    <option value="">Selecione um horário</option>
                                </select>
                            </div>
                            <div class="col-6 col-lg-3">
                                <select name="location_area" class="form-control text-muted border-white" required disabled>
                                    <option disabled selected>Área do estabelecimento</option>
                                    <option value="interna">Interna</option>
                                    <option value="varanda">Varanda</option>
                                </select>
                            </div>
                            <div class="col-6 col-lg-3">
                                <input type="number" name="number_of_people" min="1" max="10" class="form-control text-muted border-white" placeholder="Número de pessoas" required>
                            </div>
                        </div>

                        <div class="row g-2 mt-2">
                            <div class="col-12">
                                <textarea name="message" class="form-control rounded-0 text-muted border-white bg-transparent" rows="3" placeholder="Mensagem (opcional)"></textarea>
                            </div>
                        </div>

                        <div class="col-12 text-start mt-2">
                            <button type="submit" class="pq-button pq-button-flat mb-2">
                                <span class="pq-button-text text-white">Reservar</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="pq-reservation-img">
                    <!-- <img class="img-fluid" src="images/reservation.jpg" alt="reservation"> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <reservation-end> -->

<!--Script para data e hora de agendamento-->
<script>
    document.addEventListener('DOMContentLoaded', () => {

        const dateInput   = document.getElementById('reservationDate');
        const timeSelect  = document.getElementById('reservationTime');
        const areaSelect  = document.querySelector('select[name="location_area"]');
        const peopleInput = document.querySelector('input[name="number_of_people"]');

        let lastAvailabilityData = null; // para reaproveitar os dados

        // Impedir datas retroativas
        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const dd = String(today.getDate()).padStart(2, '0');
        dateInput.setAttribute('min', `${yyyy}-${mm}-${dd}`);

        // Desabilitar campo de número de pessoas inicialmente
        peopleInput.disabled = true;

        // =====================================================
        // 1. GERAÇÃO AUTOMÁTICA DE HORÁRIOS
        // =====================================================
        const horarios = {
            1: ['12:00–15:30', '18:00–21:30'], 
            2: ['12:00–15:30', '18:00–21:30'],
            3: ['12:00–15:30', '18:00–21:30'],
            4: ['12:00–15:30', '18:00–21:30'],
            5: ['12:00–15:30', '18:00–21:30'],
            6: ['12:00–16:30', '18:00–21:30'],
            0: ['12:00–16:30', '18:00–21:30']
        };

        dateInput.addEventListener('change', () => {
            const selectedDate = new Date(dateInput.value);
            const day = selectedDate.getDay();
            const faixas = horarios[day];

            timeSelect.innerHTML = '<option value="">Selecione um horário</option>';

            if (!faixas) {
                timeSelect.disabled = true;
                return;
            }

            timeSelect.disabled = false;

            const times = [];

            faixas.forEach(faixa => {
                const [start, end] = faixa.split('–');
                const [sh, sm] = start.split(':').map(Number);
                const [eh, em] = end.split(':').map(Number);

                let current = new Date();
                current.setHours(sh, sm, 0);

                const limit = new Date();
                limit.setHours(eh, em, 0);

                while (current <= limit) {
                    const h = current.getHours().toString().padStart(2, '0');
                    const m = current.getMinutes().toString().padStart(2, '0');
                    times.push(`${h}:${m}`);
                    current.setMinutes(current.getMinutes() + 30);
                }
            });

            times.forEach(t => {
                const opt = document.createElement('option');
                opt.value = t;
                opt.textContent = t;
                timeSelect.appendChild(opt);
            });
        });

        // =====================================================
        // 2. VERIFICA DISPONIBILIDADE DE TODAS ÁREAS
        // =====================================================
        function updateAreasAvailability() {
            const date = dateInput.value;
            const time = timeSelect.value;

            if (!date || !time) return;

            fetch('/reservations/check-areas-availability', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ date, hours: time })
            })
            .then(res => res.json())
            .then(data => {

                lastAvailabilityData = data;

                areaSelect.innerHTML = '<option disabled selected>Área do estabelecimento</option>';
                areaSelect.disabled = false;

                let disponiveis = [];

                // Interna
                if (data.interna.remaining > 0) {
                    areaSelect.innerHTML += `<option value="interna">Interna (${data.interna.remaining} vagas)</option>`;
                    disponiveis.push('interna');
                }

                // Varanda
                if (data.varanda.remaining > 0) {
                    areaSelect.innerHTML += `<option value="varanda">Varanda (${data.varanda.remaining} vagas)</option>`;
                    disponiveis.push('varanda');
                }

                // Nenhuma área disponível
                if (disponiveis.length === 0) {
                    areaSelect.disabled = true;
                    peopleInput.disabled = true;

                    Swal.fire({
                        icon: 'error',
                        title: 'Sem vagas',
                        text: 'Nenhuma área possui vagas para este horário.'
                    });

                    return;
                }

                // Se só houver 1 área disponível: seleciona automaticamente
                if (disponiveis.length === 1) {
                    areaSelect.value = disponiveis[0];
                }

                updatePeopleLimit();
            })
            .catch(err => console.error(err));
        }

        // =====================================================
        // 3. ATUALIZA LIMITE DE PESSOAS
        // =====================================================
        function updatePeopleLimit() {
            if (!lastAvailabilityData) return;

            const area = areaSelect.value;
            if (!area) {
                peopleInput.disabled = true;
                return;
            }

            let remaining = lastAvailabilityData[area].remaining;

            // AQUI: limite por mesa = 10 pessoas
            const maxPerTable = 10;

            // Regra final = menor valor entre os dois
            const finalLimit = Math.min(remaining, maxPerTable);

            if (finalLimit <= 0) {
                peopleInput.disabled = true;
                peopleInput.value = "";
                return;
            }

            peopleInput.disabled = false;
            peopleInput.max = finalLimit;
            peopleInput.placeholder = `Máximo disponível: ${finalLimit}`;
        }

        // =====================================================
        // 4. EVENTOS
        // =====================================================
        dateInput.addEventListener('change', updateAreasAvailability);
        timeSelect.addEventListener('change', updateAreasAvailability);

        areaSelect.addEventListener('change', updatePeopleLimit);

    });

    //Mascara wpp
    document.addEventListener("DOMContentLoaded", function () {
            const wppInput = document.getElementById("phone-wpp");

            if (!wppInput) return;

            wppInput.addEventListener("input", function (e) {
                let value = e.target.value;

                // Remove tudo que não for número
                value = value.replace(/\D/g, "");

                // Limita a 11 dígitos
                value = value.substring(0, 11);

                // Aplica máscara
                if (value.length > 6) {
                    value = value.replace(/(\d{2})(\d{5})(\d{0,4})/, "($1) $2-$3");
                } else if (value.length > 2) {
                    value = value.replace(/(\d{2})(\d{0,5})/, "($1) $2");
                } else {
                    value = value.replace(/(\d{0,2})/, "($1");
                }

                e.target.value = value;
            });
        });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#reservationForm').on('submit', function(e) {
        e.preventDefault();

        const formData = $(this).serialize();

        $.ajax({
            url: '{{ route("send-reservation") }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                Swal.fire({
                    title: 'Sucesso!',
                    text: response.message,
                    icon: 'success',
                    timer: 1800,
                    showConfirmButton: false
                });
                $('#reservationForm')[0].reset();
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    for (let field in errors) {
                        errorMessages += errors[field][0] + '\n';
                    }

                    Swal.fire({
                        title: 'Erro',
                        text: errorMessages,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        title: 'Erro',
                        text: 'Ocorreu um erro ao enviar seu cadastro. Tente novamente.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });

</script>
@endsection
