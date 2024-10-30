<div class="col-sm-12 p-1 ">
    <h3>Mission</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Accueil</a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.habilitations.users.index')); ?>">Utilisateurs</a></li>
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
                                    <input type="text" wire:model="editUser.name" class="form-control <?php $__errorArgs = ['editUser.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['editUser.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                    </div>

                    <div class="col-6">
                            <div class="form-group">
                            <label >Adresse email</label>
                            <input type="email" wire:model="editUser.email" class="form-control <?php $__errorArgs = ['editUser.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['editUser.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label >Contact</label>
                            <input type="text" class="form-control <?php $__errorArgs = ['editUser.phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model='editUser.phone'>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['editUser.phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>



                    <div class="col-6">
                        <div class="form-group">
                            <label >Utilisateur</label>
                            <input type="text" class="form-control <?php $__errorArgs = ['editUser.utilisateur'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model='editUser.utilisateur'>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['editUser.utilisateur'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label >Contact</label>
                            <input disabled type="password" class="form-control <?php $__errorArgs = ['editUser.password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model='editUser.password'>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['editUser.password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>



                    <div class="col-6">
                        <div class="form-group">
                            <label>Liste des projet</label>
                            <select class="form-control" wire:model="editUser.projet_id"> <!-- Changer de agents à agent_id -->
                                <option value="">Sélectionner un agent</option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $projets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($projet->id); ?>"><?php echo e($projet->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['editUser.projet_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
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
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $rolePermissions['roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4 class="card-title flex-grow-1">
                                            <a data-parent="#accordion" href="#" aria-expanded="true">
                                                <?php echo e($role['role_name']); ?>

                                            </a>
                                        </h4>
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success ">

                                            <input type="checkbox" class="custom-control-input" wire:model.lazy='rolePermissions.roles.<?php echo e($loop->index); ?>.active'
                                            <?php if($role['active']): ?> checked <?php endif; ?>
                                            id="customSwitch <?php echo e($role['role_id']); ?>">
                                            <label class="custom-control-label" for="customSwitch <?php echo e($role['role_id']); ?>"> <?php echo e($role['active']? "Activé" : "Desactivé"); ?></label>
                                        </div>

                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>

                        </div>


                        <div class="p-3 col-6">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Permission</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $rolePermissions['permissions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($permission['permission_name']); ?></td>
                                        <td>

                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success ">

                                            <input type="checkbox" class="custom-control-input"
                                            <?php if($permission['active']): ?> checked <?php endif; ?>
                                            wire:model.lazy='rolePermissions.permissions.<?php echo e($loop->index); ?>.active'

                                            id="customSwitchPermission <?php echo e($permission['permission_id']); ?>">
                                            <label class="custom-control-label" for="customSwitchPermission <?php echo e($permission['permission_id']); ?>"><?php echo e($permission['active']? "Activé" : "Desactivé"); ?></label>
                                        </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </tbody>
                            </table>
                        </div>

                    </div>






                </div>

            </div>

        </div>
    </div>


</div>


<?php /**PATH C:\laragon\www\coaching\resources\views/livewire/habilitations/utilisateurs/edit.blade.php ENDPATH**/ ?>