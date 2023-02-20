<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    public function register(Request $request) {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:user,email',
            'password' => 'required|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $token = $user->createToken('apitoken')->plainTextToken;

        return response()->json([
            'message' => 'user created',
            'token' => $token
        ]);
    }

    public function login(Request $request) {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:user,email',
            'password' => 'required|confirmed',
        ]);

        $credential = request(['email', 'password']);

        if(!Auth::attempt($credential)) {
            return response()->json([
                'message' => 'not a user'
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'invalid user'
            ]);
        }

        $token = User::where('email', $request->email)->first()->createToken('apitoken')->plainTextToken;

        return response()->json([
            'message' => 'user login',
            'token' => $token,
        ]);
    }

    public function logout() {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'user logout',
        ]);
    }
}
