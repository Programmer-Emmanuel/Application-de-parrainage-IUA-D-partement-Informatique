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
});

Route::get('/parrainage/matricule/{matricule}', [EtudiantController::class, 'showByMatricule']);

