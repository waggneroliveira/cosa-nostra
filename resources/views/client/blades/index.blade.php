@extends('client.core.client')
@section('content')
<!-- <banner-start> -->
<!-- START home 3 REVOLUTION SLIDER 6.6.8 -->
<p class="rs-p-wp-fix"></p>
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
                        <a id="slider-16-slide-{{$slide->id}}-layer-3" class="rs-layer pq-button pq-button-flat rev-btn" href="about-us.html" target="_self" data-type="button" data-rsp_ch="on" data-xy="x:c;y:m;yo:89px,100px,66px,57px;" data-text="w:normal;s:18,16,14,16;l:26,24,22,21;fw:300;" data-dim="minh:0px,none,none,none;" data-padding="t:14,12,12,12;r:30;b:14,12,12,12;l:30;" data-border="bos:solid;boc:#ffffff;bow:1px,1px,1px,1px;" data-frame_0="y:50,39,29,17;" data-frame_1="st:900;sp:1000;sR:900;" data-frame_999="o:0;st:w;sR:7100;" data-frame_hover="bgc:#c6a87d;boc:#c6a87d;bor:0px,0px,0px,0px;bos:solid;bow:1px,1px,1px,1px;bri:120%;" style="z-index:10;background-color:rgba(201,171,129,0);font-family:'Josefin Sans';text-transform:capitalize;">
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
<!-- END REVOLUTION SLIDER -->
<!-- <banner-end> -->
<!-- <portfolio-start> -->
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
<!-- <portfolio-end> -->
<!-- <about-start> -->
@if(isset($about))
    <section class="about">
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
        <div class="row mt-5">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="pq-counter pq-counter-style-2 active m-0 ">
                    <div class="pq-counter-info">
                        <div class="pq-counter-num-prefix">
                            <h5 class="timer" data-to="59" data-speed="5000">59</h5>
                            <span class="pq-counter-prefix">+</span>
                        </div>
                        <p class="pq-counter-description">Breakfast Option</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mt-4 mt-md-0">
                <div class="pq-counter pq-counter-style-2 active  ">
                    <div class="pq-counter-info">
                        <div class="pq-counter-num-prefix">
                            <h5 class="timer" data-to="100" data-speed="5000">100</h5>
                            <span class="pq-counter-prefix">+</span>
                        </div>
                        <p class="pq-counter-description">Dinner Option</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
                <div class="pq-counter pq-counter-style-2 active  ">
                    <div class="pq-counter-info">
                        <div class="pq-counter-num-prefix">
                            <h5 class="timer" data-to="50" data-speed="5000">50</h5>
                            <span class="pq-counter-prefix">+</span>
                        </div>
                        <p class="pq-counter-description">Table Available</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
                <div class="pq-counter pq-counter-style-2 active  ">
                    <div class="pq-counter-info">
                        <div class="pq-counter-num-prefix">
                            <h5 class="timer" data-to="25" data-speed="5000">25</h5>
                            <span class="pq-counter-prefix">+</span>
                        </div>
                        <p class="pq-counter-description">Year Of Experience</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- <about-end> -->
