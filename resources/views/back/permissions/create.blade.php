@extends('layouts.master')
@section('heading', 'Créer Permissions')
@section('content')

    <div class="row">
        <div class="col-md-12">

            {!! Form::open(['route' => 'admin.permissions.store']) !!}
            @include('back.permissions.form')
            {!! Form::close() !!}
                
        </div>
    </div>


@endsection