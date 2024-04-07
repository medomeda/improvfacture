@extends('layouts.master')
@section('heading', 'Permissions')
@section('content')
   <div class="row">
       <div class="col-md-6"></div>
       <div class="col-md-6 text-right" style="padding-bottom: 10px;">
            <div class="btn-group">
                <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Créer 
                </a>
            </div>
       </div>
   </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card card-primary card-outline">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Permissions</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td> 
                                <td>
                                    <a href="{{ route('admin.permissions.show',$permission->id) }}">
                                        <i class="fa fa-list green"></i>
                                    </a>
                                  
                                    <a  href="{{ route('admin.permissions.edit',$permission->id) }}">
                                        <i class="fa fa-edit blue"></i>
                                    </a>
                                
                                    <a href="{{ route('admin.permissions.destroy',$permission->id)}}" data-method="DELETE" data-confirm="Confirmez-vous la suppression de cet enregistrement ?">
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
                    {{ $permissions->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div><!--/row -->
    </div>

    
@endsection

