<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{$seo['title'] ?? ''}}</title>
    <meta name="description" content="{{$seo['desc'] ?? ''}}"/>

    <link rel="stylesheet" type="text/css" href="{{$cssUrl}}/styles.css" media="all"/>
    <script src="{{$jsUrl}}/jq.js" type="text/javascript"></script>
    <script src="{{$jsUrl}}/nav.js" type="text/javascript"></script>
    <script src="{{$jsUrl}}/1.js" type="text/javascript"></script>
    @section('owlJS')
        <script src="{{$jsUrl}}/owl.carousel.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="{{$cssUrl}}/owl.carousel.min.css" media="all"/>
        @show
    @yield('headStyles')
    @yield('headScripts')
    @yield('forAjaxRequest')
    <link rel="canonical" href="{{$canonUrl ?? ''}}" />

</head>
<body>
<header>
    <div class="logo1">
        <a href="{{route('index')}}" class="custom-logo-link" rel="home"><img width="300" height="64" src="https://palwood.ru/wp-content/uploads/2020/04/palwoodlogo.jpg" class="custom-logo" alt="логотип" /></a>			<p>"ПАЛВУД" - коммунальная техника, мини-погрузчики</p>
    </div>
    <div class="logo2">
        <picture>
            <source type="image/webp" srcset="https://palwood.ru/wp-content/themes/palwood/assets/img/harvester.webp">
            <img src="https://palwood.ru/wp-content/themes/palwood/assets/img/harvester.jpg">
        </picture>
    </div>
</header>

@include('menus.main')

<div class="content">
    <div class="wrapper">
        @yield('content')
    </div>
</div>
<script>
    $(function(){
        $('.owl-carousel').owlCarousel({
            margin: 15,
            loop:true,
            dots:true,
            autoplay:true,
            nav: false,

            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:2,

                    loop:true
                },
                600:{
                    items:3,

                    loop:true
                },
                1000:{
                    items:3,

                    loop:true
                }
            }
        })
    })

</script>
</body>
</html>
