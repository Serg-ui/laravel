<div class="navy">
    <a href="/">Главная</a> /
    @foreach($topNav as $k => $v)
        <a href="{{$v}}">{{$k}}</a> /
    @endforeach
</div>
