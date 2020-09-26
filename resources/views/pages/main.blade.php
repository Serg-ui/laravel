@extends('layouts.index')
@section('content')
        @include('mainPageIncludes.carousel')
        <div class="items">
            <div class="item">
                <h4>Специальные предложения</h4>
                @include('mainPageIncludes.specialOffer', ['special' => $left])
            </div>

            <div class="item">
                <h4 id="hidenH4">1</h4>
                @include('mainPageIncludes.specialOffer', ['special' => $right])
            </div>
            <div class="item">
                @include('mainPageIncludes.news')
            </div>
        </div>
@endsection

