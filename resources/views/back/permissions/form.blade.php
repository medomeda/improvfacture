<div class="card card-primary card-outline">
  
    <div class="card-body table-responsive">
       <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Libellé:</label>
                    {!! Form::text('name', old('name') ?? $permission->name ?? null, array('placeholder' => 'Libellé permission','class' => 'form-control')) !!}
                </div>
            <!--    <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" cols="30" rows="5"  class="form-control" ></textarea>
                </div> -->
                          
            </div>
            <div class="col-md-6">
            @if(!$permission->id)
                <div class="form-group">
                    <label for="name">Roles assignés:</label>
                    @if(!$roles->isEmpty())                       
                        {!! Form::select('roles[]', $roles->pluck('name','id'), $permission->roles, array('class' => 'form-control select2','multiple')) !!}
                    @endif
                </div>
            @endif
            </div>

        </div>
    </div>
    <div class="card-footer">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="{{ route('admin.permissions.index')}}" class="btn btn-secondary">Retour</a>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>
</div>   
<!-- /.card -->
