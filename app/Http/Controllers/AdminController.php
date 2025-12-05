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
                        'role' => 1,
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
}
