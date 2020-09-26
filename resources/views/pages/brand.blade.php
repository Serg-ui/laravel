@extends('layouts.index')

@section('owlJS')
@endsection

@section('content')
    @include('menus.breadcrumbs',$topNav)
    <div class="head1">
        <h2>{{$brand->title}}</h2>
    </div>

    @include("brandPageIncludes.$blade")
    <div class="head2">
        {!! $brand->description !!}
    </div>
@endsection
