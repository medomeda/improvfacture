@extends('layouts.master')
@section('heading', 'Roles')
@section('content')
  
    <div class="row">
        <div class="col-md-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Roles</h3>

                    <div class="card-tools">
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Créer Role</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{{ route('admin.roles.show',$role->id) }}">
                                        <i class="fa fa-list green"></i>
                                    </a>
                                  
                                    <a  href="{{ route('admin.roles.edit',$role->id) }}">
                                        <i class="fa fa-edit blue"></i>
                                    </a>
                                
                                    <a href="{{ route('admin.roles.destroy',$role->id)}}" data-method="DELETE" data-confirm="Confirmez-vous la suppression de cet enregistrement ?">
                                        <i class="fa fa-trash red"></i>
                                    </a>
                                                     
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                      </table>
                      
                      {!! $roles->render() !!}
                  
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!--/row -->
    </div>

    
@endsection

@push('scripts')
   
    
@endpush