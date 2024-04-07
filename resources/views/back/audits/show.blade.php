@extends('layouts.master')
@section('heading', 'Audits Log details')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Details du log</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <div class="row">
                   <div class="col-md-4">
                        <dl>
                            <dt>Date</dt><dd>{{ $audit->created_at}}</dd>
                            <dt>Utilsateur</dt><dd>{{ $audit->causer->name}}</dd>
                            <dt>Action</dt><dd>{{ $audit->description}}</dd>
                            <dt>Nom Objet</dt><dd>{{ $audit->subject_type}}</dd>
                            <dt>Id Object</dt><dd>{{ $audit->subject_id}}</dd>
                        </dl>
                   </div>
                   <div class="col-md-8">
                        <?php $aff = count($attributes) == count($old) ? true: false; ?>
                        <div style="height: 300px; overflow-y: scroll;">
                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th>Champ</th>
                                        <th>Nouvelle Valeur</th>
                                        @if($aff)
                                        <th>Ancienne Valeur </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attributes as $key => $value)
                                        <tr>
                                            <td>{{ $key }}</td>
                                            <td>{{ $value }} </td>
                                            @if($aff)
                                            <td>{{ $old[$key] }} </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>                
            </div>
             <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-left">
                    <a class="btn btn-primary" href="{{ route('admin.audits.index') }}"> Retourner à la liste</a>
                </div>
            </div>
            <!-- /.card-footer -->           
        </div>
    <!-- /.card -->
    </div>
</div>
  
@endsection