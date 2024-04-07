<div class="card card-primary card-outline">             
    <div class="card-body table-responsive">
        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom Utilisateur:</strong>
                        {!! Form::text('name', old('name') ?? $user->name ?? null , array('placeholder' => 'Nom Utilisateur','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::text('email', old('email') ?? $user->email ?? null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mot de passe:</strong>
                        {!! Form::password('password', array('placeholder' => 'Mot de passe','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Confirmation Mot de passe:</strong>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirmation Mot de passe','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles, null, array('class' => 'form-control select2','multiple')) !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <label for="">Photo User</label>
                <div class="form-group {{ $errors->has('photouser') ? ' is-invalid' : '' }}">
                    <div class="custom-file">
                        <input type="file" id="photouser" name="photouser" value="Parcourir"
                               class="{{ $errors->has('photouser') ? ' is-invalid ' : '' }}custom-file-input">
                        <label class="custom-file-label" for="photouser">Choisir une image</label>
                        @if ($errors->has('photouser'))
                            <div class="invalid-feedback">
                                {{ $errors->first('photouser') }}
                            </div>
                        @endif
                    </div>
                    <br>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <img id="preview" src="{{ $user->photo == null ? asset('images/user.jpeg') : Storage::url($user->photo) }}" class="img-fluid img-thumbnail" alt="" height="200" width="200">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="card-footer">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="{{ route('admin.users.index')}}" class="btn btn-secondary">Retour</a>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>
</div>
 <!-- /.card -->

 @push('scripts')
    <script>
        $(() => {
            $('input[type="file"]').on('change', (e) => {
                let that = e.currentTarget
                if (that.files && that.files[0]) {
                    $(that).next('.custom-file-label').html(that.files[0].name)
                    let reader = new FileReader()
                    reader.onload = (e) => {
                        $('#preview').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(that.files[0])
                }
            })
        })
        
    </script>
@endpush


