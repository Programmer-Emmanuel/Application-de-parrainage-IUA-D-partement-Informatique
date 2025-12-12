<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EtudiantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AdminController::class, 'login']);
Route::middleware('auth:admin')->group(function(){
    //Enregistrer les etudiants en bdd
    Route::post('/enregistrer/l1/gi', [EtudiantController::class, 'enregistrer_l1_gi']);
    Route::post('/enregistrer/l2/gi', [EtudiantController::class, 'enregistrer_l2_gi']);
    Route::post('/enregistrer/l1/miage', [EtudiantController::class, 'enregistrer_l1_miage']);
    Route::post('/enregistrer/l2/miage', [EtudiantController::class, 'enregistrer_l2_miage']);

    //Lister les etudiants
    Route::get('/liste/l1/gi', [EtudiantController::class, 'liste_l1_gi']);
    Route::get('/liste/l2/gi', [EtudiantController::class, 'liste_l2_gi']);
    Route::get('/liste/l1/miage', [EtudiantController::class, 'liste_l1_miage']);
    Route::get('/liste/l2/miage', [EtudiantController::class, 'liste_l2_miage']);

    //Matching:
    Route::get('/matching/run', [EtudiantController::class, 'matchAll']);

    Route::post('/ajout/sous/admin', [AdminController::class, 'ajout_admin']);
    Route::get('/liste/admin', [AdminController::class, 'liste_admin']);
    Route::get('/admin/{id}', [AdminController::class, 'admin']);
    Route::post('delete/admin/{id}', [AdminController::class, 'delete_admin']);
    Route::get('/info/admin', [AdminController::class, 'info_admin']);
    Route::post('/update/info/', [AdminController::class, 'update_info']);
    Route::post('/change/password', [AdminController::class, 'change_password']);

    Route::post('/etudiant/{niveau}/{filiere}/ajouter', [EtudiantController::class, 'ajouterEtudiant']);
    Route::post('/etudiant/{id}/modifier', [EtudiantController::class, 'modifierEtudiant']);
    Route::post('/etudiant/{id}/supprimer', [EtudiantController::class, 'supprimerEtudiant']);

    Route::post('/reinitialiser', [AdminController::class, 'reinitialiser']);

});

Route::get('/parrainage/matricule/{matricule}', [EtudiantController::class, 'showByMatricule']);

