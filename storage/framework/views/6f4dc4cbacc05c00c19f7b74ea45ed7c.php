<?php $__env->startSection('contenu'); ?>


<div class="col-sm-12 p-1">
    <h3>Tableau de bord</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Accueil</a></li>
        </ol>
    </nav>
</div>


<section class="content">
    <div class="container-fluid">



        <div class="row">


            <div class="col-12">

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="far fas fa-chart-pie"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Coaching En attent</span>
                                <span class="info-box-number"><h3><?php echo e(countCoachingEnAttenteForManagersInSameProject()); ?></h3></span>
                                <span class="progress-description">
                                Coaching
                                </span>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="far fas fa-chart-pie"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Coaching Annulé</span>
                                <span class="info-box-number"><h3><?php echo e(countCoachingAnnuléForManagersInSameProject()); ?></h3></span>
                                <span class="progress-description">
                                Coaching
                                </span>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="fas fa-chart-pie"></i></span>
                            <div class="info-box-content">
                            <span class="info-box-text">Coaching Réalisé</span>
                            <span class="info-box-number"><h3><?php echo e(countCoachingRealiséForManagersInSameProject()); ?></h3></span>
                            <span class="progress-description">
                            Coaching
                            </span>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fas fa-chart-pie"></i></span>
                            <div class="info-box-content">
                            <span class="info-box-text">Vous avez</span>
                            <span class="info-box-number"><h3><?php echo e(getManagersInSameProjectAsCDPAgent()); ?></h3></span>
                            <span class="progress-description">
                            Agent(s)
                            </span>
                            </div>

                        </div>

                    </div>
                </div>



            </div>

        </div>


        <div class="row">

            <div class="col-3">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="info-box bg-primary">
                        <span class="info-box-icon"><i class="far fas fa-chart-pie"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Vous avez</span>
                            <span class="info-box-number"><h3><?php echo e(getManagersInSameProjectAsCDP ()); ?></h3></span>
                            <span class="progress-description">
                            Manager(s)
                            </span>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-9">

                <div class="card">
                        <div class="card-header bg-primary d-flex align-items-center">
                        <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des managers</h3>
                        <div class="card-tools d-flex align-items-center">
                        <div class="input-group input-group-md" style="width:250px;">
                            <a class="btn btn-links text-white d-block"><i style="padding-right:4px" class="fas fa-file-excel"></i>Exporter</a>
                        </div>

                        </div>
                        </div>

                    <div class="card-body table-responsive p-0 table-striped" style="max-height: 500px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th style="width:10% ;">No</th>
                                <th style="width:30% ;">Nom</th>
                                <th style="width:20% ;">Coaching Réalisé</th>
                                <th style="width:20% ;">Coaching En attent</th>
                                <th style="width:20% ;">Coaching Annulé</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($manager->id); ?></td>
                                    <td ><?php echo e($manager->name); ?></td>
                                    <td ><?php echo e($manager->coachings->count()); ?></td>
                                    <td ><?php echo e($manager->coachings->where('statut', 'En attente')->count()); ?></td>
                                    <td ><?php echo e($manager->coachings->where('statut', 'Annulé')->count()); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center">Aucun manager disponible.</td>
                                </tr>
                            <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                    <nav arial-label="page navigation exemple" class="mt-3">
                        <ul class="pagination">

                        </ul>

                    </nav>

                </div>

            </div>


        </div>

    </div>
    </section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\coaching\resources\views/dashboard/cdp.blade.php ENDPATH**/ ?>