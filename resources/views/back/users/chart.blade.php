@extends('layouts.master')
@section('heading', 'Utilisateurs')
@section('content')
   <div class="row">
       <div class="col-md-6"></div>
       <div class="col-md-6 text-right" style="padding-bottom: 10px;">
            <div class="btn-group">
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Créer 
                </a>
                <input type="button" value="Get Selected Rows" class="btn btn-primary" id="btnSelectedRow">
            </div>
       </div>
   </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    {!! $chart->html() !!}
                  
                </div>
                
            </div>
            <!-- /.card -->
        </div><!--/row -->
    </div>
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
@endsection
