<div class="col-sm-12 p-1 ">
    <h3>Utilisateur</h3>
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
            <h3 class="card-title"><i class="fas fa-user-plus fa-1x"></i> Formulaire de création d'un nouvel utilisateur</h3>
            </div>


            <form role="form" wire:submit.prevent="addUser()">
                <div class="card-body">

                    <div class="row">
                        <div class="col-6">
                                <div class="form-group">
                                        <label >Nom & prénom</label>
                                        <input placeholder="Nom & prénom" type="text" wire:model="newUser.name" class="form-control <?php $__errorArgs = ['newUser.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newUser.name'];
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
                                <input placeholder="Adresse e-mail" type="email" wire:model="newUser.email" class="form-control <?php $__errorArgs = ['newUser.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newUser.email'];
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
                                <input placeholder="Numéro de téléphone" type="text" class="form-control <?php $__errorArgs = ['newUser.phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model='newUser.phone'>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newUser.phone'];
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
                                <input type="contry" placeholder="utilisateur" class="form-control" wire:model='newUser.utilisateur'>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newUser.utilisateur'];
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
                                <label>Mot de passe</label>
                                <input type="password" disabled placeholder="************" class="form-control">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Liste des projet</label>
                                <select class="form-control" wire:model="newUser.projet_id"> <!-- Changer de agents à agent_id -->
                                    <option value="">Sélectionner un agent</option>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $projets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($projet->id); ?>"><?php echo e($projet->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </select>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newUser.projet_id'];
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
                    <button type="submit" class="btn btn-primary ">Enregistrer</button>
                    <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retourner à la liste des utilisateurs</button>
                </div>
            </form>
        </div>

        </div>
</div>
<?php /**PATH C:\laragon\www\coaching\resources\views/livewire/habilitations/utilisateurs/create.blade.php ENDPATH**/ ?>