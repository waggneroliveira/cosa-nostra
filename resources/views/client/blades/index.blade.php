@extends('client.core.client')
@section('content')
<section id=hero class="hero position-relative d-flex flex-column section dark-background overflow-hidden">
    <img id=profileImage src="{{asset('build/client/images/bann-1.webp')}}" alt="Banner Hero" title="Banner Hero" class="image-hero">
    <div class="group-firula">
        <div class="asteristico" data-aos="fade-up" data-aos-delay="600">
            <img src="{{asset('build/client/images/asterisco.webp')}}" alt="Firula Banner Hero Asteristico" title="Firula Banner Hero Asteristico" class="firula-image-hero-asteristico">
        </div>
        <img src="{{asset('build/client/images/five-senses.webp')}}" alt="Firula Banner Hero Asteristico" title="Firula Banner Hero Asteristico" class="firula-image-hero" data-aos="fade-up" data-aos-delay="200">
    </div>
    <div class="w-100 d-flex justify-content-center flex-column align-items-center position-absolute description">
        <div class="max-width container">
            <h1 class="text-white mb-5 rethink-sans-bold font-46">
                É hora de <span class=emphasis><b>MUDAR</b></span>! Com a gente, seu negócio estará mais do que online, gerando <span class=emphasis><b>resultados</b></span> de verdade.
            </h1>
            <p class="text-white mb-5 rethink-sans-regular">Faça já <span class=typed data-typed-items="sua  <b>Consultoria Digital</b>, seu <b>Site dinâmico</b>, sua <b>Logomarca</b>, seu <b>Marketing Digital</b>"></span><span class="typed-cursor typed-cursor--blink" aria-hidden=true></span>
                <span class="typed-cursor typed-cursor--blink" aria-hidden=true></span>
            </p>
            <a href=https://wa.me/5571996483853 target=_blank rel="noopener noreferrer" class="rethink-sans-regular ps-4 text-white call-to-action d-flex justify-content-center gap-4 align-items-center">
                Fale com a gente!
                <i class="bi bi-whatsapp rounded-circle d-flex justify-content-center align-items-center"></i>
            </a>
        </div>
    </div>
</section>
<section id=project class="project grey-background pb-5" data-aos=fade-up data-aos-delay=100>
    <div class="max-width-project m-auto me-0 d-flex flex-column flex-md-row align-items-center justify-content-between py-5">
        <div class=col-2 data-aos=fade-right data-aos-delay=120>
            <p class="mb-0 text-left-project rethink-sans-regular">
                +20 de tecnologias fazem rotina diária com a WHI
            </p>
        </div>
        <div class=col-lg-9 data-aos=fade-left data-aos-delay=150>
            <div class=max-width>
                <div class="stack-details-slider swiper init-swiper">
                    <script type=application/json class=swiper-config>
                        {
                            "loop": false,
                            "speed": 15000,
                            "initialSlide": 0,
                            "autoplay": {
                                "delay": 0,
                                "disableOnInteraction": false
                            },
                            "slidesPerView": 12,
                            "slidesPerGroup": 12,
                            "pagination": {
                                "type": "progressbar"
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 4,
                                    "slidesPerGroup": 4
                                },
                                "359": {
                                    "slidesPerView": 5,
                                    "slidesPerGroup": 5
                                },
                                "769": {
                                    "slidesPerView": 8,
                                    "slidesPerGroup": 8
                                },
                                "885": {
                                    "slidesPerView": 12,
                                    "slidesPerGroup": 12
                                }
                            }
                        }
                    </script>
                    <div class="carousel-project swiper-wrapper align-items-center">
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/html.svg')}}" alt=Html title=Html loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/css.svg')}}" alt=Css title=Css loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/sass.webp')}}" alt=Sass title=Sass loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/js.svg')}}" alt=JavaScript title=JavaScript loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/jquery.svg')}}" alt=Jquery title=Jquery loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/php.png')}}" alt=Php title=Php loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/laravel.svg')}}" alt=Laravel title=Laravel loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/bs.svg')}}" alt=Booststrap title=Booststrap loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/tailwind.svg')}}" alt=Tailwind title=Tailwind loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/vue.svg')}}" title=Vue loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/wp.svg')}}" alt=WordPress title=WordPress loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/git.svg')}}" alt=Git title=Git loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/github.svg')}}" alt=GitHub title=GitHub loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/mysql.svg')}}" alt=MySQL title=MySQL loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/figma.svg')}}" alt=Figma title=Figma loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/nuvemshop.svg')}}" alt=Nuvemshop title=Nuvemshop loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/adobe.svg')}}" alt=Adobe title=Adobe loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/instagram.svg')}}" alt=Instagram title=Instagram loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/meta.svg')}}" alt=Meta title=Meta loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/photoshop.svg')}}" alt=photoshop title=photoshop loading=lazy>
                        </div>
                    </div>
                    <div class=swiper-pagination></div>
                </div>
            </div>
        </div>
    </div>
    <div class="light-background w-100 py-5 pb-0 position-relative">
        <div class="max-width m-auto content-project d-flex flex-column flex-md-row justify-content-between align-items-baseline position-relative z-1 text-center text-md-start">
            <div class="content-lef col-6" data-aos=fade-left data-aos-delay=300>
                <h2 class="rethink-sans-semiBold font-55">
                    Um projeto feito para <span class="emphasis bg-mobile">você</span>, do seu jeito. Sem surpresas no <span class="emphasis bg-mobile">orçamento</span>.
                </h2>
            </div>
            <div class="content-right col-4" data-aos=fade-right data-aos-delay=300>
                <p class=rethink-sans-regular>
                    A gente sabe que colocar uma ideia no ar pode parecer complicado e caro. A boa notícia é que <span class="rethink-sans-semiBold">não precisa ser.</span>
                </p>
                <div data-aos=zoom-in-up data-aos-delay=300>
                    <img src="{{asset('build/client/images/laptop.webp')}}" alt="Imagem computador" title="Imagem computador" class="w-100 laptop-parallax" loading=lazy>
                </div>
            </div>
        </div>
        <div class=firula-project></div>
    </div>
    <div class="project-list-carousel pe-2 m-auto me-0 position-relative" data-aos=fade-up data-aos-delay=150>
        <div class=w-100>
            <div class="project-list-details-slider swiper init-swiper">
                <script type=application/json class=swiper-config>
                    {
                        "speed": 500,
                        "slidesPerView": 5,
                        "slidesPerGroup": 1,
                        "centeredSlides": false,
                        "initialSlide": 0,
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "navigation": {
                            "nextEl": ".swiper-button-next",
                            "prevEl": ".swiper-button-prev"
                        },
                        "breakpoints": {
                            "320": {
                                "slidesPerView": 1.3,
                                "spaceBetween": 5
                            },
                            "414": {
                                "slidesPerView": 2.1,
                                "spaceBetween": 5
                            },
                            "631": {
                                "slidesPerView": 3,
                                "spaceBetween": 5
                            },
                            "768": {
                                "slidesPerView": 3,
                                "spaceBetween": 5
                            },
                            "1025": {
                                "slidesPerView": 5,
                                "spaceBetween": 10
                            }
                        }
                    }
                </script>
                <div class="swiper-wrapper align-items-center">
                    <div class=swiper-slide>
                        <div class="project-list-item dark-background-medium p-3">
                            <img src="{{asset('build/client/images/ideia.svg')}}" alt=Icon title="Icon ideia" loading=lazy>
                            <h3 class="emphasis mt-3 rethink-sans-bold">Identidade Visual</h3>
                            <ul class=ps-3>
                                <li class="ps-1 rethink-sans-semiBold">Branding</li>
                                <li class="ps-1 rethink-sans-semiBold">Atualização de logo</li>
                                <li class="ps-1 rethink-sans-semiBold">Material de escritório</li>
                                <li class="ps-1 rethink-sans-semiBold">Peças personalizadas</li>
                            </ul>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="project-list-item dark-background-medium p-3">
                            <img src="{{asset('build/client/images/interativo.svg')}}" alt=Icon title="Icon interativo" loading=lazy>
                            <h3 class="emphasis mt-3 rethink-sans-bold">Site Interativo</h3>
                            <ul class=ps-3>
                                <li class="ps-1 rethink-sans-semiBold">Sites Dinâmicos</li>
                                <li class="ps-1 rethink-sans-semiBold">Sites Gerenciáveis <span>(Atualize você mesmo)</span></li>
                                <li class="ps-1 rethink-sans-semiBold">Landing Pages</li>
                            </ul>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="project-list-item dark-background-medium p-3">
                            <img src="{{asset('build/client/images/sitema.svg')}}" alt=Icon title="Icon sistema" loading=lazy>
                            <h3 class="emphasis mt-3 rethink-sans-bold">Sistemas</h3>
                            <ul class=ps-3>
                                <li class="ps-1 rethink-sans-semiBold">Consultoria estratégica de processos</li>
                                <li class="ps-1 rethink-sans-semiBold">Desenvolvimento de Sistemas Personalizados</li>
                            </ul>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="project-list-item dark-background-medium p-3">
                            <img src="{{asset('build/client/images/eccomerce.svg')}}" alt=Icon title="Icon eccomerce" loading=lazy>
                            <h3 class="emphasis mt-3 rethink-sans-bold">E-commerce</h3>
                            <ul class=ps-3>
                                <li class="ps-1 rethink-sans-semiBold">Loja virtual completa</li>
                                <li class="ps-1 rethink-sans-semiBold">Catálogo de produtos</li>
                                <li class="ps-1 rethink-sans-semiBold">Integração com pagamento</li>
                                <li class="ps-1 rethink-sans-semiBold">Carrinho e checkout</li>
                            </ul>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="project-list-item dark-background-medium p-3">
                            <img src="{{asset('build/client/images/marketing.svg')}}" alt=Icon title="Icon marketing" loading=lazy>
                            <h3 class="emphasis mt-3 rethink-sans-bold">Marketing Digital</h3>
                            <ul class=ps-3>
                                <li class="ps-1 rethink-sans-semiBold">Gestão de redes sociais</li>
                                <li class="ps-1 rethink-sans-semiBold">Criação de conteúdo</li>
                                <li class="ps-1 rethink-sans-semiBold">Tráfego pago <span>(Meta e Google)</span></li>
                                <li class="ps-1 rethink-sans-semiBold">Análises e relatórios</li>
                            </ul>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="project-list-item dark-background-medium p-3">
                            <img src="{{asset('build/client/images/hospedagem.svg')}}" alt=Icon title="Icon hospedagem" loading=lazy>
                            <h3 class="emphasis mt-3 rethink-sans-bold">Hospedagem</h3>
                            <ul class=ps-3>
                                <li class="ps-1 rethink-sans-semiBold">Servidores otimizados</li>
                                <li class="ps-1 rethink-sans-semiBold">E-mail corporativo</li>
                                <li class="ps-1 rethink-sans-semiBold">Registro de domínio</li>
                                <li class="ps-1 rethink-sans-semiBold">Suporte técnico</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=btn-navigation>
                    <div class=swiper-button-prev></div>
                    <div class=swiper-button-next></div>
                </div>
            </div>
        </div>
    </div>
    <div id=what-we-do></div>
