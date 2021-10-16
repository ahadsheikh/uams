<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $fields = request()->validate([
            'appointment' => 'required',
            'army_number' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = User::create([
            'appointment' => $fields['appointment'],
            'army_number' => $fields['army_number'],
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response, 201);
    }

    public function login(Request $request)
    {
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if(!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'message' => 'Wrong credentials'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function getAllUser()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function getUser($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function getMe(Request $request)
    {
        $user = $request->user();
        return response()->json($user);
    }

    public function updateUser(Request $request, $id)
    {
        $fields = request()->validate([
            'appointment' => 'string',
            'army_number' => 'numeric|unique:users',
            'name' => 'string',
            'email' => 'string|email|unique:users',
        ]);

        $user = User::findOrFail($id);

        if($request->user()->id == $user->id){
            $user->update($fields);
            return response()->json($user, 200);
        }else{
            return response()->json(
                [
                    "error" => "Permission denied"
                ], 403
            );
        }
    }

    public function deleteUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if($request->user()->user_id == $user->id){
            $user->delete();
            return response()->json(null, 204);
        }else{
            return response()->json(
                [
                    "error" => "Permission denied"
                ], 403
            );
        }
    }
}