<!-- <service-start> -->
<section class="section pq-service-bg-dark-color pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pq-section-title-style-1 ">
                    <span class="pq-section-sub-title">service</span>
                    <h5 class="pq-section-title text-white">
                        Choose Your Best Food<br>From Categories
                    </h5>
                    <div class="col-lg-3 col-md-12 mt-4">
                        <div class="pq-btn-container">
                            <a class="pq-button pq-button-flat" href="booking-table.html">
                                <div class="pq-button-block">
                                    <span class="pq-button-line-left"></span>
                                    <span class="pq-button-text text-white">Reserve agora</span>
                                    <span class="pq-button-line-right"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="pq-secondary-dark-color">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="pq-fancybox-style-2 text-center">
                                <div class="pq-service-icon-main">
                                    <div class="pq-service-icon">
                                        <i aria-hidden="true" class=" flaticon-dish"></i>
                                    </div>
                                </div>
                                <div class="pq-fancy-box-info">
                                    <h5 class="pq-fancy-box-title text-white">Fresh Product</h5>
                                    <div class="pq-fancy-box-content">
                                        <p class="pq-fancybox-description m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="pq-fancybox-style-2 text-center">
                                <div class="pq-service-icon-main">
                                    <div class="pq-service-icon">
                                        <i aria-hidden="true" class=" flaticon-poinsettia"></i>
                                    </div>
                                </div>
                                <div class="pq-fancy-box-info">
                                    <h5 class="pq-fancy-box-title text-white">Skilled Chefs</h5>
                                    <div class="pq-fancy-box-content">
                                        <p class="pq-fancybox-description m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="pq-fancybox-style-2 text-center">
                                <div class="pq-service-icon-main">
                                    <div class="pq-service-icon">
                                        <i aria-hidden="true" class=" flaticon-noodles"></i>
                                    </div>
                                </div>
                                <div class="pq-fancy-box-info">
                                    <h5 class="pq-fancy-box-title text-white">Vegan Cuisine</h5>
                                    <div class="pq-fancy-box-content">
                                        <p class="pq-fancybox-description m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="pq-fancybox-style-2 text-center">
                                <div class="pq-service-icon-main">
                                    <div class="pq-service-icon">
                                        <i aria-hidden="true" class=" flaticon-food"></i>
                                    </div>
                                </div>
                                <div class="pq-fancy-box-info">
                                    <h5 class="pq-fancy-box-title text-white">Salmon Lox</h5>
                                    <div class="pq-fancy-box-content">
                                        <p class="pq-fancybox-description m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pq-service-bg-img">
                <img src="{{ asset('build/client/images/service/bg-service.jpg') }}" alt="service">
            </div>
        </div>
    </div>
</section>
<!-- <service-end> -->
<!-- <gallery-start> -->
<section class="portfolio py-0">
    <div class="container-fluid p-0">
        <div class="row g-0 gallery">
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ asset('build/client/images/beer/1.jpg') }}">
                <img src="{{ asset('build/client/images/beer/1.jpg') }}" class="img-fluid w-100" alt="">
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ asset('build/client/images/beer/2.jpg') }}">
                <img src="{{ asset('build/client/images/beer/2.jpg') }}" class="img-fluid w-100" alt="">
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ asset('build/client/images/beer/3.jpg') }}">
                <img src="{{ asset('build/client/images/beer/3.jpg') }}" class="img-fluid w-100" alt="">
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ asset('build/client/images/beer/4.jpg') }}">
                <img src="{{ asset('build/client/images/beer/4.jpg') }}" class="img-fluid w-100" alt="">
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ asset('build/client/images/beer/5.jpg') }}">
                <img src="{{ asset('build/client/images/beer/5.jpg') }}" class="img-fluid w-100" alt="">
                </a>
            </div>
        </div>
    </div>
