@extends('admin.index')

@section('content')
    <div class="productTitle">
        <input type="text" class="form-control" name="post_title" value="{{ $product->post_title }}"><br>
        <input type="text" class="form-control" name="post_name" value="{{ $product->post_name }}"><br>
    </div>


    <h3>Картинки для слайдера</h3>
    <input type="button" value="Добавить" id="btnImg">
    <input type="button" value="Удалть выбранные" id="btnImgDel">
    <div id="slider">
        @foreach($images as $i)
            <div class="sliderImage">
                <img src="{{ $url }}/{{ getImgSizeUrl($i->guid, 'small') }}">
            </div>
        @endforeach
    </div>
@endsection
<div class="imagesHidenWrap">
    <div class="imagesHiden">
        <div id="imagesTopNav">
            <h4 id="confirmImg"><a href="#">Выбрать</a></h4>
            <input type="text" id="findByName">
            <input type="button" id="goFindByName" value="Найти">
        </div>

        <div id="imagesList"></div>
        <div id="imagesListFilter"></div>

    </div>
    <h3 id="closeWrap"><a href="#">Закрыть</a></h3>


</div>

