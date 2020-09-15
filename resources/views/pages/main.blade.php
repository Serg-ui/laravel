@extends('layouts.index')
@section('content')
    <div class="wrapper">
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

            </div>
        </div>
    </div>
@endsection
