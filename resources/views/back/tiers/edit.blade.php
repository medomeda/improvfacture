@extends('layouts.master')
@section('heading', 'Modifier Travailleur')
@section('content')
<div class="row">
    <div class="col-md-12">

        <form method="POST" action="{{ route('admin.tiers.update', $article->id)}}" class="form-horizontal" id="formTiers" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @include('back.tiers.form')
        </form>
    </div>
</div>
  
@endsection
