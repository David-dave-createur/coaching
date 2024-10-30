<?php

use App\Livewire\SuiviComp;
use App\Livewire\AgentsComp;
use App\Livewire\ProfilComp;
use App\Livewire\TicketForm;
use App\Livewire\CoachingComp;
use App\Livewire\AssignationComp;
use App\Livewire\UtilisateurComp;
use App\Livewire\NotificationComp;
use App\Livewire\AgentCoachingComp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Le groupe des routes relatives aux administrateurs
Route::group([
    "middleware" => ["auth"],
    "as" => "admin."
], function(){

    Route::group([
        "prefix" => "habilitations",
        "as" => "habilitations."
    ], function(){
        Route::get("/utilisateurs", UtilisateurComp::class)
            ->name("users.index")
            ->middleware('can:habilitations');
    });

    Route::group([
        "prefix" => "habilitations",
        "as" => "habilitations."
    ], function(){
        Route::get("/assignations", AssignationComp::class)
            ->name("users.assignations")
            ->middleware('can:habilitations');
    });

    Route::group([
        "prefix" => "parametre",
        "as" => "parametre."
    ], function(){
        Route::get("/profil", ProfilComp::class)
            ->name("profil")
            ->middleware('can:Paramètre');
    });

    Route::group([
        "prefix" => "parametre",
        "as" => "parametre."
    ], function(){
        Route::get("/notification", NotificationComp::class)
            ->name("notification")
            ->middleware('can:Paramètre');
    });

    Route::get("/plan_d_amelioration", TicketForm::class)
        ->name("plan_d_amelioration")
        ->middleware('can:signalement');
    
    Route::get("/agent_coaching", AgentCoachingComp::class)
        ->name("agent_coaching")
        ->middleware('can:agent-coaching');
    
    Route::get("/coaching", CoachingComp::class)
        ->name("coaching")
        ->middleware('can:coaching');
    
    Route::get("/suivi_avancement", SuiviComp::class)
        ->name("suivi_avancement")
        ->middleware('can:signalement');
});