</section>
<!-- <gallery-end> -->
<!-- <pop-up-start> -->
<section class="popup p-0">
    <div class="container-fluid p-0">
        <div class="row pq-bg-dark-color pq-ms-30">
            <div class="col-xl-5 pq-popup-video-bg-img pq-popup-video-bg-img-dark-layer">
                <div class="pq-popup-video-block">
                    <div class="pq-video-icon">
                        <a href="youtube.com/xPPLbEFbCAo?si=KuR7pHZVfKSx4fvT" class="pq-video default popup-youtube">
                        <i aria-hidden="true" class="ion ion-play"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 pq-tab-padding">
                <div class="pq-dark-section-side-right">
                </div>
                <div class="pq-section-title-style-1">
                    <span class="pq-section-sub-title">About Us</span>
                    <h5 class="pq-section-title">Enjoy An Exceptional Drink of Wine</h5>
                </div>
                <div class="pq-advance-tab pq-about-tab">
                    <div class="nav nav-tabs nav-fill pq-mb-30" id="advance-nav-tab" role="tablist">
                        <a class="pq-tabs nav-item nav-link active" id="advance-nav-home-0" data-bs-toggle="tab" href="#advance-nav-0" role="tab" aria-controls="advance-nav-home-0" aria-selected="true">
                        Romantique
                        </a>
                        <a class="pq-tabs nav-item nav-link " id="advance-nav-home-1" data-bs-toggle="tab" href="#advance-nav-1" role="tab" aria-controls="advance-nav-home-1" aria-selected="false" tabindex="-1">
                        Reserve
                        </a>
                        <a class="pq-tabs nav-item nav-link " id="advance-nav-home-2" data-bs-toggle="tab" href="#advance-nav-2" role="tab" aria-controls="advance-nav-home-2" aria-selected="false" tabindex="-1">
                        Albarino
                        </a>
                    </div>
                    <div class="tab-content" id="advance-nav-tabContent">
                        <div class="pq-advance-tab-content tab-pane fade show active" id="advance-nav-0" role="tabpanel" aria-labelledby="advance-nav-home-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable.</p>
                                    <ul class="pq-list-check">
                                        <li>
                                            <i class="ion ion-ios-checkmark-outline"></i>
                                            <span>Lorem is dummy text of the printing and typesettiry</span>
                                        </li>
                                        <li>
                                            <i class="ion ion-ios-checkmark-outline"></i>
                                            <span>There are many variations of passages</span>
                                        </li>
                                        <li>
                                            <i class="ion ion-ios-checkmark-outline"></i>
                                            <span>It is a long established fact that a reader will be distracted</span>
                                        </li>
                                        <li>
                                            <i class="ion ion-ios-checkmark-outline"></i>
                                            <span>Various versions have evolved over the years</span>
                                        </li>
                                    </ul>
                                    <a class="pq-button pq-button-flat pq-mt-30" href="about-us.html">
                                        <div class="pq-button-block">
                                            <span class="pq-button-line-left"></span>
                                            <span class="pq-button-text text-white">Read More</span>
                                            <span class="pq-button-line-right"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="pq-advance-tab-content tab-pane fade " id="advance-nav-1" role="tabpanel" aria-labelledby="advance-nav-home-1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable.</p>
                                    <ul class="pq-list-check">
                                        <li>
                                            <i class="ion ion-ios-checkmark-outline"></i>
                                            <span>Various versions have evolved over the years</span>
                                        </li>
                                        <li>
                                            <i class="ion ion-ios-checkmark-outline"></i>
                                            <span>It is a long established fact that a reader will be distracted</span>
                                        </li>
                                        <li>
                                            <i class="ion ion-ios-checkmark-outline"></i>
                                            <span>There are many variations of passages</span>
                                        </li>
                                        <li>
                                            <i class="ion ion-ios-checkmark-outline"></i>
                                            <span>Lorem is dummy text of the printing and typesettiry</span>
                                        </li>
                                    </ul>
                                    <a class="pq-button pq-button-flat pq-mt-30" href="about-us.html">
                                        <div class="pq-button-block">
                                            <span class="pq-button-line-left"></span>
                                            <span class="pq-button-text text-white">Read More</span>
                                            <span class="pq-button-line-right"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="pq-advance-tab-content tab-pane fade " id="advance-nav-2" role="tabpanel" aria-labelledby="advance-nav-home-2">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable.</p>
                                    <ul class="pq-list-check">
                                        <li>
                                            <i class="ion ion-ios-checkmark-outline"></i>
                                            <span>Lorem is dummy text of the printing and typesettiry</span>
                                        </li>
                                        <li>
                                            <i class="ion ion-ios-checkmark-outline"></i>
                                            <span>There are many variations of passages</span>
                                        </li>
                                        <li>
                                            <i class="ion ion-ios-checkmark-outline"></i>
                                            <span>It is a long established fact that a reader will be distracted</span>
                                        </li>
                                        <li>
                                            <i class="ion ion-ios-checkmark-outline"></i>
                                            <span>Various versions have evolved over the years</span>
                                        </li>
                                    </ul>
                                    <a class="pq-button pq-button-flat pq-mt-30" href="about-us.html">
                                        <div class="pq-button-block">
                                            <span class="pq-button-line-left"></span>
                                            <span class="pq-button-text text-white">Read More</span>
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
<!-- <pop-up-end> -->
<!-- <depoiment-start> -->
<section class="testimonial py-0">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 pq-testimonial-padding">
                <h4 class="text-white">o que falam sobre nós </h4>
                <div class="owl-carousel" data-dots="true" data-nav="false" data-desk_num="1" data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="false" data-loop="true" data-margin="30">
                    <div class="item">
                        <div class="pq-testimonial-box pq-testimonialbox-2 mt-4 col-12 col-lg-11">
                            <div class="pq-testimonial-star">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                            <div class="pq-testimonial-info">
                                <div class="pq-testimonial-content">
                                    <div class="pq-quote"><i class="fa fa-quote-right"></i></div>
                                    <p>Um pedacinho da Itália em Salvador! A comida é maravilhosa, o ambiente aconchegante e o atendimento impecável. Já virou parada obrigatória com minha família nos fins de semana.</p>
                                </div>
                                <div class="pq-testimonial-img">
                                    <div class="pq-testimonial-meta">
                                        <h5 class="text-white">Hosana Costa</h5>
                                        <span>Cliente há 2 anos</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pq-testimonial-box pq-testimonialbox-2">
                            <div class="pq-testimonial-star">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                            <div class="pq-testimonial-info">
                                <div class="pq-testimonial-content">
                                    <div class="pq-quote"><i class="fa fa-quote-right"></i></div>
                                    <p>Um pedacinho da Itália em Salvador! A comida é maravilhosa, o ambiente aconchegante e o atendimento impecável. Já virou parada obrigatória com minha família nos fins de semana.</p>
                                </div>
                                <div class="pq-testimonial-img">
                                    <div class="pq-testimonial-meta">
                                        <h5 class="text-white">Wagner Oliveira</h5>
                                        <span>Cliente há 2 anos</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 pq-testimonial-bg-img-2"></div>
        </div>
    </div>
