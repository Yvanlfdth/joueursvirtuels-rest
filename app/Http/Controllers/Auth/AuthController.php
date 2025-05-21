<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {
        // Validation
        $validator = Validator::make($request->all(), [
            'login' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $login = $request->input('login');
        $password = $request->input('password');

        // Checks if the login is an email
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'login';
        $credentials = [
            $field => $login,
            'password' => $password
        ];

        // Checks user credentials
        if(!Auth::guard('web')->attempt($credentials)) {
            return response()->json(['message' => "invalid_credentials"], 401);
        }

        // Connection
        $user = Auth::guard('web')->user();

        // Token generation
        $token = $user->createToken('api-token')->plainTextToken;

        // Roles/Permissions
        $roles = $user->getRoleNames();
        $permissions = $user->getAllPermissions()->pluck('name');

        return response()->json([
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                'login' => $user->login,
                'roles' => $roles,
                'permissions' => $permissions
            ]
        ]);
    }

    public function logout(Request $request) {
        // Gets the connected user
        $user = $request->user();

        if($user) {
            // Revokes the token
            $user->currentAccessToken()->delete();

            return response()->json(['message' => "success"]);
        }

        return response()->json(['message' => "unauthenticated_user"], 401);
    }
}
