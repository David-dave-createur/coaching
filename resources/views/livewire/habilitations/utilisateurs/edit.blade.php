<div class="col-sm-12 p-1 ">
    <h3>Mission</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.habilitations.users.index') }}">Utilisateurs</a></li>
          <li class="breadcrumb-item active" aria-current="page">Nouvel utilisteur</li>
        </ol>
      </nav>
    </ol>

</div >


<div class="row">
    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'edition utilisateur</h3>
            </div>


            <form role="form" wire:submit.prevent="updateUser()">
            <div class="card-body">

                <div class="row">
                    <div class="col-6">
                            <div class="form-group">
                                    <label >Nom & prénom</label>
                                    <input type="text" wire:model="editUser.name" class="form-control @error('editUser.name') is-invalid @enderror">

                                    @error('editUser.name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                    </div>

                    <div class="col-6">
                            <div class="form-group">
                            <label >Adresse email</label>
                            <input type="email" wire:model="editUser.email" class="form-control @error('editUser.email') is-invalid @enderror">

                            @error('editUser.email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                            </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label >Contact</label>
                            <input type="text" class="form-control @error('editUser.phone') is-invalid @enderror" wire:model='editUser.phone'>
                            @error('editUser.phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="col-6">
                        <div class="form-group">
                            <label >Utilisateur</label>
                            <input type="text" class="form-control @error('editUser.utilisateur') is-invalid @enderror" wire:model='editUser.utilisateur'>
                            @error('editUser.utilisateur')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label >Contact</label>
                            <input disabled type="password" class="form-control @error('editUser.password') is-invalid @enderror" wire:model='editUser.password'>
                            @error('editUser.password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="col-6">
                        <div class="form-group">
                            <label>Liste des projet</label>
                            <select class="form-control" wire:model="editUser.projet_id"> <!-- Changer de agents à agent_id -->
                                <option value="">Sélectionner un agent</option>
                                @foreach($projets as $projet)
                                    <option value="{{ $projet->id }}">{{ $projet->name }}</option>
                                @endforeach
                            </select>
                            @error('editUser.projet_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>



                




            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary ">Appliquer les modifications</button>
                <button type="button" wire:click="goToListUser()" class="btn btn-danger"> Retour</button>
                </div>
                </form>
        </div>

    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-key fa-2x"></i> Renitialisation de mot de passe</h3>
                    </div>

                    <div class="card-body">
                        <ul>
                            <li>
                                <a href="" class="btn btn-link" wire:click.prevent='confirmPwdReset'>Renitialiser le mot de passe</a>
                                <span>(par defaut : "password")</span>
                            </li>
                        </ul>

                    </div>


                </div>

            </div>

            <div class="col-md-12 mt-4">

                <div class="card card-primary">
                    <div class="card-header d-flex align-items-center ">
                    <h3 class="card-title flex-grow-1"><i class="fas fa-fingerprint fa-2x"></i> Roles & permissions</h3>
                    <button class="btn bg-gradient-success" wire:click='updateRoleAndPermissions'><i class="fas fa-check"></i>Appliquer les modification</button>
                    </div>


                    <div class="row">
                        <div class="card-body col-6">
                            <div id=accordion>
                                @foreach ($rolePermissions['roles'] as $role)
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4 class="card-title flex-grow-1">
                                            <a data-parent="#accordion" href="#" aria-expanded="true">
                                                {{ $role['role_name'] }}
                                            </a>
                                        </h4>
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success ">

                                            <input type="checkbox" class="custom-control-input" wire:model.lazy='rolePermissions.roles.{{ $loop->index }}.active'
                                            @if ($role['active']) checked @endif
                                            id="customSwitch {{ $role['role_id'] }}">
                                            <label class="custom-control-label" for="customSwitch {{ $role['role_id'] }}"> {{ $role['active']? "Activé" : "Desactivé" }}</label>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>


                        <div class="p-3 col-6">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Permission</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($rolePermissions['permissions'] as $permission)
                                    <tr>
                                        <td>{{ $permission['permission_name'] }}</td>
                                        <td>

                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success ">

                                            <input type="checkbox" class="custom-control-input"
                                            @if ($permission['active']) checked @endif
                                            wire:model.lazy='rolePermissions.permissions.{{ $loop->index }}.active'

                                            id="customSwitchPermission {{ $permission['permission_id'] }}">
                                            <label class="custom-control-label" for="customSwitchPermission {{ $permission['permission_id'] }}">{{ $permission['active']? "Activé" : "Desactivé" }}</label>
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>






                </div>

            </div>

        </div>
    </div>


</div>


