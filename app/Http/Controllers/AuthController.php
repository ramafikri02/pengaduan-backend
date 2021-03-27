<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'level' => 'required|string',
        ]);

        try {

            $user = new User;
            $user->nama = $request->input('nama');
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);
            $user->level = $request->input('level');

            $user->save();

            return response()->json([
                'user' => $user,
                'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'User Registration Failed!'], 409);
        }

    }

    public function user()
    { 
        return new UserResource(auth()->user());
    }

    protected function createNewToken($token){
        return response()->json([
            'code' => 200,
            'expires_in' => Auth::factory()->getTTL() * 60,
            'user' => auth()->user(),
            'access_token' => $token,
            'token_type' => 'bearer',
            'message' => 'Success LOGIN pengaduan',
        ]);
    }
}
