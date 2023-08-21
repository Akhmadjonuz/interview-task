<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;

    /**
     * @group Authentication
     *
     * Log in the user.
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
        } catch (\Exception $exception) {
            return $this->log($exception);
        }
    }


    /**
     * @group Authentication
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