@extends('admin.index')

@section('content')
    <div class="productTitle">
        <input type="text" class="form-control" name="post_title" value="{{ $product->post_title }}"><br>
        <input type="text" class="form-control" name="post_name" value="{{ $product->post_name }}"><br>
    </div>
@endsection
