<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Handle user login and return Sanctum Token.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Kredensial yang diberikan tidak cocok dengan catatan kami.'],
            ]);
        }

        // Hapus token lama jika ingin membatasi 1 device (opsional)
        // $user->tokens()->delete();

        // Generate Token baru
        $token = $user->createToken('satujarak_auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'user' => [
                'nama_lengkap' => $user->nama_lengkap,
                'email' => $user->email,
                'role' => $user->role,
            ],
            'token' => $token
        ]);
    }

    /**
     * Handle user logout (Revoke Token).
     */
    public function logout(Request $request)
    {
        // Hapus token yang sedang digunakan untuk request ini
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout berhasil'
        ]);
    }
}
