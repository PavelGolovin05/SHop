<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="/js/input.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.flexisel.js"></script>
    <link href="/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="BOX SHOP Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--webfont-->
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- start menu -->
    <link href="/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="/css/generic.css" />
    <script type="text/javascript" src="/js/megamenu.js"></script>
    <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
    <script src="/js/jquery.etalage.min.js"></script>
    <!-- start slider -->
    <script src="/js/responsiveslides.min.js"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>
    <script type="text/javascript">
        $(window).load(function() {
            $("#flexiselDemo").flexisel({
                visibleItems: 4,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint:480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint:640,
                        visibleItems: 2
                    },
                    tablet: {
                        changePoint:768,
                        visibleItems: 3
                    }
                }
            });

        });
    </script>
    <!--end slider -->
    <link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" />
    <script type="text/javascript">
        $(window).load(function() {
            $("#flexiselDemo").flexisel({
                visibleItems: 5,
                animationSpeed: 1000,
                autoPlay: false,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint:480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint:640,
                        visibleItems: 2
                    },
                    tablet: {
                        changePoint:768,
                        visibleItems: 3
                    }
                }
            });

        });
    </script>
    <link rel="stylesheet" href="/css/etalage.css">
    <script src="/js/jquery.etalage.min.js"></script>
    <script>
        jQuery(document).ready(function($){

            $('#etalage').etalage({
                thumb_image_width: 300,
                thumb_image_height: 400,
                source_image_width: 800,
                source_image_height: 1000,
                show_hint: true,
                click_callback: function(image_anchor, instance_id){
                    alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                }
            });

        });
    </script>

</head>
<body>
<div id="app" >
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel" >
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>
                                <a class="dropdown-item" href="/basket">
                                    Корзина
                                </a>
                                @if(Auth::user()->is_admin)
                                <a class="dropdown-item" href="/admin">
                                    Работа с данными
                                </a>
                                @endif
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="header">
        <div class="wrap">
            <div class="header-bottom">
                <div class="logo">
                    <a href="index.html"><img src="images/logo.jpg" class="img-responsive" alt="" /></a>
                </div>
                <div class="search">
                    <div class="search2">
                        <form action="{{url('findProductsByName')}}">
                            <input type="submit" value="">
                            <input type="text" placeholder="Введите название продукта" name="name">
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="wrap">
        <div class="navigation-strip">
            <div class="top-menu">
                <!-- start header menu -->
                <ul class="megamenu skyblue">
                    @foreach($categories as $category)
                    <li><a class="color1" href="{{ url('products/' .'?category='. $category->id) }}">{{$category->name}}</a></li>
                        @endforeach
                    <li><a class="color1" href="/allCategories">Еще категории</a></li>
                    <li><a class="color1" href="/statistic">Статистика покупок</a></li>
                    <li><a class="color1" href="/defForm">Защита</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
