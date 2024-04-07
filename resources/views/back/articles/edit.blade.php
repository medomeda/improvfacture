@extends('layouts.master')
@section('heading', 'Modifier Travailleur')
@section('content')
<div class="row">
    <div class="col-md-12">

        <form method="POST" action="{{ route('admin.articles.update', $article->id)}}" class="form-horizontal" id="formArticle" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @include('back.articles.form')
        </form>
    </div>
</div>
  
@endsection
