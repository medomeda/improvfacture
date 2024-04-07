  <form class="mt-2" method="POST" action="{{ route('admin.changepassword')}}" class="form-horizontal">
    @csrf         
    <div class="form-row">
      
      <div class="form-group col-md-6">
        <label for="current_password">Ancien mot de passe</label>
        <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Entrer l'ancien mot de passe">
      </div>
     
    </div>
    <div class="form-row">
    
      <div class="form-group col-md-6">
        <label for="new_password">Nouveau mot de passe</label>
        <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Entrer le nouveau mot de passe">
      </div>
    </div>
    <div class="form-row">
    
      <div class="form-group col-md-6">
        <label for="new_confirm_password">Confirmation mot de passe</label>
        <input type="password" name="new_confirm_password" class="form-control" id="new_confirm_password" placeholder="Confirmer le mot de passe">
      </div>
    </div>                                                
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>