<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Models\User;
use App\Traits\V1\ApiResponses;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;

    public function login( LoginUserRequest $request ) {
        $request->validated(  $request->all() );
        $credentials = $request->only('email', 'password');

        if ( ! Auth::attempt($credentials)) {
            return $this->error( 'Invalid credentials', 401 );
        }

        $user  = User::firstWhere('email', $request->email);
        $token = $user?->createToken('authToken')->plainTextToken;
        return $this->ok(
            'Authenticated',
            [
                // 'user' => $user,
                'token' => $token,
            ],
        );
    }
}
