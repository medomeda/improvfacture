@extends('layouts.master')
@section('heading', 'Utilisateurs')

@section('content')
<div class="row">
            <div class="card-header">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
                <h3 class="card-title">Informations Utilisateur</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Roles:</strong>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>                
            </div>
             <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-left">
                    <a class="btn btn-primary" href="{{ route('admin.users.index') }}"> Retourner à la liste</a>
                </div>
            </div>
         <!-- /.card-footer -->

           
        </div>
    <!-- /.card -->
    </div>
</div>


@endsection