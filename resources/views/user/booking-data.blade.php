
@extends('template.index')

@section('content')

@include('assets.devextreme')
@include('assets.assets-booking-room')

<div class="dx-viewport demo-container">
    <div class="scheduler"></div>
</div>

@stop