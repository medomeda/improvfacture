<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Informations Article</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="typearticle_id">Type Article</label>
                            {{ Form::select('typearticle_id', $typearticles, old('typearticle_id') ?? ($article->typearticle_id ?? null), [
                                'id' => 'typearticle_id',
                                'placeholder' => 'Sélectionner une délégation',
                                'class' => 'form-control select2',
                                'style' => 'width: 100%;',
                            ]) }}
                        </div>        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="reference">Reférence</label>
                            <input type="text" value="{{ old('reference') ?? ($article->reference ?? null) }}"
                                class="form-control" name="reference" id="reference">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="categorie_id">Catégorie</label>
                    {{ Form::select('categorie_id', $categories, old('categorie_id') ?? ($article->categorie_id ?? null), [
                        'id' => 'categorie_id',
                        'placeholder' => 'Sélectionner une categorie',
                        'class' => 'form-control select2',
                        'style' => 'width: 100%;',
                    ]) }}
                </div>
              

                <div class="form-group">
                    <label for="designation">Désignation</label>
                    <input type="text" value="{{ old('designation') ?? ($article->designation ?? null) }}" class="form-control"
                        name="designation" id="designation">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prixachat">Prix d'achat</label>
                            <input type="number" value="{{ old('prixachat') ?? ($article->prixachat ?? 0) }}" 
                            class="form-control integer" name="prixachat" id="prixachat">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prixvente">Prix de vente</label>
                            <input type="number" value="{{ old('prixvente') ?? ($article->prixvente ?? 0) }}" 
                            class="form-control integer" name="prixvente" id="prixvente">
                        </div>
                    </div>
                   
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="2" rows="5"
                        class="form-control">{{ old('description') ?? ($article->description ?? null) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="stockmini">Stock Mini</label>
                            <input type="number" value="{{ old('stockmini') ?? ($article->stockmini ?? null) }}" 
                            class="form-control integer" name="stockmini" id="stockmini">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="stockmaxi">Stock Maxi</label>
                            <input type="number" value="{{ old('stockmaxi') ?? ($article->stockmaxi ?? null) }}" 
                            class="form-control integer" name="stockmaxi" id="stockmaxi">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="stockseuil">Stock Seuil</label>
                            <input type="number" value="{{ old('stockseuil') ?? ($article->stockseuil ?? null) }}" 
                            class="form-control integer" name="stockseuil" id="stockseuil">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
               
               
                <div class="form-group">
                    <label for="unite_id">Unité</label>
                    {{ Form::select('unite_id', $unites, old('unite_id') ?? ($article->unite_id ?? null), [
                        'id' => 'unite_id',
                        'placeholder' => 'Sélectionner un lieu de vote',
                        'class' => 'form-control select2',
                        'style' => 'width: 100%;',
                    ]) }}
                </div>
                <div class="form-group">
                    <label for="marque_id">Marque</label>
                    {{ Form::select('marque_id', $marques, old('marque_id') ?? ($article->marque_id ?? null), [
                        'id' => 'marque_id',
                        'placeholder' => 'Sélectionner un satut',
                        'class' => 'form-control select2',
                        'style' => 'width: 100%;',
                    ]) }}
                </div>
                <div class="form-group">
                    <label for="modele_id">Modèle</label>
                    {{ Form::select('modele_id', $modeles, old('modele_id') ?? ($article->modele_id ?? null), [
                        'id' => 'modele_id',
                        'placeholder' => 'Sélectionner une liste',
                        'class' => 'form-control select2',
                        'style' => 'width: 100%;',
                    ]) }}
                </div>
                <div class="form-group">
                    <label for="tva_id">Tva</label>
                    {{ Form::select('tva_id', $tvas, old('tva_id') ?? ($article->tva_id ?? null), [
                        'id' => 'tva_id',
                        'placeholder' => 'Sélectionner une liste',
                        'class' => 'form-control select2',
                        'style' => 'width: 100%;',
                    ]) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <div class="text-center">
                        <img id="preview"
                         src="{{ $article->photo == null ? asset('images/user.jpeg') : Storage::url($article->photo) }}" 
                         class="img-fluid img-thumbnail" alt="" width="auto" height="auto">
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <!-- /.card-body -->
    <div class="card-footer">
        <div class="float-left">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Retour</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
           
        </div>
    </div>
    <!-- /.card-footer -->
</div>
<!-- /.card -->
