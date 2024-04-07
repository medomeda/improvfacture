<div class="container-fluid">

    <div class="row">
        <div class="col-md-8">
       
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') ?? $product->name ?? null }}"/>
            </div>
           
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea cols="5" rows="5" class="form-control" name="description">{{ old('description') ?? $product->description ?? null }}</textarea>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="etat" id="etat">
                <label for="etat" class="form-check-label">Etat</label>
            </div>
        </div>
    </div>
  
    <hr/>
    <a href="{{ route('admin.products.index')}}" class="btn btn-secondary">Retour</a>

    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}    

</div>