</section>
<section id=portfolio class="d-flex gap-4 flex-column dark-background py-4">
    <div class="d-flex justify-content-between flex-md-row">
        <div class="carousel-top-width w-100-md position-relative" data-aos=fade-left data-aos-delay=450>
            <div class="portfolio-top-details-slider swiper init-swiper">
                <script type=application/json class=swiper-config>
                    {
                        "loop": true,
                        "loopAdditionalSlides": 1,
                        "speed": 10100,
                        "autoplay": {
                            "delay": 0,
                            "pauseOnMouseEnter": false,
                            "reverseDirection": true
                        },
                        "slidesPerView": 4,
                        "slidesPerGroup": 1,
                        "spaceBetween": 10,
                        "centeredSlides": false,
                        "watchSlidesProgress": true,
                        "watchSlidesVisibility": true,
                        "pagination": {
                            "type": "progressbar"
                        },
                        "simulateTouch": false,
                        "breakpoints": {
                            "1024": {
                                "slidesPerView": 4,
                                "spaceBetween": 10
                            },
                            "830": {
                                "slidesPerView": 3,
                                "spaceBetween": 10
                            },
                            "768": {
                                "slidesPerView": 2,
                                "spaceBetween": 10
                            },
                            "414": {
                                "slidesPerView": 1.5,
                                "spaceBetween": 10
                            },
                            "375": {
                                "slidesPerView": 1.2,
                                "spaceBetween": 10
                            },
                            "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 10
                            }
                        }
                    }
                </script>
                <div class="portfolio-top swiper-wrapper align-items-center">
                    <div class=swiper-slide>
                        <picture>
                            <source srcset="{{asset('build/client/images/mckup/telenordeste-mobile.webp ')}}" media="(max-width: 600px)" type=image/webp>
                            <source srcset="{{asset('build/client/images/mckup/telenordeste.webp')}}" type=image/webp>
                            <img src="{{asset('build/client/images/mckup/telenordeste.webp')}}" alt=Telenordeste title=Telenordeste loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                        </picture>
                    </div>
                    <div class=swiper-slide>
                        <picture>
                            <source srcset="{{asset('build/client/images/mckup/sushitan-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                            <source srcset="{{asset('build/client/images/mckup/sushitan.webp')}}" type=image/webp>
                            <img src="{{asset('build/client/images/mckup/sushitan.webp')}}" alt=Sushitan title=Sushitan loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                        </picture>
                    </div>
                    <div class=swiper-slide>
                        <picture>
                            <source srcset="{{asset('build/client/images/mckup/pindalar-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                            <source srcset="{{asset('build/client/images/mckup/pindalar.webp')}}" type=image/webp>
                            <img src="{{asset('build/client/images/mckup/pindalar.webp')}}" alt=Pindalar title=Pindalar loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                        </picture>
                    </div>
                    <div class=swiper-slide>
                        <picture>
                            <source srcset="{{asset('build/client/images/mckup/viva-ervas-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                            <source srcset="{{asset('build/client/images/mckup/viva-ervas.webp')}}" type=image/webp>
                            <img src="{{asset('build/client/images//mckup/viva-ervas.webp')}}" alt="Viva ervas" title="Viva ervas" loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                        </picture>
                    </div>
                    <div class=swiper-slide>
                        <picture>
                            <source srcset="{{asset('build/client/images/mckup/portfolio-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                            <source srcset="{{asset('build/client/images/mckup/portfolio.webp')}}" type=image/webp>
                            <img src="{{asset('build/client/images/mckup/portfolio.webp')}}" alt=Protfolio title=Protfolio loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                        </picture>
                    </div>
                </div>
                <div class=swiper-pagination></div>
            </div>
        </div>
        <div class="rating w-100-md">
            <div class="col-7 width-md m-auto d-flex justify-content-center align-items-baseline flex-column h-100 gap-2" data-aos=fade-down data-aos-delay=450>
                <span class="rethink-sans-medium"><img src="{{asset('build/client/images/somar.png')}}" alt="Icone mais" class="me-2 w-100" loading=lazy> Criatividade</span>
                <span class="rethink-sans-medium"><img src="{{asset('build/client/images/somar.png')}}" alt="Icone mais" class="me-2 w-100" loading=lazy> Modernidade</span>
                <span class="rethink-sans-medium"><img src="{{asset('build/client/images/somar.png')}}" alt="Icone mais" class="me-2 w-100" loading=lazy> Satisfação</span>
                <div class="clients d-flex flex-wrap mt-3">
                    <div class=client-img>
                        <img src="{{asset('build/client/images/client-group.webp')}}" alt="Logo de clientes" title="Logo de clientes" class=w-100 loading=lazy>
                    </div>
                </div>
                <div class="count-star d-flex flex-column justify-content-center align-items-start col-12 gap-3">
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <div id="stars-container" class="d-flex justify-content-center align-content-center"></div>
                        <p class="mb-0 rethink-sans-semiBold">4.9 (5.0)</p>
                    </div>
                    <p class="mb-0 rethink-sans-semiBold">Qualidade garantida.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="portfolio-bottom-details-slider swiper init-swiper" data-aos=fade-right data-aos-delay=350>
        <script type=application/json class=swiper-config>
            {
                "loop": true,
                "loopAdditionalSlides": 0,
                "speed": 10000,
                "autoplay": {
                    "delay": 0,
                    "pauseOnMouseEnter": false,
                    "reverseDirection": true
                },
                "slidesPerView": 5,
                "slidesPerGroup": 1,
                "spaceBetween": 10,
                "centeredSlides": false,
                "watchSlidesProgress": true,
                "watchSlidesVisibility": true,
                "pagination": {
                    "type": "progressbar"
                },
                "simulateTouch": false,
                "breakpoints": {
                    "0": {
                        "slidesPerView": 2
                    },
                    "375": {
                        "slidesPerView": 2.5,
                        "spaceBetween": 10
                    },
                    "415": {
                        "slidesPerView": 3
                    },
                    "769": {
                        "slidesPerView": 5
                    }
                }
            }
        </script>
        <div class="portfolio-bottom swiper-wrapper align-items-center">
            <div class=swiper-slide>
                <picture>
                    <source srcset="{{asset('build/client/images/mckup/sindacs-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                    <source srcset="{{asset('build/client/images/mckup/sindacs.webp')}}" type=image/webp>
                    <img src="{{asset('build/client/images/mckup/sindacs.webp')}}" alt="Hey Arte" title="Hey Arte" loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                </picture>
            </div>
            <div class=swiper-slide>
                <picture>
                    <source srcset="{{asset('build/client/images/mckup/hey-arte-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                    <source srcset="{{asset('build/client/images/mckup/hey-arte.webp')}}" type=image/webp>
                    <img src="{{asset('build/client/images/mckup/hey-arte.webp')}}" alt="Hey Arte" title="Hey Arte" loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                </picture>
            </div>
            <div class=swiper-slide>
                <picture>
                    <source srcset="{{asset('build/client/images/mckup/flygo-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                    <source srcset="{{asset('build/client/images/mckup/flygo.webp')}}" type=image/webp>
                    <img src="{{asset('build/client/images/mckup/flygo.webp')}}" alt="Flygo Turismo" title="Flygo Turismo" loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                </picture>
            </div>
            <div class=swiper-slide>
                <picture>
                    <source srcset="{{asset('build/client/images/mckup/anilda-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                    <source srcset="{{asset('build/client/images/mckup/anilda.webp')}}" type=image/webp>
                    <img src="{{asset('build/client/images/mckup/anilda.webp')}}" alt="Anilda Advogado" title="Anilda Advogado" loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                </picture>
            </div>
            <div class=swiper-slide>
                <picture>
                    <source srcset="{{asset('build/client/images/mckup/hive-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                    <source srcset="{{asset('build/client/images/mckup/hive.webp')}}" type=image/webp>
                    <img src="{{asset('build/client/images/mckup/hive.webp')}}" alt=Hive title=Hive loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                </picture>
            </div>
            <div class=swiper-slide>
                <picture>
                    <source srcset="{{asset('build/client/images/mckup/eau-sports-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                    <source srcset="{{asset('build/client/images/mckup/eau-sports.webp')}}" type=image/webp>
                    <img src="{{asset('build/client/images/mckup/eau-sports.webp')}}" alt="EAU Sports" title="EAU Sports" loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                </picture>
            </div>
            <div class=swiper-slide>
                <picture>
                    <source srcset="{{asset('build/client/images/mckup/painel-gerenciador-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                    <source srcset="{{asset('build/client/images/mckup/painel-gerenciador.webp')}}" type=image/webp>
                    <img src="{{asset('build/client/images/mckup/painel-gerenciador.webp')}}" alt="Painel gerenciador de conteúdo" title="Painel gerenciador de conteúdo" loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                </picture>
            </div>
        </div>
        <div class=swiper-pagination></div>
    </div>
