@extends('layouts.master')
@section('heading', 'Paramètres')
@section('content')
<div class="row">
    <div class="col-md-12">
        @include('app_settings::_settings')
    </div>
</div>
@endsection