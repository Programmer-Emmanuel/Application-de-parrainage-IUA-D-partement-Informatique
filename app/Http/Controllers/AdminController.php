<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ],422);
        }

        try{
            $admin = Admin::where('email', $request->email)->first();
            if(!$admin){
                return response()->json([
                    'success' => false,
                    'message' => 'Administrateur non trouvé'
                ],404);
            }

            if($admin && Hash::check($request->password, $admin->password)){
                $token = $admin->createToken('AdminToken')->plainTextToken;
                return response()->json([
                    'success' => true,
                    'data' => [
                        'id' => $admin->id,
                        'nom' => $admin->nom,
                        'email' => $admin->email,
                        'telephone' => $admin->telephone,
                        'role' => $admin->role,
                        'token' => $token
                    ],
                    'message' => 'Administrateur connecté.'
                ],200);
            }
        }
        catch(QueryException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la connexion l’admin',
                'erreur' => $e->getMessage()
            ],500);
        }
    }

    public function ajout_admin(Request $request){
        $validator = validator::make($request->all(), [
            'nom' => 'required',
            'email' => 'required|email|unique:admins',
            'telephone' => 'required|unique:admins|digits:10',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ],422);
        }

        try{
            $user = $request->user();
            if($user->role != 1){
                return response()->json([
                    'success' => false,
                    'message' => 'Accès non autorisé'
                ],403);
            }

            if(!$user){
                return response()->json([
                    'success' => false,
                    'message' => 'Admin non trouvé'
                ],404);
            }

            $admin = new Admin();
            $admin->nom = $request->nom;
            $admin->email = $request->email;
            $admin->telephone = $request->telephone;
            $admin->role = 2;
            $admin->password = Hash::make($request->password);
            $admin->save();

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $admin->id,
                    'nom' => $admin->nom,
                    'email' => $admin->email,
                    'telephone' => $admin->telephone,
                    'role' => $admin->role,
                ],
                'message' => 'Ajout du sous admin réussi'
            ],200);
        }
        catch(QueryException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l’ajout de sous admin',
                'erreur' => $e->getMessage()
            ],500);
        }
    }

    public function liste_admin(Request $request){
        try{
            $user = $request->user();
            if($user->role != 1){
                return response()->json([
                    'success' => false,
                    'message' => 'Accès non autorisé'
                ],403);
            }

            $admins = Admin::where('role', 2)
                ->orderBy('created_at', 'desc')
                ->get();

            if($admins->isEmpty()){
                return response()->json([
                    'success' => true,
                    'data' => [],
                    'message' => 'Aucun admin enregistré'
                ],200);
            }

            $data = $admins->map(function($admin){
                return [
                    'id' => $admin->id,
                    'nom' => $admin->nom,
                    'email' => $admin->email,
                    'telephone' => $admin->telephone,
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => 'Liste des sous admin affichés avec succès'
            ],200);
        }
        catch(QueryException $e){
            return response()->json([
                'success' => false,
                'message' => 'erreur lors de l’affichage de la liste de admins',
                'erreur' => $e->getMessage()
            ],500);
        }
    }

    public function admin(Request $request, $id){
        try{

            $user = $request->user();
            if($user->role != 1){
                return response()->json([
                    'success' => false,
                    'message' => 'Accès non autorisé'
                ],403);
            }

            $admin = Admin::find($id);

            if(!$admin){
                return response()->json([
                    'success' => false,
                    'message' => 'Administrateur non trouvé'
                ],404);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $admin->id,
                    'nom' => $admin->nom,
                    'email' => $admin->email,
                    'telephone' => $admin->telephone,
                    'role' => $admin->role,
                ],
                'message' => 'Administrateur trouvé'
            ],200);
        }
        catch(QueryException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l’affichage de l’admin',
                'erreur' => $e->getMessage()
            ],500);
        }
    }

    public function delete_admin(Request $request, $id){
        try{

            $user = $request->user();
            if($user->role != 1){
                return response()->json([
                    'success' => false,
                    'message' => 'Accès non autorisé'
                ],403);
            }
            
            $admin = Admin::find($id);

            if(!$admin){
                return response()->json([
                    'success' => false,
                    'message' => 'Administrateur non trouvé'
                ],404);
            }

            $admin->delete();

            return response()->json([
                'success' => true,
                'message' => 'Administrateur supprimé'
            ],200);
        }
        catch(QueryException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de l’admin',
                'erreur' => $e->getMessage()
            ],500);
        }
    }

    public function info_admin(Request $request){
        $user = $request->user();
        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'Administrateur non trouvé'
            ],404);
        }

        try{
            $admin = Admin::find($user->id);

            if(!$admin){
                return response()->json([
                    'success' => false,
                    'message' => 'Administrateur non trouvé'
                ],404);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $admin->id,
                    'nom' => $admin->nom,
                    'email' => $admin->email,
                    'telephone' => $admin->telephone,
                    'role' => $admin->role,
                ],
                'message' => 'Info de l’admin affiché avec succes'
            ],200);
        }
        catch(QueryException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l’affichage des infos de l’admin',
                'erreur' => $e->getMessage()
            ],500);
        }
    }

    public function update_info(Request $request){

        $validator = validator::make($request->all(), [
            'nom' => 'nullable',
            'email' => 'nullable|email',
            'telephone' => 'nullable|digits:10',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ],422);
        }

        $user = $request->user();
        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'Administrateur non trouvé'
            ],404);
        }

        try{
            $admin = Admin::find($user->id);
            if(!$admin){
                return response()->json([
                    'success' => false,
                    'message' => 'Administrateur non trouvé'
                ],404);
            }

            $admin->nom = $request->nom ?? $admin->nom;
            $admin->email = $request->email ?? $admin->email;
            $admin->telephone = $request->telephone ?? $admin->telephone;
            $admin->save();

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $admin->id,
                    'nom' => $admin->nom,
                    'email' => $admin->email,
                    'telephone' => $admin->telephone,
                    'role' => $admin->role,
                ],
                'message'=> 'Modification reussie'
            ],200);
        }
        catch(QueryException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la modification des infos de l’admin',
                'erreur' => $e->getMessage() 
            ],500);
        }
    }

    public function change_password(Request $request){
        try {
            $auth = $request->user();

            if (!$auth) {
                return response()->json([
                    'success' => false,
                    'message' => 'Admin introuvable .'
                ], 404);
            }

            $isAdmin = isset($auth->password);

            $validator = Validator::make($request->all(), [
                'ancien_password' => 'required|string|min:4',
                'nouveau' => 'required|string|min:4',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "success" => false,
                    "message" => $validator->errors()->first()
                ], 422);
            }

            $old = $request->ancien_password;
            $new = $request->nouveau;

            // ✅ Vérifier ancien mot de passe
            $passwordField = $isAdmin ? 'password' : 'password';
            if (!Hash::check($old, $auth->$passwordField)) {
                return response()->json([
                    'success' => false,
                    'message' => "L'ancien mot de passe est incorrect."
                ], 500);
            }

            // ✅ Mise à jour
            $auth->$passwordField = Hash::make($new);
            $auth->save();

            return response()->json([
                'success' => true,
                'message' => 'Mot de passe mis à jour avec succès.'
            ], 200);

        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour du mot de passe.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
