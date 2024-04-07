@extends('layouts.master')
@section('heading', 'Profile')

@section('content')

  <div class="row">
      <div class="col-md-4">
          <div class="card">
              <div class="card-body card-body text-center">
                <img id="avatar-img" width="40px" height="100px" class="img profile-user-img img-responsive img-circle" src="https://saas-demo.laraswift.dev/uploads/avatar/avatar.png" alt="User profile picture">
                <input type="file" name="img[]" class="file" accept="image/*">
                <div class="input-group my-3">
                  <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                  <div class="input-group-append">
                    <button type="button" class="browse btn btn-primary">Browse...</button>
                    <input type="text" id="profile-photo">
                    <img src="" id="profile-photo-preview">
                    <button onclick="filemanager.selectFile('profile-photo')">Choose</button>

                  </div>
                </div>
                <h5 class="mt-2 mb-0"><b> {{ Auth::user()->name }}</b></h5>
                <p> {{ Auth::user()->email }}</p>
                <span class="mt-3 mb-0 d-block">
                  <p>
                    <b>Role:</b> {{Auth::user()->type}}
                 </p>
                </span>
                <span class="mt-0 d-block"><p><b>Crée il y a:</b>
                  {{ Auth::user()->created_at->diffForHumans()}}
                  </p>
                </span>
                <button class="btn btn-primary d-block mx-auto mt-5 col-sm-12 mb-0" id="avatar-upload-btn">
                  Mettre à jour la photo
                </button>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-8">
          <div class="card">
                
              <div class="card-body">

                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-informations-tab" data-toggle="tab" href="#nav-informations" role="tab" aria-controls="nav-informations" aria-selected="true">Informations</a>
                      <a class="nav-item nav-link" id="nav-motdepasse-tab" data-toggle="tab" href="#nav-motdepasse" role="tab" aria-controls="nav-motdepasse" aria-selected="false">Mot de passe</a>
                      <a class="nav-item nav-link" id="nav-activites-tab" data-toggle="tab" href="#nav-activites" role="tab" aria-controls="nav-activites" aria-selected="false">Activités</a>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    
                    <div class="tab-pane fade show active" id="nav-informations" role="tabpanel" aria-labelledby="nav-informations-tab">
                      @include('back.admin.profile-info')
                   </div>
                    <div class="tab-pane fade" id="nav-motdepasse" role="tabpanel" aria-labelledby="nav-motdepasse-tab">
                      @include('back.admin.profile-motdepasse')
                    </div>
                    <div class="tab-pane fade" id="nav-activites" role="tabpanel" aria-labelledby="nav-activites-tab">
                      @include('back.admin.profile-activities')
                    </div>
                  </div>
                
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->
        
      </div>
      <!-- /.col -->
  </div>
  </div>


       
    
         
@endsection

@section('scripts')
<script>

  $(document).on("click", ".browse", function() {
    var file = $(this).parents().find(".file");
    file.trigger("click");
  });

  $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
      // get loaded data and render thumbnail.
      document.getElementById("avatar-img").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
  });
    
</script>
@endsection