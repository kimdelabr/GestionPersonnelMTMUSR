
 <div class="row p-4 pt-5">
            <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un nouvel utilisateur</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="addUser()">
                <div class="card-body">

                {{-- <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label >Nom</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label >Prenom</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div> --}}

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2" >
                            <label >Nom</label>
                            <input type="text" wire:model='newUser.name' class="form-control @error("newUser.name") is-invalid @enderror">
                             @error("newUser.name")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label >Prenom</label>
                            <input type="text" wire:model='newUser.prenom' class="form-control @error("newUser.prenom") is-invalid @enderror">
                             @error("newUser.prenom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                  <div class="form-group">
                      <label >Telephone</label>
                      <input type="text" wire:model='newUser.phone' class="form-control @error("newUser.phone") is-invalid @enderror">
                       @error("newUser.phone")
                          span class="text-danger">{{ $message }}</span>
                        @enderror
                  </div>

          
                  <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Annee de prise de service</label>
                            <input type="text" wire:model='newUser.annee_prise_service' class="form-control @error("newUser.annee_prise_service") is-invalid @enderror">
                             @error("newUser.annee_prise_service")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label >Annee de cessation de service</label>
                            <input type="text" wire:model='newUser.annee_cessation_service' class="form-control @error("newUser.annee_cessation_service") is-invalid @enderror">
                            @error("newUser.annee_cessation_service")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                   <div class="form-group">
                      <label >RIB</label>
                      <input type="text" wire:model='newUser.rib' class="form-control @error("newUser.rib") is-invalid @enderror">
                      @error("newUser.rib")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                  <div class="form-group">
                      <label >Adresse e-mail</label>
                      <input type="text" wire:model='newUser.email' class="form-control @error("newUser.email") is-invalid @enderror">
                      @error("newUser.email")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

               
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="text" class="form-control" disabled placeholder="Password" >
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                  <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retouner à la liste des utilisateurs</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>

