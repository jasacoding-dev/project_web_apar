<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OTPMail;
use App\Models\OTPCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class OTPVerificationController extends Controller
{
    public function show()
    {
        // Debug session
        Log::info('Session data at show:', [
            'all_session' => Session::all(),
            'otp_email' => Session::get('otp_email')
        ]);

        if (!Session::has('otp_email')) {
            Log::warning('No email in session, redirecting to password request');
            return redirect()->route('password.request')
                ->with('error', 'Sesi telah berakhir, silahkan masukkan email lagi');
        }

        return view('auth.verify-otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'array', 'size:5'],
        ]);

        // Gabungkan OTP
        $otpInput = implode('', $request->otp);
        
        $email = Session::get('otp_email');
        
        if (!$email) {
            Log::error('No email in session during verification');
            return redirect()->route('password.request')
                ->with('error', 'Sesi telah berakhir, silahkan ulangi proses');
        }

        // Debug sebelum query
        Log::info('Before OTP query', [
            'email' => $email,
            'otp_input' => $otpInput,
            'current_time' => Carbon::now()
        ]);

        $otpCode = OTPCode::where('email', $email)
            ->where('code', $otpInput)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        // Debug hasil query
        Log::info('OTP query result', [
            'found' => $otpCode ? true : false,
            'db_otp' => $otpCode ? $otpCode->code : null,
            'expires_at' => $otpCode ? $otpCode->expires_at : null
        ]);

        if (!$otpCode) {
            Log::warning('Invalid OTP attempt', [
                'email' => $email,
                'otp_attempt' => $otpInput
            ]);
            return back()->withErrors(['otp' => 'Kode OTP tidak valid atau telah kadaluarsa']);
        }

        // Hapus OTP yang sudah digunakan
        $otpCode->delete();

        $token = Password::createToken(
            User::where('email', $email)->first()
        );

        // Simpan verifikasi di session
        Session::put('verified_email', $email);
        Session::save();

        return redirect()->route('password.reset', ['token' => $token]);
    }

    public function resend()
    {
        $email = Session::get('otp_email');
        
        if (!$email) {
            return redirect()->route('password.request')
                ->with('error', 'Silahkan masukkan email terlebih dahulu');
        }

        // Generate OTP baru
        $otpCode = Str::random(5, '0123456789');
        $expiresAt = Carbon::now()->addMinutes(5);

        // Simpan OTP ke database
        OTPCode::updateOrCreate(
            ['email' => $email],
            [
                'code' => $otpCode,
                'expires_at' => $expiresAt,
                'created_at' => Carbon::now()
            ]
        );

        // Kirim email OTP
        Mail::to($email)->send(new OTPMail($otpCode));

        return back()->with('success', 'Kode OTP baru telah dikirim');
    }
}