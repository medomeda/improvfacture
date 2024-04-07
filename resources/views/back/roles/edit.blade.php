@extends('layouts.master')
@section('heading', 'Modifier Role')
@section('content')


    <div class="row">
        <div class="col-md-12">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT']) !!}    
            @include('back.roles.form')
            {!! Form::close() !!}
         
        </div>
    </div>


@endsection