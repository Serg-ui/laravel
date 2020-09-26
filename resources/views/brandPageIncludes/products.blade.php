<div class="catalog2_index_items">
    @foreach($products as $p)
        <div class="catalog2_index_item item_border">
            <a href="{{route('product', $p['post_name'])}}">
                <h3>{{$p['post_title']}}</h3>
                <picture>
                    <source type="image/webp"
                            srcset="{{$url}}/{{getImgSizeUrl($p['thumbnail_path'], 'medium', true)}}">
                    <img src="{{$url}}/{{getImgSizeUrl($p['thumbnail_path'], 'medium')}}">
                </picture>
            </a>
        </div>
    @endforeach
</div>
