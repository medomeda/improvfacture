<div class="card card-primary card-outline">
           
    <div class="card-body table-responsive">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Libellé:</label>
                    {!! Form::text('name', old('name') ?? $role->name ?? null, array('placeholder' => 'libellé du role','class' => 'form-control')) !!}
                </div>
              <!--  <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" cols="30" rows="5"  class="form-control" ></textarea>
                </div> -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="permission">Permissions:</label>
                    {{ Form::select('permission[]', $permission->pluck('name','id'), $rolePermissions, ['class' => 'form-control select2','multiple','style' => "width: 100%;"]) }}
                </div>
            </div>    
        </div>
    </div>
    <div class="card-footer">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="{{ route('admin.roles.index')}}" class="btn btn-secondary">Retour</a>
            <button type="submit" class="btn btn-primary">Enregister</button>
        </div>
    </div>
</div>
<!-- /.card -->