</section>
<section id=proccess class="light-background py-5">
    <div class="proccess-top max-width m-auto">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 text-center text-md-start" data-aos=fade-left data-aos-delay=150>
            <div class=proccess-top__title>
                <h2 class="rethink-sans-bold mb-0">PASSO A PASSO</h2>
                <h3 class="rethink-sans-semiBold emphasis mb-0"> O Processo</h3>
            </div>
            <p class="rethink-sans-regular col-12 col-md-4">A gente te guia em um processo claro e objetivo. Com ele, transformamos sua visão em um projeto que gere resultados de verdade para o seu negócio</p>
            <a href=https://wa.me/5571996483853 target=_blank rel="noopener noreferrer" class="rethink-sans-regular ps-4 text-white call-to-action d-flex justify-content-center gap-4 align-items-center">
Fale com a gente!
<i class="bi bi-whatsapp rounded-circle d-flex justify-content-center align-items-center"></i>
</a>
        </div>
        <div class=d-flex>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 g-3 mt-5">
                <div class=col data-aos=fade-up data-aos-delay=150>
                    <div class="proccess-list-item grey-medium-background p-3">
                        <h2 class="emphasis mt-3 rethink-sans-bold">01</h2>
                        <h3 class="mt-2 rethink-sans-bold">Definição das Necessidades</h3>
                        <p class="font-15 mt-3">Conversamos sobre cada detalhe do seu negócio e seus objetivos. Ajudamos a definir o que o seu projeto realmente precisa para dar certo.</p>
                    </div>
                </div>
                <div class=col data-aos=fade-up data-aos-delay=300>
                    <div class="proccess-list-item grey-medium-background p-3">
                        <h2 class="emphasis mt-3 rethink-sans-bold">02</h2>
                        <h3 class="mt-2 rethink-sans-bold">Captação de informações</h3>
                        <p class="font-15 mt-3">Com base em nossa conversa, coletamos todas as informações cruciais. Essa etapa garante que cada detalhe do seu objetivo seja considerado</p>
                    </div>
                </div>
                <div class=col data-aos=fade-up data-aos-delay=450>
                    <div class="proccess-list-item grey-medium-background p-3">
                        <h2 class="emphasis mt-3 rethink-sans-bold">03</h2>
                        <h3 class="mt-2 rethink-sans-bold">Seguimento do Projeto</h3>
                        <p class="font-15 mt-3">Nossa equipe começa a criar o projeto com base nas informações coletadas, mantendo você atualizado a cada etapa.</p>
                    </div>
                </div>
                <div class=col data-aos=fade-up data-aos-delay=600>
                    <div class="proccess-list-item grey-medium-background p-3">
                        <h2 class="emphasis mt-3 rethink-sans-bold">04</h2>
                        <h3 class="mt-2 rethink-sans-bold">Entrega Final do Projeto</h3>
                        <p class="font-15 mt-3">Uma vez aprovado, seu projeto é finalizado e entregue. Você recebe todos os arquivos e acessos necessários de forma organizada.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id=transformed class="transformed position-relative dark-background-medium">
    <div class="max-width m-auto transformed-padding d-flex flex-column flex-md-row align-items-center">
        <div class="col-12 col-md-8 text-center text-md-start" data-aos=fade-down data-aos-delay=200>
            <h2 class="rethink-sans-bold mb-0">TRANSFORME</h2>
            <h3 class="rethink-sans-semiBold mt-3 mb-0 text-white col-lg-11 col-12">
                Chegou a hora contar com quem realmente entende do assunto!
            </h3>
            <p class="text-white rethink-sans-regular mt-3 col-12 col-lg-10">
                São mais de 10 anos de experiência transformando ideias em resultados! Com um atendimento 100% humanizado e dedicado, garantimos que suas necessidades serão ouvidas e atendidas com a máxima qualidade.
            </p>
            <a href=https://wa.me/5571996483853 target=_blank rel="noopener noreferrer" class="mt-4 rethink-sans-regular ps-4 text-white call-to-action d-flex justify-content-between align-items-center">
                Fale com a gente!
                <i class="bi bi-whatsapp rounded-circle d-flex justify-content-center align-items-center"></i>
            </a>
        </div>
    </div>
    <picture>
        <source srcset="{{asset('build/client/images/firula-transformed-mobile.webp')}}" class="position-absolute bottom-0 w-auto img-fluid d-block" data-aos=fade-up data-aos-delay=200 loading="lazy" media="(max-width: 600px)" type=image/webp>
        <source srcset="{{asset('build/client/images/firula-transformed.webp')}}" class="position-absolute bottom-0 w-auto img-fluid d-block" data-aos=fade-up data-aos-delay=200 loading="lazy" type=image/webp>
        <img src="{{asset('build/client/images/firula-transformed.webp')}}" class="position-absolute bottom-0 w-auto img-fluid d-block" data-aos=fade-up data-aos-delay=200 loading=lazy alt=transformed title=transformed loading="lazy">
    </picture>
