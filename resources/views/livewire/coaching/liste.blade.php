<div class="col-sm-12 p-1">
    <h3>Liste des Coachings</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
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
                    @php
                        $coachingNumber = 1; // Initialise le compteur pour la numérotation des utilisateurs non-admin
                    @endphp
                    @forelse ($coachings as $coaching)
                        <tr>
                            <td>
                                @if (auth()->user()->hasRole(['Admin', 'CDP']))
                                    <!-- Affichage de l'ID réel pour les rôles Admin et CDP -->
                                    {{ $coaching->id }}
                                @else
                                    <!-- Numérotation relative pour les autres utilisateurs -->
                                    {{ $coachingNumber }}
                                    @php $coachingNumber++; @endphp <!-- Incrémentation du numéro pour l'utilisateur -->
                                @endif
                            </td>

                            <td>{{ $coaching->kpi1->name }}</td>
                            <td>{{ $coaching->kpi2->name }}</td>
                            <td>{{ $coaching->date_coaching }}</td>
                            <td class="text-center">
                                {{ $coaching->statut }}</td>
                                <td class="text-center">
                                    @if ($coaching->statut === 'Approuvé' || $coaching->statut === 'Annulé' || ($coaching->statut === 'En attente' && Auth::user()->hasRole('CDP')))
                                        <button class="btn btn-link" wire:click='viewCoaching({{ $coaching->id }})'><i class="far fa-eye"></i></button>
                                    @elseif ($coaching->statut === 'En attente')
                                        <button class="btn btn-link" wire:click="confirmDelete('{{ $coaching->date_coaching }}', {{ $coaching->id }})"><i class="fas fa-trash-alt"></i></button>
                                    @endif
                                </td>
                                

                            <div class="modal fade" id="modalCoaching{{ $coaching->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $coaching->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel{{ $coaching->id }}">Détails du Coaching</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>KP Impacté:</strong> {{ $coaching->kpi1->name }}</p>
                                            <p><strong>Date Coaching:</strong> {{ $coaching->date_coaching }}</p>
                                            <p><strong>Durée Coaching:</strong> {{ $coaching->duree_coaching }} heures</p>
                                            <p><strong>Points Forts:</strong> {{ $coaching->Points_forts }}</p>
                                            <p><strong>Axe d'Amélioration:</strong> {{ $coaching->exe_améliorations }}</p>
                                            <p><strong>Remarque:</strong> {{ $coaching->Remarque }}</p>
                                            <p><strong>Statut:</strong> {{ $coaching->statut }}</p>
                                            <!-- Ajoutez d'autres champs si nécessaire -->
                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" aria-label="Close"  class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Aucune information disponible pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>


            </table>
        </div>
        <nav aria-label="page navigation example" class="mt-3">
            {{ $coachings->links() }}
        </nav>
    </div>
</div>
