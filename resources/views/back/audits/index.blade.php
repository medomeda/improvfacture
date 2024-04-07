@extends('layouts.master')
@section('heading', 'Log utilisateurs')
@section('content')
   
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                  
                    <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                        <div class="form-group">
                            <label for="q" class="control-label">{{ __('Rechercher') }}</label>
                            <input placeholder="{{ __('Saisir le texte de recherche') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                        </div>
                        <input type="submit" value="{{ __('Rechercher') }}" class="btn btn-secondary">
                        <a href="{{ route('admin.audits.index') }}" class="btn btn-link">{{ __('Effacer') }}</a>
                    </form>

                

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Date</th>
                                <th>Opérateur</th>
                                <th>Opération</th>                 
                                <th>subject_id</th>
                                <th>subject_type</th>
                              
                                <th>Actions</th>
                            </tr>
                            @foreach ($audits as $audit)
                                <tr>
                                    <td>{{ $audit->created_at }}</td>
                                    <td>{{ $audit->causer->name }}</td>
                                    <td>{{ $audit->description }}</td>
                                    <td>{{ $audit->subject_id }}</td>
                                    <td>{{ $audit->subject_type }}</td>
                                    <td>
                                        <a href="{{ route('admin.audits.show',$audit->id)}}">
                                            <i class="fa fa-eye green"></i>
                                        </a>
                                        /

                                        <a href="{{ route('admin.audits.destroy',$audit->id)}}" data-method="DELETE" data-confirm="Confirmez-vous la suppression de cet enregistrement ?">
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
                    {{ $audits->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div><!--/row -->
    </div>

    
@endsection