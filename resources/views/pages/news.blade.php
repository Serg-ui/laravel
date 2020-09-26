@extends('layouts.index')

@section('owlJS')
@endsection

@section('content')
    <div class="news_main">
        <h1>{{ $post->post_title }}</h1>
        <i></i>
        {!! $post->post_content !!}
    </div>
@endsection

