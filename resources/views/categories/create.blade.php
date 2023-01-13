@extends('layouts.master')

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Création Catégorie</h3>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{ route('categories.index') }}"> Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>

    </form>
@endsection
