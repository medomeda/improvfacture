@extends('layouts.master')
@section('heading', 'Produits')
@section('content')
   
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Produits</h3>

                    <div class="card-tools">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Créer Produit</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($products as $product)
                                <tr>

                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                
                                    <td>
                                        <a href="{{ route('admin.products.edit',$product->id)}}">
                                            <i class="fa fa-edit blue"></i>
                                        </a>
                                        /

                                        <a href="{{ route('admin.products.destroy',$product->id)}}" data-method="DELETE" data-confirm="Confirmez-vous la suppression de cet enregistrement ?">
                                            <i class="fa fa-trash red"></i>
                                        </a>
                                        
                                    
                                    </td>
                                    
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $products->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div><!--/row -->
    </div>

    
@endsection