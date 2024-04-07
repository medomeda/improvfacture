  
            <form class="mt-2">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="type">Role</label>
                    <input type="text" class="form-control" id="type" value="{{ old('type') ?? Auth::user()->type ?? null }}" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="actif">Actif</label>
                    {{ Form::select('actif', config('parametres.listes.ouinon'), old('actif') ?? Auth::user()->actif ?? null , ['id'=> 'actif', 'class' => 'form-control', 'style' =>'width: 100%;']) }}
                </div>               
            </div>
           
            <div class="form-row">               
                <div class="form-group col-md-6">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" id="username" value="{{ old('username') ?? Auth::user()->username ?? null }}" placeholder="User name">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email') ?? Auth::user()->email ?? null }}" placeholder="Email">
                </div>
            </div>
            <div class="form-row">            
                <div class="form-group col-md-6">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" id="name" value="{{ old('nom') ?? Auth::user()->nom ?? null }}" placeholder="Nom">
                </div>
                <div class="form-group col-md-6">
                    <label for="prenoms">Prénoms</label>
                    <input type="text" name="prenoms" class="form-control" id="prenoms" value="{{ old('prenoms') ?? Auth::user()->prenoms ?? null }}" placeholder="Prenoms">
                </div>
            </div>
            <div class="form-row">             
                <div class="form-group col-md-6">
                    <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" id="telephone" value="{{ old('telephone') ?? Auth::user()->telephone ?? null }}" placeholder="Téléphone">
                </div>
                <div class="form-group col-md-6">
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" class="form-control" id="adresse" value="{{ old('adresse') ?? Auth::user()->adresse ?? null }}" placeholder="Adresse">
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>