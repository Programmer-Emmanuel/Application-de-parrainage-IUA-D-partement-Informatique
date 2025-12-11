<?php

namespace App\Http\Controllers;

use App\Imports\L1GISImport;
use App\Imports\L1MIAGESImport;
use App\Imports\L2GISImport;
use App\Imports\L2MIAGESImport;
use App\Models\L1GI;
use App\Models\L1MIAGE;
use App\Models\L2GI;
use App\Models\L2MIAGE;
use App\Models\Parrainage;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EtudiantController extends Controller
{
    public function enregistrer_l1_gi(Request $request){
        $request->validate([
            'fichier' => 'required|mimes:xlsx,xls,csv'
        ]);

        try {
            Excel::import(new L1GISImport, $request->file('fichier'));

            return response()->json([
                'success' => true,
                'message' => 'Importation réussie dans L1_GI avec succès !',
                'data' => L1GI::all() // récupère tous les enregistrements
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l’importation.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function enregistrer_l2_gi(Request $request){
        $request->validate([
            'fichier' => 'required|mimes:xlsx,xls,csv'
        ]);

        try {
            Excel::import(new L2GISImport, $request->file('fichier'));

            return response()->json([
                'success' => true,
                'message' => 'Importation réussie dans L2_GI avec succès !',
                'data' => L2GI::all()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l’importation.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function enregistrer_l1_miage(Request $request){
        $request->validate([
            'fichier' => 'required|mimes:xlsx,xls,csv'
        ]);

        try {
            Excel::import(new L1MIAGESImport, $request->file('fichier'));

            return response()->json([
                'success' => true,
                'message' => 'Importation réussie dans L1_MIAGE avec succès !',
                'data' => L1MIAGE::all()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l’importation.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function enregistrer_l2_miage(Request $request){
        $request->validate([
            'fichier' => 'required|mimes:xlsx,xls,csv'
        ]);

        try {
            Excel::import(new L2MIAGESImport, $request->file('fichier'));

            return response()->json([
                'success' => true,
                'message' => 'Importation réussie dans L2_MIAGE avec succès !',
                'data' => L2MIAGE::all()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l’importation.',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    public function liste_l1_gi(){
        try{
            $l1_gi = L1GI::orderBy('nom', 'desc')->get();
            if($l1_gi->isEmpty()){
                return response()->json([
                    'success' => true,
                    'data' => [],
                    'message' => 'Aucun étudiant enregistré'
                ],200);
            }

            return response()->json([
                'success' => true,
                'data' => $l1_gi,
                'message' => 'Liste des etudiants de l1_GI affiché avec succès'
            ],200);
        }
        catch(QueryException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l’affichage de la liste des L1 GI',
                'erreur' => $e->getMessage()
            ],500);
        }
    }

    public function liste_l2_gi(){
        try{
            $l2_gi = L2GI::orderBy('nom', 'desc')->get();
            if($l2_gi->isEmpty()){
                return response()->json([
                    'success' => true,
                    'data' => [],
                    'message' => 'Aucun étudiant enregistré'
                ],200);
            }

            return response()->json([
                'success' => true,
                'data' => $l2_gi,
                'message' => 'Liste des etudiants de l2_GI affiché avec succès'
            ],200);
        }
        catch(QueryException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l’affichage de la liste des L2 GI',
                'erreur' => $e->getMessage()
            ],500);
        }
    }

    public function liste_l1_miage(){
        try{
            $l1_miage = L1MIAGE::orderBy('nom', 'desc')->get();
            if($l1_miage->isEmpty()){
                return response()->json([
                    'success' => true,
                    'data' => [],
                    'message' => 'Aucun étudiant enregistré'
                ],200);
            }

            return response()->json([
                'success' => true,
                'data' => $l1_miage,
                'message' => 'Liste des etudiants de l1_MIAGE affiché avec succès'
            ],200);
        }
        catch(QueryException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l’affichage de la liste des L1 MIAGE',
                'erreur' => $e->getMessage()
            ],500);
        }
    }

    public function liste_l2_miage(){
        try{
            $l2_miage = L2MIAGE::orderBy('nom', 'desc')->get();
            if($l2_miage->isEmpty()){
                return response()->json([
                    'success' => true,
                    'data' => [],
                    'message' => 'Aucun étudiant enregistré'
                ],200);
            }

            return response()->json([
                'success' => true,
                'data' => $l2_miage,
                'message' => 'Liste des etudiants de l2_MIAGE affiché avec succès'
            ],200);
        }
        catch(QueryException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l’affichage de la liste des L2 MIAGE',
                'erreur' => $e->getMessage()
            ],500);
        }
    }


    public function matchAll(){
        $filieres = [
            [
                "filiere" => "GI",
                "l1" => \App\Models\L1GI::class,
                "l2" => \App\Models\L2GI::class
            ],
            [
                "filiere" => "MIAGE",
                "l1" => \App\Models\L1MIAGE::class,
                "l2" => \App\Models\L2MIAGE::class
            ]
        ];

        foreach ($filieres as $f) {
            $this->matchFiliere($f["filiere"], $f["l1"], $f["l2"]);
        }

        return response()->json([
            "success" => true,
            "message" => "Matching automatique terminé pour toutes les filières"
        ]);
    }



    // ==================================================
    //  M A T C H I N G     P A R     F I L I E R E
    // ==================================================

    private function matchFiliere($filiere, $L1Model, $L2Model){
        // Tous les L1
        $l1_all = $L1Model::all();
        // Tous les L2
        $l2_all = $L2Model::all();

        /*
        |--------------------------------------------------------------------------
        | ÉTAPE 1 : Tous les L1 doivent avoir UN parrain
        |--------------------------------------------------------------------------
        */
        $l1_sans_parrain = $l1_all->filter(function($et){
            return !$et->parrainage; // pas encore de parrain
        });

        foreach ($l1_sans_parrain as $l1) {
            // trouver un L2 n'ayant pas atteint la limite (ou 0 filleul)
            $parrain = $L2Model::withCount('filleuls')
                ->orderBy('filleuls_count', 'asc')
                ->first();

            if ($parrain) {
                Parrainage::create([
                    'parrain_id' => $parrain->id,
                    'filleul_id' => $l1->id,
                    'filiere'    => $filiere
                ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | ÉTAPE 2 : Tous les L2 doivent avoir AU MOINS un filleul
        |--------------------------------------------------------------------------
        */
        $l2_sans_filleul = $l2_all->filter(function($et){
            return $et->filleuls()->count() == 0;
        });

        foreach ($l2_sans_filleul as $l2) {
            $filleul = $l1_all->filter(fn($x) => !$x->parrainage)->first();

            if ($filleul) {
                Parrainage::create([
                    'parrain_id' => $l2->id,
                    'filleul_id' => $filleul->id,
                    'filiere'    => $filiere
                ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | ÉTAPE 3 : Distribution des restes (jusqu'à 5 filleuls)
        |--------------------------------------------------------------------------
        */
        $l1_restants = $l1_all->filter(fn($x) => !$x->parrainage);
        $l2_dispo = $L2Model::withCount('filleuls')
            ->get()
            ->filter(fn($p) => $p->filleuls_count < 5);

        $index = 0;

        foreach ($l1_restants as $l1) {
            if (!isset($l2_dispo[$index])) break;

            $parrain = $l2_dispo[$index];

            Parrainage::create([
                'parrain_id' => $parrain->id,
                'filleul_id' => $l1->id,
                'filiere'    => $filiere
            ]);

            $parrain->filleuls_count++;

            if ($parrain->filleuls_count >= 5) {
                $index++;
            }
        }
    }




    public function showByMatricule($matricule)
    {
        // 🔎 Vérifier d’abord L1 GI
        if ($etudiant = L1GI::where('matricule', $matricule)->first()) {
            return $this->showParrainL1($etudiant, "GI");
        }

        // 🔎 L2 GI
        if ($etudiant = L2GI::where('matricule', $matricule)->first()) {
            return $this->showFilleulsL2($etudiant, "GI");
        }

        // 🔎 L1 MIAGE
        if ($etudiant = L1MIAGE::where('matricule', $matricule)->first()) {
            return $this->showParrainL1($etudiant, "MIAGE");
        }

        // 🔎 L2 MIAGE
        if ($etudiant = L2MIAGE::where('matricule', $matricule)->first()) {
            return $this->showFilleulsL2($etudiant, "MIAGE");
        }

        return response()->json([
            "success" => false,
            "message" => "Matricule introuvable dans L1 ou L2."
        ], 404);
    }

    // -------------------------
    // 🔵 ETUDIANT L1 → afficher son parrain
    // -------------------------
    private function showParrainL1($etudiant, $filiere)
    {
        $parrainage = Parrainage::where('filleul_id', $etudiant->id)
                                ->where('filiere', $filiere)
                                ->first();

        if (!$parrainage) {
            return response()->json([
                "success" => true,
                "message" => "Cet étudiant n'a pas encore de parrain.",
                "etudiant" => $etudiant,
                "parrain" => null
            ]);
        }

        // récupérer dans la bonne table L2
        $parrain = $filiere === "GI"
            ? L2GI::find($parrainage->parrain_id)
            : L2MIAGE::find($parrainage->parrain_id);

        return response()->json([
            "success" => true,
            "type" => "L1",
            "filiere" => $filiere,
            "etudiant" => $etudiant,
            "parrain" => $parrain
        ]);
    }

    // -------------------------
    // 🟠 ETUDIANT L2 → afficher ses filleuls
    // -------------------------
    private function showFilleulsL2($etudiant, $filiere)
    {
        $parrainages = Parrainage::where('parrain_id', $etudiant->id)
                                 ->where('filiere', $filiere)
                                 ->get();

        if ($parrainages->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Cet étudiant n'a pas encore de filleuls.",
                "etudiant" => $etudiant,
                "filleuls" => []
            ]);
        }

        // récupérer les filleuls dans la bonne table L1
        $filleuls = ($filiere === "GI")
            ? L1GI::whereIn('id', $parrainages->pluck('filleul_id'))->get()
            : L1MIAGE::whereIn('id', $parrainages->pluck('filleul_id'))->get();

        return response()->json([
            "success" => true,
            "type" => "L2",
            "filiere" => $filiere,
            "etudiant" => $etudiant,
            "filleuls" => $filleuls
        ]);
    }

    

}
