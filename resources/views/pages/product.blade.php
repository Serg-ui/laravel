@extends('layouts.index')
@section('headStyles')
    <link rel="stylesheet" type="text/css" href="{{$assetsUrl}}/css/fotorama.css" media="all"/>
@endsection
@section('headScripts')
    <script src="{{$assetsUrl}}/js/fotorama.js" type="text/javascript"></script>
@endsection
@section('content')
    <div class="navy">
        <a href="/">Главная</a> /
        @foreach($topNav as $k => $v)
            <a href="{{$v}}">{{$k}}</a> /
        @endforeach
        {{$product->post_title}}
    </div>
    <div class="single_product_name"><h1 id="name">{{$product->post_title}}</h1></div>
    <div class="catalog2_items">
        <div class="catalog2_item_1">
            <div class="fotorama" data-loop="true" data-autoplay="4000" data-allowfullscreen="native">
                <img src="{{$assetsUrl}}/{{$product->thumbnail_path}}">
                @foreach($slider as $s)
                    <img src="{{$assetsUrl}}/{{$s->guid}}">
                @endforeach
            </div>
        </div>
        <div class="catalog2_item_2">
            <b>Статус: </b>
            @if($fields['product-exist'])
                В наличии
            @else
                Нет в наличии
            @endif

            <div id="price"><div><b>Цена:</div> </b>
                <div>
                    @if(@$fields['product-price2'])
                        <span class="discount"><s>{{$fields['product-price2']}}</s></span><b><br>
                        {{$fields['product-price']}}</b>
                    @else
                        {{$fields['product-price']}}
                    @endif
                </div>
            </div>
            <div id="order">
                <form>
                    <legend>Оставить заявку:</legend>

                    <input type="hidden" name="item" value="{{$product->id}}">
                    <input type="text" placeholder="Ваше имя *" name="name"><div class="form_error" id="fio"></div>
                    <input type="email" placeholder="E-mail *" name="email"><div class="form_error" id="email"></div>
                    <input type="tel" placeholder="Телефон (не обязательно)" name="tel"><div class="form_error" id="tel"></div>
                    <textarea placeholder="Ваше сообщение" name="text"></textarea><br>
                    <div id="form_success"></div>
                    <input id="add" type="button" name="otpr" value="Оставить заявку"><br>

                </form>
            </div>
            <p><a href="#anchor">Технические характеристики</a></p>
        </div>
    </div>
    <div class="spec">
        <div class="complect">
            {!! $fields['product-spec1'] !!}
        </div>
        <a href="#" class="readmore"><i>Читать далее</i></a>

        @if($youtube)
            <div class="single_product_video">
                <iframe src="https://www.youtube.com/embed/{{$youtube}}"  frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        @endif

        <div class="spec_table">
            {!!$fields['product-spec2']!!}
        </div>
    </div>

@endsection
