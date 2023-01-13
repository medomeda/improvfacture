@extends('layouts.master')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Catégories</h3>
            <div class="card-tools">
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New category</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('categories.show', $category->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer">
            {!! $categories->links() !!}
        </div>
    </div>
@endsection
