@foreach($product as $p)
    <div>
        <p><a href="{{ route('admin.brands.edit') }}?id={{ $p->post_name }}">{{ $p->post_title }}</a></p>
    </div>
@endforeach
