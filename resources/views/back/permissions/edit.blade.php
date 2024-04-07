@extends('layouts.master')
@section('heading', 'Modifier Permission')
@section('content')


    <div class="row">
        <div class="col-md-12">
            
            {!! Form::model($permission, ['route' => ['admin.permissions.update', $permission], 'method' => 'PUT']) !!}
             
            @include('back.permissions.form')
          
            {!! Form::close() !!}

        </div>
    </div>


@endsection