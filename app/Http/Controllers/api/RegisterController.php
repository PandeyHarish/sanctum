<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',

            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error.',
                'data' => $validator->errors()
            ], 400);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['status'] = 'active';
        $user = User::create($input);

        $success = [
            'token' => $user->createToken('accessToken')->plainTextToken,
            'name' => $user->name
        ];

        return response()->json([
            'success' => true,
            'data' => $success,
            'message' => 'User registered successfully.'
        ], 201);
    }

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $success = [
                'token' => $user->createToken('accessToken')->plainTextToken,
                'name' => $user->name
            ];

            return response()->json([
                'success' => true,
                'data' => $success,
                'message' => 'User logged in successfully.'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Unauthorized',
            'data' => ['error' => 'Invalid credentials']
        ], 401);
    }

    public function logout(Request $request): JsonResponse
    {
        $user = $request->user();

        if ($user) {
            $user->currentAccessToken()->delete();

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully.'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'User is not authenticated.'
        ], 401);
    }
}
