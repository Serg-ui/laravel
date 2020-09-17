<div class="item_news">
    <h4 style="color: brown">Лидеры продаж</h4>


    <div class="news_block">
       @foreach($top as $t)
           <a id="topSaleLink" href="{{$t->post_name}}">{{$t->post_title}}</a>
       @endforeach

    </div>

    <h4>Новости:</h4>
    <div class="news_block" style="padding-left: 10px">
        @foreach($news as $n)
            <a href="{{$n->post_name}}">{{$n->post_title}}</a>
            @if($n->thumbnail_path)
                <img src="assets/{{$n->thumbnail_path}}">
            @endif
        @endforeach
    </div>
</div>

