<div class="tax">
    <h1 id="test">Дорожно-строительная, коммунальная и садово-парковая техника</h1>

    <div class="owl-carousel owl-theme">
        @foreach($brands as $b)
            @if(!$b['parent'])
            <div>
                <div><a href="{{ route('brand', $b['slug']) }}"><h4>{{$b['name']}}</h4></div>
                <picture>
                    <source type="image/webp" srcset="{{ $url }}/{{ getImgSizeUrl($b['thumbnail_path'],'full', true) }}">
                    <img src="{{ getImgSizeUrl($b['thumbnail_path'],'full', false) }}"></a>
                </picture>
            </div>
            @endif
        @endforeach
    </div>
</div>
