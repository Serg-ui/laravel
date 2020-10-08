@extends('admin.index')

@section('content')
    <input type="button" id="doEdit" value="Сохранить">
    <div class="productTitle">
        <input type="text" class="form-control" name="post_title" value="{{ $product->post_title }}" autocomplete="off"><br>
        <input type="text" class="form-control" name="post_name" value="{{ $product->post_name }}" autocomplete="off"><br>
    </div>

    <div id="nalichie">
        @if($meta['productExist'])
            <p><input type="checkbox" name="product-exist" autocomplete="off" value="{{ $meta['productExist']->meta_value }}" checked> Есть в наличии </p>
        @else
            <p><input type="checkbox" name="product-exist" autocomplete="off" value="{{ $meta['productExist']->meta_value }}"> Есть в наличии </p>
        @endif
    </div>

    <div id="product-price">
        <input type="text" name="price1" value="{{ $meta['price1']->meta_value ?? '' }}" autocomplete="off">
        <input type="text" name="price2" value="{{ $meta['price2']->meta_value ?? '' }}" autocomplete="off">
    </div>

    <div id="spec1">
        <h4>Комплектация</h4>
        <textarea name="spec1" autocomplete="off">
            {!! $meta['spec1']->meta_value ?? '' !!}
        </textarea>
    </div>

    <div id="spec2">
        <h4>Характеристики</h4>
        <textarea name="spec2" autocomplete="off">
            {!! $meta['spec2']->meta_value ?? '' !!}
        </textarea>
    </div>

    <h3>Картинки для слайдера</h3>
    <input type="button" value="Добавить из библиотеки" class="btnImg fromSlider">
    <input type="button" value="Удалть выбранные" id="btnImgDel">
    <fieldset>
    <form id="upload" method="post" enctype="multipart/form-data">

            <legend>Загрузить новую</legend>
            @csrf
            <input type="file" accept="image/jpeg,image/png" id="uploadImg" name="image">
            <input type="submit" value="Загрузить">

    </form>
    </fieldset>
    <div id="slider">
        @foreach($images as $i)
            <div class="sliderImage">
                <img src="{{ $url }}/{{ getImgSizeUrl($i->guid, 'small') }}" class="imgSlider"
                     data-id="{{ $i->id }}" data-name="{{ $i->post_title }}">
            </div>
        @endforeach
    </div>

    <div>
        <br><br><br><br><h4>Миниатюра</h4>
        <input type="button" value="Библиотека" class="btnImg fromThumbnail">
        <div id="thumbnail">
            <img src="{{ $url }}/{{ getImgSizeUrl($product->thumbnail_path, 'small') }}" class="imgThumbnail"
                 data-id="{{ $product->thumbnail }}">
        </div>
    </div>

    <div id="brand">
        <h4>Бренд:</h4>
        <select name="brand" autocomplete="off">
            <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
            @foreach($brandsList as $b)
                @if($b->id !== $brand->id)
                <option value="{{ $b->id }}">{{ $b->name }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div id="categories">
        <h4>Категории</h4>

        @foreach($categories as $cat)
            <p><input type="checkbox" autocomplete="off" name="category" value="{{ $cat->id }}" checked> {{ $cat->name }} </p>
        @endforeach

        @forelse($categoryList as $cat)
            <p><input type="checkbox" autocomplete="off" name="category" value="{{ $cat->id }}"> {{ $cat->name }} </p>
        @empty
        @endforelse
    </div>
@endsection


