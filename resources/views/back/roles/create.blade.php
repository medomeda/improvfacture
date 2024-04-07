@extends('layouts.master')
@section('heading', 'Créer Role')
@section('content')


    <div class="row">
        <div class="col-md-12">
        {!! Form::open(['route' => 'admin.roles.store']) !!}
            @include('back.roles.form')
        {!! Form::close() !!}
   
        </div>
    </div>


@endsection