@extends('layouts.master')
@section('heading', 'Modifier Produit')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informations Produit</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    {!! Form::model($product, ['route' => ['admin.products.update', $product], 'method' => 'PUT']) !!}
                    @include('back.products.form', ['submitButtonText' => __('Enregistrer')])
                    {!! Form::close() !!}
                </div>
               
            </div>
        <!-- /.card -->
        </div>
    </div>


@endsection