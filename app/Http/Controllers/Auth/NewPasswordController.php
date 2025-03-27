<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class NewPasswordController extends Controller
{
    public function create(Request $request)
    {
        // Dapatkan email dari session atau request
        $email = Session::get('verified_email') ?? $request->email;
        
        Log::info('Displaying reset password form', [
            'email' => $email,
            'token_present' => !empty($request->token),
            'ip' => $request->ip()
        ]);

        return view('auth.reset-password', [
            'token' => $request->token,
            'email' => $email
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        Log::info('Attempting password reset', [
            'email' => $request->email,
            'token_present' => !empty($request->token),
            'ip' => $request->ip(),
            'time' => now()
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                // Log sebelum perubahan password
                Log::info('Password reset initiated for user', [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'ip' => $request->ip()
                ]);

                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                // Log setelah perubahan password
                Log::info('Password successfully changed for user', [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'ip' => $request->ip(),
                    'time' => now()
                ]);
            }
        );

        // Log hasil proses reset
        Log::info('Password reset process completed', [
            'status' => $status,
            'email' => $request->email,
            'ip' => $request->ip(),
            'time' => now()
        ]);

        // Bersihkan session setelah reset password
        Session::forget('verified_email');

        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}