</section>
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
                    <a class="pq-button pq-button-flat" href="booking-table.html">
                        <div class="pq-button-block">
                            <span class="pq-button-line-left"></span>
                            <span class="pq-button-text text-white">booking table</span>
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
<section class="blog p-0 py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pq-section-title-style-1 text-center">
                    <span class="pq-section-sub-title">Keep Up With Us</span>
                    <h5 class="pq-section-title">Read Some Latest Blog & News</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="pq-blog-post">
                    <div class="pq-post-media">
                        <img src="{{ asset('build/client/images/blog/1.jpg') }}" alt="team">
                        <div class="pq-post-date">
                            <a href="blog-single.html">
                            <span>April 18, 2022</span>
                            </a>
                        </div>
                    </div>
                    <div class="pq-blog-contain">
                        <div class="pq-post-meta">
                            <ul>
                                <li class="pq-post-tag">
                                    <a href="blog-single.html">
                                    <i class="fa fa-tag"></i>
                                    Food
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <h5 class="pq-blog-title">
                            <a href="blog-single.html">Cooking Dining Experience</a>
                        </h5>
                        <div class="pq-blog-info">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                        </div>
                        <div class="pq-btn-container">
                            <a class="pq-button pq-btn-link" href="blog-single.html">
                                <div class="pq-button-block">
                                    <span class="pq-button-line-left"></span>
                                    <span class="pq-button-text">Read More</span>
                                    <span class="pq-button-line-right"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="pq-blog-post">
                    <div class="pq-post-media">
                        <img src="{{ asset('build/client/images/blog/2.jpg') }}" alt="team">
                        <div class="pq-post-date">
                            <a href="blog-single.html">
                            <span>April 18, 2022</span>
                            </a>
                        </div>
                    </div>
                    <div class="pq-blog-contain">
                        <div class="pq-post-meta">
                            <ul>
                                <li class="pq-post-tag">
                                    <a href="blog-single.html">
                                    <i class="fa fa-tag"></i>
                                    Food
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <h5 class="pq-blog-title">
                            <a href="blog-single.html">Spaghetti with Rock Shrimp</a>
                        </h5>
                        <div class="pq-blog-info">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                        </div>
                        <div class="pq-btn-container">
                            <a class="pq-button pq-btn-link" href="blog-single.html">
                                <div class="pq-button-block">
                                    <span class="pq-button-line-left"></span>
                                    <span class="pq-button-text">Read More</span>
                                    <span class="pq-button-line-right"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="pq-blog-post">
                    <div class="pq-post-media">
                        <img src="{{ asset('build/client/images/blog/3.jpg') }}" alt="team">
                        <div class="pq-post-date">
                            <a href="blog-single.html">
                            <span>April 18, 2022</span>
                            </a>
                        </div>
                    </div>
                    <div class="pq-blog-contain">
                        <div class="pq-post-meta">
                            <ul>
                                <li class="pq-post-tag">
                                    <a href="blog-single.html">
                                    <i class="fa fa-tag"></i>
                                    Food
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <h5 class="pq-blog-title">
                            <a href="blog-single.html">Life is a Combination of food</a>
                        </h5>
                        <div class="pq-blog-info">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                        </div>
                        <div class="pq-btn-container">
                            <a class="pq-button pq-btn-link" href="blog-single.html">
                                <div class="pq-button-block">
                                    <span class="pq-button-line-left"></span>
                                    <span class="pq-button-text">Read More</span>
                                    <span class="pq-button-line-right"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <blog-end> -->
