@extends('admin.index')
@section('content')
    <div class="productNav">
        <form id="send">
            @csrf
            <input type="button" id="go">
                <select name="brand">
                    <option selected value="">Все</option>
                    @foreach($brands as $b)
                        <option value="{{ $b->slug }}">{{ $b->name }}</option>
                    @endforeach
                </select>
                <select name="top">
                    <option selected value="">Все</option>
                    @foreach($tops as $t)
                        <option value="{{ $t->slug }}">{{ $t->name }}</option>
                    @endforeach
                </select>
            <input type="text" name="find">
        </form>
    </div>
    <div id="productsList">
        @include('admin.api.productsList')
    </div>

@endsection

@section('bottomScript')
    <script>
        $('#go').on('click', function (){
            let $list = $('#productsList')
            $.ajax({
                url: '{{ route('admin.sort') }}',
                data: $('#send').serialize(),
                type: 'post',
                success: function (data){
                    if(data){
                        $list.html('');
                        $list.html(data);
                        /*let p = JSON.parse(data)
                        p.forEach(function (i){
                            $('<p>').html(i.post_title).appendTo($list)
                        })*/
                    }
                    else{

                    }
                },
                error: function (jqXHR){

                }
            })
        })
    </script>
@endsection
