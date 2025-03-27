<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OTPMail;
use App\Models\OTPCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PasswordResetLinkController extends Controller
{
    public function create()
    {
        return view('auth.forgot-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ]);

        // Pastikan user ada
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan']);
        }

        // Generate OTP (5 digit)
        $otpCode = Str::random(5, '0123456789');
        $expiresAt = Carbon::now()->addMinutes(5);

        // Simpan OTP ke database
        OTPCode::updateOrCreate(
            ['email' => $request->email],
            [
                'code' => $otpCode,
                'expires_at' => $expiresAt,
                'created_at' => Carbon::now()
            ]
        );

        // Kirim email OTP
        Mail::to($request->email)->send(new OTPMail($otpCode));

        // Simpan email ke session (gunakan put dan save)
        Session::put('otp_email', $request->email);
        Session::save(); // Pastikan session disimpan

        // Debugging
        Log::info('Email stored in session', [
            'email' => $request->email,
            'session_email' => Session::get('otp_email'),
            'otp_code' => $otpCode
        ]);

        return redirect()->route('password.otp')->with([
            'email' => $request->email,
            'status' => 'Kode OTP telah dikirim ke email Anda'
        ]);
    }
}