<!-- <reservation-start> -->
<section class="reservation p-0 pb-5 pt-0 pq-bg-dark-color">
    <div class="container">
        <div class="row align-items-baseline padding-top">
            <div class="col-lg-9 col-md-12 align-self-start mt-4 mt-lg-0">
                <div class="text-start">
                    <span class="pq-section-sub-title">Reservas</span>
                    <h5 class="pq-section-title text-white">viva uma experiência única na Cantina</h5>
                    <p class="description">Garanta o seu lugar em nosso ambiente aconchegante e aproveite a autêntica gastronomia italiana com quem você mais gosta.</p>
                </div>
                <div class="row gy-4">
                    <!-- Localização -->
                    <div class="col-12 col-md-4 d-flex">
                        <div class="p-2 me-3 icon-location d-flex justify-content-center align-items-center">
                            <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 1.67188C12.8906 1.67188 7.03125 7.45312 7.03125 14.6406C7.03125 24.875 18.5938 38.3125 19.1406 38.9375L20 39.9531L20.8594 38.9375C21.4062 38.3125 32.9688 24.875 32.9688 14.6406C32.9688 7.45312 27.1094 1.67188 20 1.67188ZM20 36.2812C17.2656 32.9219 9.375 22.4531 9.375 14.6406C9.375 8.78125 14.1406 4.01562 20 4.01562C25.8594 4.01562 30.625 8.78125 30.625 14.6406C30.625 22.4531 22.7344 32.9219 20 36.2812ZM20 7.92188C16.0938 7.92188 12.9688 11.0469 12.9688 14.9531C12.9688 18.8594 16.0938 21.9844 20 21.9844C23.9062 21.9844 27.0312 18.8594 27.0312 14.9531C27.0312 11.0469 23.9062 7.92188 20 7.92188ZM20 19.6406C17.4219 19.6406 15.3125 17.5312 15.3125 14.9531C15.3125 12.375 17.4219 10.2656 20 10.2656C22.5781 10.2656 24.6875 12.375 24.6875 14.9531C24.6875 17.5312 22.5781 19.6406 20 19.6406Z" fill="#1F1D1E"/>
                            </svg>
                        </div>
                        <div class="col-10 pe-1">
                            <h5 class="text-light mb-1">Localização</h5>
                            <p class="text-light mb-0 small">
                                Rua Bahia 144, Pituba
                                Salvador - BA, 41160-180
                            </p>
                        </div>
                    </div>
                    <!-- Contato -->
                    <div class="col-12 col-md-4 d-flex mb-3">
                        <div class="p-2 me-3 icon-location d-flex justify-content-center align-items-center">
                            <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M36.875 14.6406C34.6094 6.28125 27.8125 0.5 20 0.5C12.2656 0.5 5.39062 6.28125 3.125 14.6406C1.40625 14.875 0 16.3594 0 18.1562V27.5312C0 29.0156 0.9375 30.2656 2.1875 30.8125C2.65625 34.9531 6.09375 38.1562 10.3125 38.1562H16.7188C17.1875 39.4844 18.4375 40.5 20 40.5H27.0312C28.9844 40.5 30.625 38.9375 30.625 36.9844C30.625 35.0312 28.9844 33.4688 27.0312 33.4688H20C18.4375 33.4688 17.1875 34.4062 16.7188 35.8125H10.3125C7.5 35.8125 5.07812 33.7812 4.53125 31.125H7.03125V28.7031H9.375V16.9844H7.03125V14.6406H5.625C7.8125 7.6875 13.5156 2.84375 20 2.84375C26.4844 2.84375 32.1875 7.60938 34.375 14.6406H32.9688V16.9844H30.625V28.7031H32.9688V31.125H36.4844C38.4375 31.125 40 29.4844 40 27.5312V18.1562C40 16.3594 38.5938 14.875 36.875 14.6406ZM20 35.8125H27.0312C27.7344 35.8125 28.2031 36.3594 28.2031 36.9844C28.2031 37.6094 27.7344 38.1562 27.0312 38.1562H20C19.375 38.1562 18.8281 37.6094 18.8281 36.9844C18.8281 36.3594 19.375 35.8125 20 35.8125ZM4.6875 28.7031H3.51562C2.89062 28.7031 2.34375 28.2344 2.34375 27.5312V18.1562C2.34375 17.5312 2.89062 16.9844 3.51562 16.9844H4.6875V28.7031ZM37.6562 27.5312C37.6562 28.2344 37.1094 28.7031 36.4844 28.7031H35.3125V16.9844H36.4844C37.1094 16.9844 37.6562 17.5312 37.6562 18.1562V27.5312Z" fill="#1F1D1E"/>
                            </svg>
                        </div>
                        <div class="col-10 pe-1">
                            <h5 class="text-light mb-1">Contato</h5>
                            <p class="text-light mb-0 small">
                                (71) 99704-9998 /
                                (71) 3333-3333
                            </p>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="col-12 col-md-4 d-flex">
                        <div class="p-2 me-3 icon-location d-flex justify-content-center align-items-center">
                            <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 5.1875V35.8125H40V5.1875H0ZM20 23.625L3.75 7.53125H36.25L20 23.625ZM13.5156 20.5L2.34375 31.5156V9.48438L13.5156 20.5ZM15.2344 22.2188L20 26.9062L24.6875 22.2969L35.9375 33.4688H3.82812L15.2344 22.2188ZM26.3281 20.6562L37.6562 9.48438V31.75L26.3281 20.6562Z" fill="#1F1D1E"/>
                            </svg>
                        </div>
                        <div class="col-10 pe-1">
                            <h5 class="text-light mb-1">E-Mail</h5>
                            <p class="text-light mb-0 small">
                                atendimento@cantinacosanostra.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="pq-reservation-main-form p-0 mt-3 mb-0">
                    <form class="pq-applyform" novalidate>
                        <div class="row g-2">
                            <div class="col-12 col-lg-8">
                                <input type="text" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input type="text" class="form-control" placeholder="Your Phone / WhatsApp" required>
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-12">
                                <input type="email" class="form-control" placeholder="Your Email (optional)">
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-12 col-lg-6">
                                <input type="number" min="1" class="form-control" placeholder="Number of People" required>
                            </div>
                            <div class="col-6 col-lg-3">
                                <input type="date" class="form-control" required>
                            </div>
                            <div class="col-6 col-lg-3">
                                <input type="time" class="form-control" required>
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-12">
                                <textarea class="form-control" rows="3" placeholder="Special Requests (optional)"></textarea>
                            </div>
                        </div>
                        <div class="col-12 text-start mt-2">
                            <a href="booking-table.html" class="pq-button pq-button-flat">
                            <span class="pq-button-text text-white">Book a Table</span>
                            </a>
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
@endsection