</section>
<section id=trust-whi class="trust-whi position-relative py-5 trust-whi-background">
    <img src="{{asset('build/client/images/hand.png')}}" alt="image of hand" title="image of hand" class="position-absolute top-0 hand" data-aos=fade-left data-aos-delay=950 loading=lazy>
    <div class="max-width m-auto d-flex flex-column flex-md-row justify-content-end align-items-center text-center text-md-start py-5" data-aos=zoom-in data-aos-delay=150>
        <h2 class="rethink-sans-semiBold col-12 col-md-8 mt-4 ps-md-4">
            <span>AS PESSOAS</span> <br> que confiam na WHI como parceira de crescimento
        </h2>
        <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-end align-items-center mt-3 mt-md-0">
            <a href=https://wa.me/5571996483853 target=_blank rel="noopener noreferrer" class="mt-0 rethink-sans-regular ps-4 text-white call-to-action d-flex justify-content-center gap-4 align-items-center">
            Fale com a gente!
            <i class="bi bi-whatsapp rounded-circle d-flex justify-content-center align-items-center"></i>
            </a>
        </div>
    </div>
    <div class="max-width-project m-auto" data-aos=zoom-in data-aos-delay=150>
        <div class="carousel-trust-whi position-relative">
            <div class="trust-whi-details-slider swiper init-swiper">
                <script type=application/json class=swiper-config>
                    {
                        "speed": 500,
                        "slidesPerView": 3,
                        "slidesPerGroup": 1,
                        "spaceBetween": 10,
                        "centeredSlides": true,
                        "initialSlide": 1,
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "navigation": {
                            "nextEl": ".swiper-button-next",
                            "prevEl": ".swiper-button-prev"
                        },
                        "breakpoints": {
                            "1024": {
                                "slidesPerView": 3,
                                "spaceBetween": 10
                            },
                            "769": {
                                "slidesPerView": 2,
                                "spaceBetween": 15
                            },
                            "480": {
                                "slidesPerView": 2,
                                "spaceBetween": 15
                            },
                            "359": {
                                "slidesPerView": 1,
                                "spaceBetween": 5
                            },
                            "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 5
                            }
                        }
                    }
                </script>
                <div class="carousel-trust-whi swiper-wrapper align-items-center py-2 px-2">
                    <div class=swiper-slide>
                        <div class="trust-whi-list-item bg-white p-4 rounded-4 border border-dark">
                            <img src="{{asset('build/client/images/aspas-left.svg')}}" alt="Aspas Left" title="Aspas Left" class=apas-left loading=lazy>
                            <p class="text mt-3">Recomendo o trabalho da WHI, especialistas em desenvolvimento de sites, integrações e atividades correlatas. Foram os responsáveis por criar, integrar e configurar o site de vendas da minha fábrica, entregando um design
                                funcional, intuitivo e alinhado às nossas necessidades. Além de oferecerem suporte técnico confiável e rápido. Parceiros essenciais para minha presença online.</p>
                            <h3 class="rethink-sans-bold text-primary mb-0">Pedro Manot</h3>
                            <h4 class="text-secondary small">CEO da EAU Sports</h4>
                            <img src="{{asset('build/client/images/aspas-right.svg')}}" alt="Aspas Right" title="Aspas Right" class=apas-right loading=lazy>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="trust-whi-list-item bg-white p-4 rounded-4 border border-dark">
                            <img src="{{asset('build/client/images/aspas-left.svg')}}" alt="Aspas Left" title="Aspas Left" class=apas-left loading=lazy>
                            <p class="text mt-3">Tivemos uma experiência muito bacana com a WHI durante o desenvolvimento de nossos sites. A equipe demonstrou grande comprometimento com os prazos e esteve sempre disponível para ajudar na resolução de problemas, garantindo
                                um processo ágil e eficiente. Sem dúvida, continuaremos cultivando essa parceria de sucesso.</p>
                            <h3 class="rethink-sans-bold text-primary mb-0">Laura Camilo</h3>
                            <h4 class="text-secondary small">Diretora executiva L7Design</h4>
                            <img src="{{asset('build/client/images/aspas-right.svg')}}" alt="Aspas Right" title="Aspas Right" class=apas-right loading=lazy>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="trust-whi-list-item bg-white p-4 rounded-4 border border-dark">
                            <img src="{{asset('build/client/images/aspas-left.svg')}}" alt="Aspas Left" title="Aspas Left" class=apas-left loading=lazy>
                            <p class="text mt-3">Trabalhar com a WHI foi uma experiência incrível! Desde o início, se mostraram extremamente profissionais e talentosos. Entenderam perfeitamente a visão que eu tinha para o meu site e trouxe ideias criativas que superaram
                                minhas expectativas. O processo de desenvolvimento foi fluido. Estou muito satisfeito com o resultado final; meu site não apenas tem uma aparência incrível, mas também é funcional e fácil de navegar.</p>
                            <h3 class="rethink-sans-bold text-primary mb-0">Manuel Santos</h3>
                            <h4 class="text-secondary small">Diretor Executivo da Pindalar</h4>
                            <img src="{{asset('build/client/images/aspas-right.svg')}}" alt="Aspas Right" title="Aspas Right" class=apas-right loading=lazy>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="trust-whi-list-item bg-white p-3 rounded-4 border border-dark">
                            <img src="{{asset('build/client/images/aspas-left.svg ')}}" alt="Aspas Left" title="Aspas Left" class=apas-left loading=lazy>
                            <p class="text mt-3">Na WHI tivemos o melhor custo-benefício que encontramos no mercado, além de rápidos e criativos, fazem uma reunião de apresentação da empresa e do projeto final, confirmando se está a contento. Gostei bastante e agora
                                darei seguimento aos demais projetos da empresa.</p>
                            <h3 class="rethink-sans-bold text-primary mb-0">Wesley de Morais</h3>
                            <h4 class="text-secondary small">Diretor Executivo da Flygo Turismo</h4>
                            <img src="{{asset('build/client/images/aspas-right.svg')}}" alt="Aspas Right" title="Aspas Right" class=apas-right loading=lazy>
                        </div>
                    </div>
                </div>
                <div class=btn-navigation>
                    <div class=swiper-button-prev></div>
                    <div class=swiper-button-next></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id=perfect-choice class="perfect-choice py-5 grey-medium-background" data-aos=fade data-aos-delay=350>
    <div class="max-width m-auto d-flex flex-column flex-md-row justify-content-between align-items-center py-4">
        <div class="content-lef col-12 col-md-4 text-center text-md-end">
            <h2 class=rethink-sans-semiBold> <span>WHI</span>, a escolha perfeita para empresas que precisam:</h2>
            <div class="position-relative d-flex justify-content-center flex-column align-items-center">
                <img src="{{asset('build/client/images/robot-hand.png')}}" alt="Mão de robô com lâmpada" title="Mão de robô com lâmpada" class="w-100 robot-lamp m-auto me-md-5 d-none d-md-block" loading="lazy">
                <a href=https://wa.me/5571996483853 target=_blank rel="noopener noreferrer" class="mt-0 rethink-sans-regular ps-4 text-white call-to-action d-flex justify-content-center gap-4 align-items-center">
                Fale com a gente!
                <i class="bi bi-whatsapp rounded-circle d-flex justify-content-center align-items-center"></i>
                </a>
            </div>
        </div>
        <div class="content-right col-12 col-md-7 mt-4 mt-md-0">
            <div class="d-flex justify-content-center align-content-center flex-wrap gap-4 px-3">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="perfect-choice-list-item bg-white p-3 rounded-4 w-100">
                        <h3 class="mt-2 rethink-sans-bold">Transformar a Imagem da Sua Marca</h3>
                        <p class="text mt-2">Criamos uma identidade visual que conecta com seu público e mostra o que é o seu negócio.</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="perfect-choice-list-item bg-white p-3 rounded-4 w-100">
                        <h3 class="mt-2 rethink-sans-bold">Impulsionar o Crescimento Digital</h3>
                        <p class="text mt-2">Alcance mais pessoas, te colocamos no digital, com estratégias que atraem novos clientes e fazem sua empresa crescer.</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="perfect-choice-list-item bg-white p-3 rounded-4 w-100">
                        <h3 class="mt-2 rethink-sans-bold">Maximizar Suas Vendas Online</h3>
                        <p class="text mt-2">A gente cria a melhor experiência de compra online, expandindo sua operação e conquistando novos mercados para você.</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="perfect-choice-list-item bg-white p-3 rounded-4 w-100">
                        <h3 class="mt-2 rethink-sans-bold">Fortalecer a Conexão com Seu Público</h3>
                        <p class="text mt-2"> Construir uma relação com o marketing digital que transforma seguidores em clientes da sua marca.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="agenda" class="agenda container-fluid position-relative pb-4" data-aos="zoom-in" data-aos-delay="150">
    <svg class="left-1 position-absolute" width="45" height="120" viewBox="0 0 57 151" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M-20.8206 101.907C-19.0253 103.042 -17.7047 104.767 -17.1447 106.707L-10.4647 129.024C-10.1429 130.006 -10.0252 131.021 -10.1183 132.009C-10.2115 132.998 -10.5137 133.939 -11.0072 134.778C-11.5006 135.617 -12.1753 136.336 -12.9915 136.894C-13.8077 137.451 -14.7489 137.836 -15.7596 138.025C-16.7702 138.213 -17.8299 138.203 -18.8761 137.993C-19.9224 137.783 -20.934 137.379 -21.8514 136.803C-22.7688 136.228 -23.5734 135.493 -24.2177 134.643C-24.8621 133.792 -25.3332 132.843 -25.6032 131.851L-32.2608 109.499C-32.7011 108.029 -32.6828 106.508 -32.2084 105.131C-31.734 103.754 -30.8249 102.584 -29.5972 101.769C-28.3695 100.954 -26.8789 100.532 -25.3156 100.557C-23.7524 100.581 -22.1875 101.051 -20.8206 101.907Z" fill="url(#paint0_linear_551_356)"/>
    <path d="M49.5774 38.0734C50.9102 38.9567 51.9782 40.1709 52.648 41.5645C53.3178 42.9581 53.5599 44.4695 53.344 45.91C53.1282 47.3506 52.4639 48.6566 51.4341 49.6651C50.4043 50.6737 49.0546 51.3401 47.5532 51.5814L-35.8415 65.1739C-37.8488 65.4475 -39.9666 64.949 -41.7439 63.7845C-43.5212 62.62 -44.8177 60.8815 -45.3573 58.9391C-45.897 56.9967 -45.6373 55.0038 -44.6334 53.3847C-43.6295 51.7656 -41.9607 50.6482 -39.9824 50.2703L43.4055 36.711C44.4366 36.5342 45.5155 36.5638 46.5765 36.798C47.6376 37.0322 48.6586 37.4662 49.5774 38.0734Z" fill="url(#paint1_linear_551_356)"/>
    <path d="M52.5029 48.2959L-7.74106 144.451C-7.87572 144.666 -8.00477 144.872 -8.13382 145.078C-8.26288 145.284 -8.26288 145.284 -8.33021 145.392C-8.37212 145.469 -8.41896 145.544 -8.47048 145.616C-8.50976 145.678 -8.56586 145.768 -8.67074 145.802C-9.14418 146.264 -9.69184 146.651 -10.2969 146.953C-10.7281 147.161 -11.1801 147.332 -11.6484 147.466C-11.8837 147.53 -12.1235 147.58 -12.3732 147.623L-12.7423 147.678L-13.0376 147.705C-13.6856 147.761 -14.3461 147.741 -15.0048 147.645L-15.3677 147.58C-15.6347 147.527 -15.8999 147.461 -16.1622 147.381L-16.5227 147.268C-16.6526 147.186 -16.7726 147.111 -16.9575 147.095L-17.2474 146.913L-17.3474 146.851C-17.4434 146.797 -17.5369 146.738 -17.6274 146.675C-17.859 146.549 -18.0828 146.409 -18.2973 146.256C-18.5387 146.123 -18.7725 145.976 -18.9971 145.817L-19.319 145.553C-19.4041 145.512 -19.4847 145.461 -19.559 145.403L-19.7889 145.259L-19.9889 145.133L-20.1996 144.914C-21.1069 143.932 -21.7691 142.777 -22.1284 141.548L-28.555 120.25C-28.0354 121.75 -27.0837 123.118 -25.8147 124.188C-24.5458 125.257 -23.014 125.983 -21.4044 126.276C-19.7948 126.57 -18.1763 126.419 -16.7445 125.842C-15.3127 125.265 -14.1288 124.287 -13.3359 123.025L30.7711 52.626C31.5635 51.3628 31.9295 49.8701 31.8248 48.3289C31.72 46.7877 31.1491 45.2644 30.1811 43.9437C29.2132 42.6229 27.8899 41.5616 26.3718 40.8884C24.8537 40.2153 23.206 39.9592 21.6287 40.1513L43.5042 36.5473C44.7614 36.3311 46.088 36.4324 47.3576 36.8415L47.6524 36.9264L47.8524 37.0517L48.1104 37.151L48.3504 37.3014L48.7003 37.5206C48.9302 37.6647 49.1702 37.815 49.4002 37.9591C49.6301 38.1032 49.8501 38.241 50.0701 38.3788L50.35 38.5542L50.45 38.6168L50.74 38.7985L51.0794 39.1234C51.1692 39.2138 51.254 39.3085 51.3332 39.4072C51.5272 39.6022 51.7031 39.8126 51.8585 40.0355C51.9484 40.0919 52.0191 40.2235 52.0811 40.3247C52.4521 40.8742 52.7601 41.4563 52.999 42.0596C53.0297 42.1661 53.0717 42.2547 53.0924 42.355L53.2526 42.6549C53.3284 42.8897 53.3888 43.1274 53.4332 43.3666C53.5172 43.8463 53.5601 44.3278 53.5615 44.8064C53.5519 45.4821 53.4421 46.1437 53.235 46.7718L53.1492 47.0422C53.1088 47.1207 53.0619 47.1956 53.0089 47.2661C52.9472 47.3646 52.8854 47.4631 52.8181 47.5706C52.7508 47.6781 52.6432 48.0721 52.5029 48.2959Z" fill="#CBFF4D"/>
    <defs>
    <linearGradient id="paint0_linear_551_356" x1="-15.7365" y1="136.285" x2="-25.2914" y2="91.9912" gradientUnits="userSpaceOnUse">
    <stop stop-color="#CBFF4D"/>
    <stop offset="1" stop-color="#CBFF4D"/>
    </linearGradient>
    <linearGradient id="paint1_linear_551_356" x1="56.8392" y1="42.6231" x2="-42.6811" y2="69.5648" gradientUnits="userSpaceOnUse">
    <stop stop-color="#CBFF4D"/>
    <stop offset="1" stop-color="#CBFF4D"/>
    </linearGradient>
    </defs>
    </svg>

    <svg class="right-1 position-absolute" width="42" height="97" viewBox="0 0 42 97" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M3.71259 64.4925C2.98279 63.7589 2.46571 62.8481 2.22555 61.8733C1.9854 60.8985 2.03274 59.9026 2.36172 59.0092C2.69069 58.1158 3.28679 57.3643 4.07601 56.848C4.86523 56.3317 5.8128 56.0733 6.80106 56.105L61.7852 57.943C62.4471 57.9651 63.1109 58.1168 63.7387 58.3897C64.3664 58.6625 64.9459 59.051 65.4439 59.5331C65.9419 60.0152 66.3487 60.5813 66.6411 61.1992C66.9335 61.8172 67.1058 62.4747 67.1481 63.1344C67.1905 63.7941 67.102 64.443 66.8878 65.0441C66.6736 65.6451 66.3378 66.1866 65.8997 66.6374C65.4615 67.0883 64.9296 67.4399 64.3342 67.672C63.7389 67.9041 63.0917 68.0122 62.4298 67.9901L7.44644 66.1624C6.76707 66.1396 6.08598 65.9798 5.44425 65.6928C4.80252 65.4058 4.21346 64.9975 3.71259 64.4925Z" fill="url(#paint0_linear_551_360)"/>
    <path d="M18.4118 65.0425C19.4141 65.9964 20.7007 66.5809 22.0247 66.6837L7.49793 66.1607C6.66171 66.1377 5.82392 65.911 5.05768 65.5003L4.88523 65.4035L4.75016 65.323L4.62238 65.2015L4.48349 65.0694L4.27063 64.915C4.14285 64.7934 4.00951 64.6666 3.88173 64.5451C3.75395 64.4236 3.63172 64.3074 3.50949 64.1911L3.35949 64.0485L3.29838 63.9903L3.13171 63.8318L2.95893 63.5908L2.82907 63.3713C2.7359 63.2218 2.65363 63.0666 2.58297 62.9069L2.47937 62.6932C2.31056 62.2934 2.19307 61.8784 2.12985 61.4587C2.11158 61.3939 2.10319 61.3277 2.10499 61.2623C2.08813 61.1834 2.07878 61.1038 2.0771 61.0246C2.06147 60.8625 2.0564 60.7006 2.06193 60.5399C2.07313 60.2174 2.11357 59.8994 2.18278 59.5896C2.28299 59.1576 2.44003 58.7457 2.65001 58.364C2.69315 58.3186 2.73628 58.2733 2.74684 58.2066C2.78203 58.1633 2.82046 58.1229 2.86186 58.0856C2.91937 58.0251 2.97209 57.9697 3.02959 57.9092C3.08711 57.8488 3.25005 57.6774 3.36508 57.5565L54.8275 3.44312C54.9426 3.32217 55.0528 3.20626 55.163 3.09036C55.2732 2.97445 55.2732 2.97445 55.3308 2.91398C55.3735 2.86494 55.4202 2.81954 55.4705 2.77816C55.5088 2.73784 55.5472 2.69753 55.6181 2.67859C55.988 2.44611 56.3913 2.26513 56.8179 2.14012C57.1086 2.07744 57.4064 2.03966 57.7083 2.02716C57.8681 2.01111 58.0303 2.00804 58.1931 2.01799C58.2723 2.0157 58.3523 2.02104 58.4319 2.03392C58.4984 2.02699 58.5666 2.03034 58.6341 2.04385C59.0549 2.09101 59.4732 2.18913 59.8798 2.33601L60.0984 2.42876C60.2629 2.48952 60.4236 2.56221 60.5794 2.6462L60.8003 2.76992L61.0545 2.92534L61.2212 3.08385L61.2823 3.14197L61.4323 3.28462C61.5545 3.40086 61.6768 3.5171 61.8046 3.63862C61.9323 3.76014 62.0657 3.88694 62.1935 4.00847L62.3823 4.18811L62.5212 4.3202L62.649 4.44172L62.7362 4.57259L62.8415 4.73995C63.2923 5.4838 63.561 6.30974 63.6236 7.14399L64.875 21.6262C64.7441 20.5972 64.3189 19.599 63.6506 18.7523C62.9824 17.9055 62.0997 17.2465 61.1094 16.8547C60.119 16.463 59.0632 16.3553 58.0696 16.5448C57.0761 16.7342 56.1873 17.2126 55.5106 17.9222L17.8506 57.5221C17.3918 58.0045 17.0423 58.5818 16.8219 59.2211C16.6016 59.8604 16.5148 60.5491 16.5664 61.2479C16.6181 61.9467 16.8072 62.6419 17.123 63.2939C17.4388 63.9458 17.8751 64.5417 18.407 65.0475L18.4118 65.0425Z" fill="#FF7A1D"/>
    <defs>
    <linearGradient id="paint0_linear_551_360" x1="15.8983" y1="44.2473" x2="53.3381" y2="79.8531" gradientUnits="userSpaceOnUse">
    <stop stop-color="#CC6517"/>
    <stop offset="1" stop-color="#F89623"/>
    </linearGradient>
    </defs>
    </svg>

    <div class="container">
        <div class="row align-items-baseline justify-content-between py-5">            
            <!-- Coluna Esquerda -->
            <div class="col-12 col-md-5 mb-4 mb-md-0">
                <p class="mb-4 rethink-sans-regular text-p">
                    Tenha acesso a nossa disponibilidade e agende uma vídeo conferência com o nosso time 
                    que entenderá a fundo sobre a sua necessidade
                </p>
                <a href="https://calendar.google.com/calendar/u/0/appointments/schedules/AcZssZ314UlBP0vKZFJm6SIrz-GrMY4D8U3mjWihIKcN9PrL0msuuZ2WnFum5cO3eTMISHOB9csIzmeH" 
                target="_blank" class="btn btn-lg rethink-sans-semiBold text-p text-uppercase call-to-action d-flex justify-content-center align-items-center" rel="noopener noreferrer">
                    Agendar agora
                </a>
            </div>

            <!-- Coluna Direita -->
            <div class="col-12 col-md-4 p-0">
                <h2 class="mb-0 text-p rethink-sans-semiBold col-12 col-lg-11 text-start m-auto me-0">
                    Agende seu bate papo <span>AGORA</span>
                </h2>
            </div>

        </div>
    </div>
</section>

<section id=faq class="faq blue-background">
    <div class=me-5>
        <div class="d-flex flex-wrap">
            <div class=col-md-6 data-aos=zoom-in data-aos-delay=150>
                <div class=eng-title>
                    <h2 class="ex title rethink-sans-bold">AQUI,</h2>
                    <h3 class="ex emphasis rethink-sans-semiBold">a gente explica!</h3>
                </div>
                <div class=img>
                    <img src="{{asset('build/client/images/hand-faq.png')}}" alt=hand-faq title=hand-faq class="img-fluid mt-3 hand-faq" loading=lazy>
                </div>
            </div>
            <div class=col-md-6>
                <div class=answer>
                    <div class=accordion id=faqAccordion>
                        <div class="accordion-item mb-3 rounded-4" data-aos=fade-up data-aos-delay=150>
                            <h2 class="accordion-header w-100 ms-0" id=headingOne>
                                <button class="accordion-button collapsed rethink-sans-semiBold" type=button data-bs-toggle=collapse data-bs-target=#collapseOne aria-expanded=false aria-controls=collapseOne>
Qual o valor de um projeto com a WHI?
</button>
                            </h2>
                            <div id=collapseOne class="accordion-collapse collapse" aria-labelledby=headingOne data-bs-parent=#faqAccordion>
                                <div class=accordion-body>
                                    O valor de um projeto começa a partir de R$ 300, mas como cada projeto tem seu próprio toque especial, o preço pode variar conforme o que você precisa, o objetivo e a complexidade. Vamos entender juntos o que você quer e criar algo que se encaixe no seu
                                    orçamento e atenda suas expectativas.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 rounded-4" data-aos=fade-up data-aos-delay=350>
                            <h2 class="accordion-header w-100 ms-0" id=headingTwo>
                                <button class="accordion-button collapsed rethink-sans-semiBold" type=button data-bs-toggle=collapse data-bs-target=#collapseTwo aria-expanded=false aria-controls=collapseTwo>
Como posso iniciar meu projeto com a WHI?
</button>
                            </h2>
                            <div id=collapseTwo class="accordion-collapse collapse" aria-labelledby=headingTwo data-bs-parent=#faqAccordion>
                                <div class=accordion-body>
                                    Basta entrar em contato conosco através do “Fale com a gente!”. Ou agende seu bate papo aqui no site.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 rounded-4" data-aos=fade-up data-aos-delay=550>
                            <h2 class="accordion-header w-100 ms-0" id=headingThree>
                                <button class="accordion-button collapsed rethink-sans-semiBold" type=button data-bs-toggle=collapse data-bs-target=#collapseThree aria-expanded=false aria-controls=collapseThree>
Quais são os prazos para entrega de um site ou sistema?
</button>
                            </h2>
                            <div id=collapseThree class="accordion-collapse collapse" aria-labelledby=headingThree data-bs-parent=#faqAccordion>
                                <div class=accordion-body>
                                    Os prazos variam conforme a complexidade do projeto. Trabalhamos para entregar dentro do tempo estimado, garantindo qualidade e resultados, com transparência em todas as etapas.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 rounded-4" data-aos=fade-up data-aos-delay=750>
                            <h2 class="accordion-header w-100 ms-0" id=headingFour>
                                <button class="accordion-button collapsed rethink-sans-semiBold" type=button data-bs-toggle=collapse data-bs-target=#collapseFour aria-expanded=false aria-controls=collapseFour>
Como funciona o suporte após a entrega do projeto?
</button>
                            </h2>
                            <div id=collapseFour class="accordion-collapse collapse" aria-labelledby=headingFour data-bs-parent=#faqAccordion>
                                <div class=accordion-body>
                                    Oferecemos um suporte contínuo garantindo que todas as suas dúvidas sejam sanadas e que seu projeto continue atendendo às suas necessidades ao longo do tempo.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 rounded-4" data-aos=fade-up data-aos-delay=950>
                            <h2 class="accordion-header w-100 ms-0" id=headingFive>
                                <button class="accordion-button collapsed rethink-sans-semiBold" type=button data-bs-toggle=collapse data-bs-target=#collapseFive aria-expanded=false aria-controls=collapseFive>
Posso gerenciar meu próprio site depois que ele for entregue?
</button>
                            </h2>
                            <div id=collapseFive class="accordion-collapse collapse" aria-labelledby=headingFive data-bs-parent=#faqAccordion>
                                <div class=accordion-body>
                                    Sim! Desenvolvemos sites dinâmicos e gerenciáveis. Através do nosso painel é muito fácil e intuitivo alterar qualquer informação. Dessa forma, você pode inserir ou modificar o seu conteúdo sempre que necessário, sem depender de suporte técnico.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 rounded-4" data-aos=fade-right data-aos-delay=1150>
                            <h2 class="accordion-header w-100 ms-0" id=headingSix>
                                <button class="accordion-button collapsed rethink-sans-semiBold" type=button data-bs-toggle=collapse data-bs-target=#collapseSix aria-expanded=false aria-controls=collapseSix>
Quais os benefícios de trabalhar com a WHI em vez de outras agências?
</button>
                            </h2>
                            <div id=collapseSix class="accordion-collapse collapse" aria-labelledby=headingSix data-bs-parent=#faqAccordion>
                                <div class=accordion-body>
                                    Oferecemos flexibilidade no pagamento. Nosso diferencial é atendermos conforme o seu orçamento. Nossa equipe experiente entrega resultados eficazes, com soluções criativas e práticas para impulsionar o seu negócio
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
@if ($blogHighlights->count() > 0)
    <section class="py-5 blog-section">
        <div class="container position-relative">
            <div class="row align-items-center mb-5">
                <div class="col-lg-4" data-aos="fade-right" data-aos-delay="250">
                    <div class="section-title">
                        <h2 class="font-50 rethink-sans-bold title-blog-home">Acesse o nosso <span>Blog</span></h2>
                        <p class="text-color rethink-sans-regular font-16">
                            Aqui escrevemos sobre tecnologia e tudo feito para quem vive ou quer viver o digital de verdade.
                            Conteúdo atualizado semanalmente com as últimas tendências e insights do mercado.
                        </p>
                        <a href="{{route('blog')}}" class="btn btn-primary-custom">
                            Conhecer o Blog <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8" data-aos="fade-left" data-aos-delay="250">
                    <div class="row g-4">
                        @foreach ($blogHighlights as $blogHighlight)                            
                            <div class="col-md-4">
                                <div class="blog-card">
                                    <div class="card-img-container">
                                        <span class="card-category">{{$blogHighlight->category->title}}</span>
                                        <img src="{{ $blogHighlight->path_image_thumbnail ? asset('storage/'.$blogHighlight->path_image_thumbnail) : 'https://placehold.co/600x400?text=Sem+imagem&font=montserrat' }}"
                                       alt="{{ $blogHighlight->title ? $blogHighlight->title : 'Sem imagem'}}" loading="lazy">
                                    </div>
                                    <div class="card-body-custom">
                                        <h3 class="d-block text-uppercase rethink-sans-bold font-16 title-blue">{{$blogHighlight->title}}</h3>
                                        <p class="text-color rethink-sans-regular font-16">
                                            {!! substr(strip_tags($blogHighlight->text), 0, 100)!!}...
                                        </p>
                                        <a href="{{route('blog-inner', ['slug' => $blogHighlight->slug])}}" class="read-more">
                                            Ler mais <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
        <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --accent-color: #FF7A1D;
            --light-bg: #f8f9fa;
            --dark-text: #212529;
            --transition: all 0.3s ease;
        }
        
        .blog-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            position: relative;
            overflow: hidden;
        }
        
        .blog-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(67, 97, 238, 0.1) 0%, rgba(67, 97, 238, 0) 70%);
            border-radius: 50%;
            z-index: 0;
        }
        
        .section-title {
            position: relative;
            z-index: 1;
        }
        
        .section-title .title-blog-home {
            margin-bottom: 1rem;
            color: #10131C;
            background-clip: text;
        }
        
        .section-title p {
            margin-bottom: 2rem;
        }
        
        .btn-primary-custom {
            background: #FF7A1D;
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
            color: white;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(255, 122, 29, 0.3);
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-3px);
            background: #FF7A1D;
        }
        
        .blog-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: var(--transition);
            height: 100%;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            position: relative;
            z-index: 1;
        }
        
        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .card-img-container {
            position: relative;
            overflow: hidden;
            max-height: 180px;
        }
        
        .blog-card img {
            width: 100%;
            height: 100%;
            transition: var(--transition);
            object-fit: cover;
        }
        
        .blog-card:hover img {
            transform: scale(1.05);
        }
        
        .card-category {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--accent-color);
            color: white;
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 2;
        }
        
        .card-body-custom {
            padding: 1.5rem;
        }
        
        .blog-card h5 {
            line-height: 1.4;
            margin-bottom: 0.75rem;
            color: var(--dark-text);
        }
        
        .blog-card p {
            line-height: 1.5;
            margin-bottom: 1rem;
        }
        
        .read-more {
            display: inline-flex;
            align-items: center;
            font-weight: 600;
            color: #FF7A1D;
            text-decoration: none;
            transition: var(--transition);
        }
        
        .read-more i {
            margin-left: 5px;
            transition: var(--transition);
        }
        
        .read-more:hover {
            color: #FF7A1D;
        }
        
        .read-more:hover i {
            transform: translateX(5px);
        }
        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        
        /* Responsividade */
        @media (max-width: 992px) {
            .section-title {
                text-align: center;
                margin-bottom: 2rem;
            }
            
            .section-title .title-blog-home {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 768px) {
            .blog-card {
                margin-bottom: 1.5rem;
            }
        }
    </style>
@endsection
