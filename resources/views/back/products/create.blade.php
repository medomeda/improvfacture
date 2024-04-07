@extends('layouts.master')
@section('heading', 'Créer Produit')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informations Produit</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    {!! Form::open(['route' => 'admin.products.store']) !!}
                    @include('back.products.form', ['submitButtonText' => __('Enregistrer')])
                    {!! Form::close() !!}
                </div>
               
            </div>
        <!-- /.card -->
        </div>
    </div>


@endsection