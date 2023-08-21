<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;

    /**
     * @group Authentication
     *
     * Login user
     *
     * @bodyParam phone integer required The user's phone number.
     * @bodyParam password string required The user's password.
     *
     * @response {
     * "result": [
     *  "id": 1,
     *  "phone": "793631747611",
     *  "role": 2,
     *  "token": "eyJ0eXA..."
     * ]
     * }
     * 
     * @response 400 {
     * "result": "Credential don't match or password error"
     * }
     *
     * @param LoginRequest $request
     * @return JsonResponse
     *
     */
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $phone = $data['phone'];
            $password = $data['password'];

            if (!Auth::attempt(['phone' => $phone, 'password' => $password]))
                return $this->error('Credential don\'t match or password error');

            // get user information
            $user = User::where('phone', $phone)->first();

            return $this->success([
                'id' => $user->id,
                'phone' => $user->phone,
                'role' => $user->role,
                'token' => $user->createToken('auth_token')->plainTextToken,
            ]);
        } catch (\Exception $e) {
            return $this->log($e);
        }
    }

    /**
     * @group Authentication
     * 
     * Register user
     * 
     * @bodyParam phone integer required The user's phone number.
     * @bodyParam password string required The user's password.
     * 
     * @response {
     * "result": [
     * "id": 1,
     * "phone": "793631747611",
     * "role": 2,
     * "token": "eyJ0eXA..."
     * ]
     * }
     * 
     * 
     * @response 400 {
     * "result": "phone number already exists"
     * }
     * 
     * @param RegisterRequest $request
     * @return JsonResponse
     */

    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $phone = $data['phone'];
            $password = $data['password'];

            DB::beginTransaction();

            $user = new User();
            $user->phone = $phone;
            $user->password = Hash::make($password);
            $user->role = 2;
            $user->save();

            DB::commit();

            return $this->success([
                'id' => $user->id,
                'phone' => $user->phone,
                'role' => $user->role,
                'token' => $user->createToken('auth_token')->plainTextToken,
            ]);
        } catch (\Exception $e) {
            return $this->log($e);
        }
    }


    /**
     * @group Authentication
     * 
     * Logout user
     * 
     * @authenticated 
     *
     * @response {
     *  "result": "Successfully logged out"
     * }
     *
     * @return JsonResponse
     *
     */
    public function logout(): JsonResponse
    {
        Auth::user()->currentAccessToken()->delete();
        return $this->success('Successfully logged out');
    }
}