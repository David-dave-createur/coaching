<?php

namespace App\Livewire;

use App\Models\Kpi1;
use App\Models\Kpi2;
use App\Models\User;
use App\Models\Agent;
use App\Models\Projet;
use Livewire\Component;
use App\Models\Coaching;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class CoachingComp extends Component
{
    use WithPagination;

    public $search = "";
    public $currentPage = 'list'; // 'list' ou 'create'

    // Propriétés pour le formulaire
    public $kp_impacte;
    public $kp_travaille;
    public $date_coaching;
    public $duree_coaching;
    public $heure_debut;
    public $heure_fin;
    public $Points_forts;
    public $exe_améliorations;
    public $Remarque;
    public $duree_application_plan;
    public $Constats;
    public $Causes;
    public $agent;
    public $Actions;
    public $Porteurs;
    public $Deadline;
    public $Résultats_Attendus;
    public $user;
    public $heures = [];    // Tableau des options de durée
    public $coaching;

    public $users = [] ;

    // Ajouter ici
    public $user_id; // Propriété pour l'ID de l'utilisateur qui crée le coaching

    protected $paginationTheme = "bootstrap";




    public function mount() {
        $currentUser = Auth::user();
        
        try {
            if ($currentUser->hasRole('Admin')) {
                // Les Admins voient tous les agents
                $this->users = User::role('Agent')->get();
            } elseif ($currentUser->hasRole('CDP')) {
                // Les CDP voient tous les Managers dans le même projet
                $this->users = User::role('Manager')->where('projet_id', $currentUser->projet_id)->get();
            } elseif ($currentUser->hasRole('Manager')) {
                // Filtrer par projet selon le manager
                $this->users = User::role('Agent')->where('projet_id', $currentUser->projet_id)->get();
            } else {
                $this->users = collect(); // Si aucun rôle pertinent, initialiser à une collection vide
            }
            
            $this->heures = $this->generateDurations(0.5, 8, 0.5); // 0.5 = 30 minutes, max = 8h
        } catch (\Exception $e) {
            // Gérer l'exception, éventuellement logger ou afficher un message d'erreur
            $this->users = collect(); // Réinitialiser à une collection vide en cas d'erreur
            Log::error('Erreur lors de la récupération des utilisateurs : ' . $e->getMessage());
        }
    }
    
    


    public function render() {
        return view('livewire.coaching.index', [
            'coachings' => $this->searchCoachings(),
            'kpi1s' => Kpi1::all(), // Récupérer tous les KPI1
            'kpi2s' => Kpi2::all(), // Récupérer tous les KPI2
            'users' => $this->users, // Utiliser les utilisateurs filtrés
        ])->extends('layouts.master')->section('contenu');
    }



    public function generateDurations($start, $end, $step)
    {
        $durations = [];
        for ($i = $start; $i <= $end; $i += $step) {
            $hours = floor($i);
            $minutes = ($i - $hours) * 60;
            $formatted = $minutes == 0 ? "{$hours}h" : "{$hours}h{$minutes}"; // Formater "1h30"
            $durations[] = [
                'value' => number_format($i, 1), // Valeur réelle pour le modèle
                'label' => $formatted,           // Libellé pour affichage
            ];
        }
        return $durations;
    }




    public function searchCoachings()
    {
        $user = Auth::user();
    
        if ($user->hasRole('Admin')) {
            // L'admin voit tous les coachings
            return Coaching::paginate(10);
        } elseif ($user->hasRole('CDP')) {
            // Récupérer les IDs des managers dans le même projet que le CDP
            $managerIds = User::role('Manager')
                ->where('projet_id', $user->projet_id)
                ->pluck('id');
    
            // Récupérer les coachings des agents supervisés par ces managers
            return Coaching::whereIn('user_id', $managerIds)
                ->orWhere('user_id', $user->id) // Inclure les coachings créés par le CDP lui-même, si pertinent
                ->paginate(10);
        } else {
            // Autres utilisateurs voient uniquement leurs propres coachings
            return Coaching::where('user_id', $user->id)
                ->paginate(10);
        }
    }
    



    public function goToAddCoaching()
    {
        $this->currentPage = 'create';
        $this->resetForm();
    }

    public function editCoaching($id)
    {
        $this->currentPage = 'edit';
        $coaching = Coaching::find($id);

        if ($coaching) {
            $this->kp_impacte = $coaching->kpi1_id;
            $this->kp_travaille = $coaching->kpi2_id;
            $this->agent = $coaching->agent;
            $this->date_coaching = $coaching->date_coaching;
            $this->duree_coaching = $coaching->duree_coaching;
            $this->heure_debut = $coaching->heure_debut;
            $this->heure_fin = $coaching->heure_fin;
            $this->Points_forts = $coaching->Points_forts;
            $this->exe_améliorations = $coaching->exe_améliorations;
            $this->Remarque = $coaching->Remarque;
            $this->duree_application_plan = $coaching->duree_application_plan;
            $this->Constats = $coaching->Constats;
            $this->Causes = $coaching->Causes;
            $this->Actions = $coaching->Actions;
            $this->Porteurs = $coaching->Porteurs;
            $this->Deadline = $coaching->Deadline;
            $this->Résultats_Attendus = $coaching->Résultats_Attendus;
        }
    }

    public function goToListCoaching()
    {
        $this->currentPage = 'list';
    }

    public function submit()
    {
        $this->validate([
            'kp_impacte' => 'required',
            'kp_travaille' => 'required',
            'date_coaching' => 'required|date',
            'duree_coaching' => 'nullable|string',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i',
            'Points_forts' => 'nullable|string',
            'exe_améliorations' => 'nullable|string',
            'Remarque' => 'nullable|string',
            'agent' => 'required|string',
            'duree_application_plan' => 'nullable|string',
            'Constats' => 'nullable|string',
            'Causes' => 'nullable|string',
            'Actions' => 'nullable|string',
            'Porteurs' => 'nullable|string',
            'Deadline' => 'nullable|string',
            'Résultats_Attendus' => 'nullable|string',
        ]);

        if ($this->currentPage === 'edit') {
            // Mettre à jour le coaching existant
            $coaching = Coaching::find($this->id);
            $coaching->update([
                'kpi1_id' => $this->kp_impacte,
                'kpi2_id' => $this->kp_travaille,
                'agent' => $this->agent,
                'user_id' => auth()->id(), // Ajoutez l'ID de l'utilisateur ici
                'date_coaching' => $this->date_coaching,
                'duree_coaching' => $this->duree_coaching,
                'heure_debut' => $this->heure_debut,
                'heure_fin' => $this->heure_fin,
                'Points_forts' => $this->Points_forts,
                'exe_améliorations' => $this->exe_améliorations,
                'Remarque' => $this->Remarque,
                'duree_application_plan' => $this->duree_application_plan,
                'Constats' => $this->Constats,
                'Causes' => $this->Causes,
                'Actions' => $this->Actions,
                'Porteurs' => $this->Porteurs,
                'Deadline' => $this->Deadline,
                'Résultats_Attendus' => $this->Résultats_Attendus,
            ]);
        } else {
            // Créer un nouveau coaching
            Coaching::create([
                'kpi1_id' => $this->kp_impacte,
                'kpi2_id' => $this->kp_travaille,
                'agent' => $this->agent,
                'user_id' => auth()->id(), // Ajoutez l'ID de l'utilisateur ici
                'date_coaching' => $this->date_coaching,
                'duree_coaching' => $this->duree_coaching,
                'heure_debut' => $this->heure_debut,
                'heure_fin' => $this->heure_fin,
                'Points_forts' => $this->Points_forts,
                'exe_améliorations' => $this->exe_améliorations,
                'Remarque' => $this->Remarque,
                'duree_application_plan' => $this->duree_application_plan,
                'Constats' => $this->Constats,
                'Causes' => $this->Causes,
                'Actions' => $this->Actions,
                'Porteurs' => $this->Porteurs,
                'Deadline' => $this->Deadline,
                'Résultats_Attendus' => $this->Résultats_Attendus,
            ]);
        }

        session()->flash('message', 'Coaching enregistré avec succès !');
        $this->goToListCoaching();
    }


    private function resetForm()
    {
        $this->kp_impacte = null;
        $this->kp_travaille = null;
        $this->date_coaching = null;
        $this->duree_coaching = null;
        $this->heure_debut = null;
        $this->heure_fin = null;
        $this->Points_forts = null;
        $this->exe_améliorations = null;
        $this->Remarque = null;
        $this->agent = null; // Réinitialiser l'ID de l'agent
        $this->duree_application_plan = null;
        $this->Constats = null;
        $this->Causes = null;
        $this->Actions = null;
        $this->Porteurs = null;
        $this->Deadline = null;
        $this->Résultats_Attendus = null;
        // Réinitialiser user_id si besoin
        $this->user_id = null;
    }



    public function confirmDelete($date_coaching, $id)
    {
        $this->dispatch("showConfirmMessage", [
            "message" => [
                "text" => "Vous êtes sur le point de supprimer le coaching de la date du $date_coaching de la liste des coaching. Voulez-vous continuer?",
                "title" => "Êtes-vous sûr de continuer?",
                "type" => "warning",
                "data" => [
                    "coaching_id" => $id
                ]
            ]
        ]);
    }


    public function deleteCoaching($id)
    {
        Coaching::destroy($id);
        $this->dispatch("showSuccessMessage", ["message" => "Coaching supprimé avec succès!"]);
    }



    public function viewCoaching($id)
    {
        $this->currentPage = 'view'; // Mise à jour de la page en cours
        $this->coaching = Coaching::find($id); // Récupération du coaching par son ID

        if (!$this->coaching) {
            session()->flash('error', 'Coaching non trouvé');
            $this->currentPage = 'list'; // Retourner à la liste si le coaching n'existe pas
        }
    }


}