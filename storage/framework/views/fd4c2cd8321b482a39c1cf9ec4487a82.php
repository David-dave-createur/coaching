<div class="col-sm-12 p-1">
    <h3>Liste des Coachings</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Coaching</li>
        </ol>
    </nav>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-header bg-primary d-flex align-items-center">
            <h3 class="card-title flex-grow-1"><i class="fas fa-tag fa-2x"></i> Liste des Coachings</h3>
            <div class="card-tools d-flex align-items-center">
                <a class="btn btn-links text-white d-block" wire:click.prevent="goToAddCoaching()"><i class="fas fa-user-plus"></i> Nouveau Coaching</a>
                <div class="input-group input-group-md" style="width:250px;">
                    <input type="text" name="table_search" wire:model.live='search' class="form-control float-right" placeholder="Recherche">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body table-responsive p-0 table-striped" style="max-height: 500px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th style="width:15%;">Id</th>
                        <th style="width:15%;">KPI1</th>
                        <th style="width:15%;">KPI2</th>
                        <th style="width:15%;">Date</th>
                        <th style="width:15%;" class="text-center">Statut</th>
                        <th style="width:10%;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $coachingNumber = 1; // Initialise le compteur pour la numérotation des utilisateurs non-admin
                    ?>
                    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $coachings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coaching): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <!--[if BLOCK]><![endif]--><?php if(auth()->user()->hasRole(['Admin', 'CDP'])): ?>
                                    <!-- Affichage de l'ID réel pour les rôles Admin et CDP -->
                                    <?php echo e($coaching->id); ?>

                                <?php else: ?>
                                    <!-- Numérotation relative pour les autres utilisateurs -->
                                    <?php echo e($coachingNumber); ?>

                                    <?php $coachingNumber++; ?> <!-- Incrémentation du numéro pour l'utilisateur -->
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </td>

                            <td><?php echo e($coaching->kpi1->name); ?></td>
                            <td><?php echo e($coaching->kpi2->name); ?></td>
                            <td><?php echo e($coaching->date_coaching); ?></td>
                            <td class="text-center">
                                <?php echo e($coaching->statut); ?></td>
                                <td class="text-center">
                                    <!--[if BLOCK]><![endif]--><?php if($coaching->statut === 'Approuvé' || $coaching->statut === 'Annulé' || ($coaching->statut === 'En attente' && Auth::user()->hasRole('CDP'))): ?>
                                        <button class="btn btn-link" wire:click='viewCoaching(<?php echo e($coaching->id); ?>)'><i class="far fa-eye"></i></button>
                                    <?php elseif($coaching->statut === 'En attente'): ?>
                                        <button class="btn btn-link" wire:click="confirmDelete('<?php echo e($coaching->date_coaching); ?>', <?php echo e($coaching->id); ?>)"><i class="fas fa-trash-alt"></i></button>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </td>
                                

                            <div class="modal fade" id="modalCoaching<?php echo e($coaching->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?php echo e($coaching->id); ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel<?php echo e($coaching->id); ?>">Détails du Coaching</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>KP Impacté:</strong> <?php echo e($coaching->kpi1->name); ?></p>
                                            <p><strong>Date Coaching:</strong> <?php echo e($coaching->date_coaching); ?></p>
                                            <p><strong>Durée Coaching:</strong> <?php echo e($coaching->duree_coaching); ?> heures</p>
                                            <p><strong>Points Forts:</strong> <?php echo e($coaching->Points_forts); ?></p>
                                            <p><strong>Axe d'Amélioration:</strong> <?php echo e($coaching->exe_améliorations); ?></p>
                                            <p><strong>Remarque:</strong> <?php echo e($coaching->Remarque); ?></p>
                                            <p><strong>Statut:</strong> <?php echo e($coaching->statut); ?></p>
                                            <!-- Ajoutez d'autres champs si nécessaire -->
                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" aria-label="Close"  class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center">Aucune information disponible pour le moment.</td>
                        </tr>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>


            </table>
        </div>
        <nav aria-label="page navigation example" class="mt-3">
            <?php echo e($coachings->links()); ?>

        </nav>
    </div>
</div>
<?php /**PATH C:\laragon\www\coaching\resources\views/livewire/coaching/liste.blade.php ENDPATH**/ ?>