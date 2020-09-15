<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{$title ?? ''}}</title>
    <meta name="description" content="{{$description ?? ''}}"/>

    <link rel="stylesheet" type="text/css" href="assets/css/styles.css" media="all"/>
    <script src="assets/js/jq.js" type="text/javascript"></script>

    <link rel="canonical" href="{{$canonLink ?? ''}}" />

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

<div class="menu1">
    <nav id="menujs1" class="menu"><ul><li id="menu-item-75" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-55 current_page_item menu-item-75"><a href="https://palwood.ru/" aria-current="page">Главная</a></li>
            <li id="menu-item-509" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-509"><a href="https://palwood.ru/contacts/">О Компании</a></li>
            <li id="menu-item-508" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-508"><a href="https://palwood.ru/service/">Услуги</a></li>
            <li id="menu-item-18" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-18"><a href="#">Продукция</a>
                <ul class="sub-menu">
                    <li id="menu-item-494" class="menu-item menu-item-type-taxonomy menu-item-object-brand menu-item-494"><a href="https://palwood.ru/brand/multione/">Мини-погрузчики Multione</a></li>
                    <li id="menu-item-493" class="menu-item menu-item-type-taxonomy menu-item-object-brand menu-item-493"><a href="https://palwood.ru/brand/ferri/">Косилки Ferri</a></li>
                    <li id="menu-item-495" class="menu-item menu-item-type-taxonomy menu-item-object-brand menu-item-495"><a href="https://palwood.ru/brand/greenmech/">Измельчители древесины GreenMech</a></li>
                    <li id="menu-item-496" class="menu-item menu-item-type-taxonomy menu-item-object-brand menu-item-496"><a href="https://palwood.ru/brand/snowex/">Пескоразбрасыватели SnowEx</a></li>
                    <li id="menu-item-497" class="menu-item menu-item-type-taxonomy menu-item-object-brand menu-item-497"><a href="https://palwood.ru/brand/cm-crusher/">Дорожные фрезы CM Crusher</a></li>
                    <li id="menu-item-498" class="menu-item menu-item-type-taxonomy menu-item-object-brand menu-item-498"><a href="https://palwood.ru/brand/cerruti/">Снегоочистители Cerruti</a></li>
                    <li id="menu-item-499" class="menu-item menu-item-type-taxonomy menu-item-object-brand menu-item-499"><a href="https://palwood.ru/brand/turbo-turf/">Гидропосевные установки Turbo Turf</a></li>
                </ul>
            </li>
            <li id="inst"><a href="https://www.instagram.com/palwood_ru" target="_blank" title="Инстаграм"><i class="fab fa-instagram"></i></a></li><li class="phone"> +7 (812) 313 16 29</li></ul>
    </nav>
</div>

<div class="content">
    <div class="wrapper">
        @yield('content')
    </div>
</div>
</body>
</html>
