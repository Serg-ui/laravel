@foreach($images as $i)
    <div class="img">
        <p>{{ $i->post_title }}</p>
        <img src="{{ $url }}/{{ getImgSizeUrl($i->guid, 'small', true) }}"
             data-id="{{ $i->id }}" data-name="{{ $i->post_title }}" class="imgSelectLib">
    </div>
@endforeach
