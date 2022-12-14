<div class="row p-4 pt-5">
  <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'edition d'un utilisateur</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="updateUser()" method="POST">
                <div class="card-body">


                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2" >
                            <label >Nom</label>
                            <input type="text" wire:model='editUser.name' class="form-control @error("editUser.name") is-invalid @enderror">
                             @error("editUser.name")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label >Prenom</label>
                            <input type="text" wire:model='editUser.prenom' class="form-control @error("editUser.prenom") is-invalid @enderror">
                             @error("editUser.prenom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                  <div class="form-group">
                      <label >Telephone</label>
                      <input type="text" wire:model='editUser.phone' class="form-control @error("editUser.phone") is-invalid @enderror">
                       @error("editUser.phone")
                          span class="text-danger">{{ $message }}</span>
                        @enderror
                  </div>

          
                  <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Annee de prise de service</label>
                            <input type="text" wire:model='editUser.annee_prise_service' class="form-control @error("editUser.annee_prise_service") is-invalid @enderror">
                             @error("editUser.annee_prise_service")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label >Annee de cessation de service</label>
                            <input type="text" wire:model='editUser.annee_cessation_service' class="form-control @error("editUser.annee_cessation_service") is-invalid @enderror">
                            @error("editUser.annee_cessation_service")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                   <div class="form-group">
                      <label >RIB</label>
                      <input type="text" wire:model='editUser.rib' class="form-control @error("editUser.rib") is-invalid @enderror">
                      @error("editUser.rib")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                  <div class="form-group">
                      <label >Adresse e-mail</label>
                      <input type="text" wire:model='editUser.email' class="form-control @error("editUser.email") is-invalid @enderror">
                      @error("editUser.email")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                  <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retouner ?? la liste des utilisateurs</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    </div>

    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title"><i class="fas fa-key fa-2x"></i> R??initialisation de mot de passe</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <ul>
                            <li>
                                <a href="#" class="btn btn-link" wire:click.prevent="confirmPwdReset()">R??initialiser le mot de passe</a>
                                <span>(par d??faut: "password") </span>
                            </li>
                        </ul>
                    </div>
                </div>
        </div>

        <div class="col-md-12">
          <div class="card card-primary">
                    <div class="card-header d-flex align-items-center">
                    <h3 class="card-title flex-grow-1"><i class="fas fa-fingerprint fa-2x"></i> Roles & permissions</h3>
                    <button class="btn bg-gradient-success" wire:click="updateRoleAndPermissions"><i class="fas fa-check"></i> Appliquer les modifications</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <div id="accordion">
                                  @foreach ($rolePermissions["roles"] as $role)       
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <h4 class="card-title flex-grow-1">
                                            <a  data-parent="#accordion" href="#"  aria-expanded="true">
                                               {{$role["role_nom"]}}
                                            </a>
                                            </h4>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">

                                                <input type="checkbox" class="custom-control-input" wire:model.lazy="rolePermissions.roles.{{$loop->index}}.active"
                                                    @if ($role["active"]) checked @endif
                                                    id="customSwitch{{$role["role_id"]}}">
                                                <label class="custom-control-label" for="customSwitch{{$role["role_id"]}}"> {{$role["active"]? "Active" : "Desactiv??"}}</label>
                                            </div>
                                        </div>
                                    </div>
                                   @endforeach

                                   <!-- @json($rolePermissions['roles']) -->
                            </div>
                    </div>

                    <div class="p-3">
                        <table class="table table-bordered">
                            <thead>
                                <th>Permissions</th>
                                <th></th>
                            </thead>
                            <tbody>
                              @foreach ($rolePermissions["permissions"] as $permission)
                                <tr>
                                    <td>{{$permission["permission_nom"]}}</td>
                                    <td>
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">

                                                <input type="checkbox" class="custom-control-input"
                                                    wire:model.lazy="rolePermissions.permissions.{{$loop->index}}.active"
                                                    
                                                    id="customSwitchPermission{{$permission["permission_id"]}}">
                                                <label class="custom-control-label" for="customSwitchPermission{{$permission["permission_id"]}}"> {{$permission["active"]? "Active" : "Desactiv??"}}</label>
                                            </div>
                                    </td>
                                </tr>
                              @endforeach

                              <!-- @json($rolePermissions["permissions"]) -->
                            </tbody>

                        </table>
                    </div>
                </div>
        </div>
      </div>
    </div>


</div>

