@foreach($special as $brands)
    <div style="font-size: small; margin-bottom: 10px; margin-left: -15px;"><b>{{$brands['term']['name']}}:</b></div>
    @foreach($brands['product'] as $product )
        <div class='specialOffer'>
            <div><a href="{{$productUrl}}/{{$product['post_name']}}">
                <picture>
                    <source type="image/webp"
                            srcset="assets/{{getImgSizeUrl($product['thumbnail_path'], 'small', true)}}">

                    <img src="assets/{{getImgSizeUrl($product['thumbnail_path'], 'small')}}">
                </picture>
                </a>
            </div>
            <div><a href="{{$productUrl}}/{{$product['post_name']}}">{{$product['post_title']}}</a><br>
                @if(!$product['price2'])
                    Цена: <b>{{$product['price']}}</b>
                @else
                    Цена: <span class="discount"><s>{{$product['price']}}</s></span>
                    <b>{{$product['price2']}}</b>
                @endif
            </div>
        </div>
    @endforeach
@endforeach
