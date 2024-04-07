@extends('layouts.master')
@section('heading', 'Créer un article')
@section('content')
<div class="row">
    <div class="col-md-12">
        {!! Form::open(['route' => 'admin.tiers.store','files' => 'true','enctype'=>'multipart/form-data']) !!}
        @include('back.tiers.form')
        {!! Form::close() !!}
     
    </div>
</div>
  
@endsection