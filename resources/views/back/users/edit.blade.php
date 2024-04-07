@extends('layouts.master')
@section('heading', 'Modifier Utilisateur')
@section('content')


    <div class="row">
        <div class="col-md-12">
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT', 'enctype' => "multipart/form-data"]) !!}
    
            @include('back.users.form')

            {!! Form::close() !!}
        <!-- /.card -->
        </div>
    </div>


@endsection