<div class="catalog2_index_items">
    @foreach($products as $b)
        <div class="catalog2_index_item item_border">
            <a href="{{route('brand', [$brand->slug, $b['slug']])}}">
                <h3>{{$b['name']}}</h3>
                <picture>
                    <source type="image/webp"
                            srcset="{{$url}}/{{getImgSizeUrl($b['thumb_path'], 'medium', true)}}">
                    <img src="{{$url}}/{{getImgSizeUrl($b['thumb_path'], 'medium')}}">
                </picture>
            </a>
        </div>
    @endforeach
</div>
