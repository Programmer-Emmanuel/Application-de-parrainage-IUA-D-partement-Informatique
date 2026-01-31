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
use Illuminate\Support\Facades\Validator;
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
                "type" => 'L1',
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
                "type" => "L2",
                "message" => "Cet étudiant n'a pas encore de filleuls.",
                "etudiant" => $etudiant,
                "filleuls" => null
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

    public function ajouterEtudiant(Request $request, $niveau, $filiere){
        // Normaliser les valeurs (L1 → l1, Miage → miage)
        $niveau = strtolower($niveau);
        $filiere = strtolower($filiere);

        // Table cible en fonction du niveau + filière
        $mapping = [
            'l1' => [
                'gi'     => L1GI::class,
                'miage'  => L1MIAGE::class,
            ],
            'l2' => [
                'gi'     => L2GI::class,
                'miage'  => L2MIAGE::class,
            ]
        ];

        // Vérifier si la combinaison existe
        if (!isset($mapping[$niveau][$filiere])) {
            return response()->json([
                'success' => false,
                'message' => 'Combinaison niveau/filière invalide. Exemple: l1/gi, l2/miage'
            ], 400);
        }

        $model = $mapping[$niveau][$filiere];

        // Validation dynamique
        $validator = Validator::make($request->all(),[
            'matricule' => 'required|string|unique:' . (new $model)->getTable() . ',matricule',
            'nom'       => 'required|string',
            'telephone' => 'nullable|string|unique:' . (new $model)->getTable() . ',telephone',
            'email'     => 'nullable|email|unique:' . (new $model)->getTable() . ',email',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ],422);
        }

        // Création de l'étudiant
        $etudiant = $model::create([
            'matricule' => $request->matricule,
            'nom'       => $request->nom,
            'telephone' => $request->telephone,
            'email'     => $request->email,
        ]);

        return response()->json([
            'success' => true,
            'message' => "Étudiant ajouté en " . strtoupper($niveau) . " " . strtoupper($filiere) . " avec succès",
            'etudiant' => $etudiant
        ]);
    }


    private function findEtudiantById($id){
        $models = [
            L1GI::class,
            L1MIAGE::class,
            L2GI::class,
            L2MIAGE::class,
        ];

        foreach ($models as $model) {
            $record = $model::find($id);
            if ($record) {
                return [$model, $record];
            }
        }

        return [null, null];
    }

    public function modifierEtudiant(Request $request, $id){
        try{
            // Retrouver l'étudiant dans la bonne table
            [$model, $etudiant] = $this->findEtudiantById($id);

            if (!$etudiant) {
                return response()->json([
                    'success' => false,
                    'message' => "Aucun étudiant trouvé avec cet ID."
                ], 404);
            }

            // Validation dynamique
            $validator = Validator::make($request->all(), [
                'matricule' => 'sometimes|string|unique:' . (new $model)->getTable() . ',matricule,' . $etudiant->id,
                'nom'       => 'sometimes|string',
                'telephone' => 'nullable|string|unique:' . (new $model)->getTable() . ',telephone,' . $etudiant->id,
                'email'     => 'nullable|email|unique:' . (new $model)->getTable() . ',email,' . $etudiant->id,
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first()
                ], 422);
            }

            // Mise à jour
            $etudiant->update($request->only(['matricule', 'nom', 'telephone', 'email']));

            return response()->json([
                'success' => true,
                'message' => "Étudiant modifié avec succès.",
                'data' => $etudiant
            ],200);
        }
        catch(QueryException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la modification de l’etudiant',
                'erreur' => $e->getMessage()
            ],500);
        }
    }

    public function supprimerEtudiant($id){
        try{
            [$model, $etudiant] = $this->findEtudiantById($id);

            if (!$etudiant) {
                return response()->json([
                    'success' => false,
                    'message' => "Aucun étudiant trouvé avec cet ID."
                ], 404);
            }

            $etudiant->delete();

            return response()->json([
                'success' => true,
                'message' => "Étudiant supprimé avec succès."
            ],200);
        }
        catch(QueryException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de l’etudiant',
                'erreur' => $e->getMessage()
            ],500);
        }
    }

    public function getAllMatchingDetails(){
        $data = [];

        $filieres = [
            "GI" => [
                "L1" => L1GI::class,
                "L2" => L2GI::class,
            ],
            "MIAGE" => [
                "L1" => L1MIAGE::class,
                "L2" => L2MIAGE::class,
            ]
        ];

        foreach ($filieres as $filiere => $models) {

            $parrains = $models['L2']::all();

            foreach ($parrains as $parrain) {

                // Tous les parrainages du parrain
                $parrainages = Parrainage::where('parrain_id', $parrain->id)
                    ->where('filiere', $filiere)
                    ->get();

                // Récupérer les filleuls
                $filleuls = $models['L1']::whereIn(
                    'id',
                    $parrainages->pluck('filleul_id')
                )->get();

                $data[] = [
                    "filiere" => $filiere,

                    "parrain" => [
                        "id"        => $parrain->id,
                        "matricule" => $parrain->matricule,
                        "nom"       => $parrain->nom,
                        "telephone" => $parrain->telephone,
                        "email"     => $parrain->email,
                    ],

                    "nb_filleuls" => $filleuls->count(),

                    "filleuls" => $filleuls->map(fn($f) => [
                        "id"        => $f->id,
                        "matricule" => $f->matricule,
                        "nom"       => $f->nom,
                        "telephone" => $f->telephone,
                        "email"     => $f->email,
                    ]),
                ];
            }
        }

        return response()->json([
            "success" => true,
            "total_parrains" => count($data),
            "data" => $data
        ]);
    }




    

}
