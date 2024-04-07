@extends('layouts.master')
@section('heading', 'Créer Utilisateur')
@section('content')


    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'admin.users.store', 'enctype' => "multipart/form-data"]) !!}
          
                @include('back.users.form')
              
            {!! Form::close() !!}
       
        </div>
    </div>


@endsection