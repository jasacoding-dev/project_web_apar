<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nip' => ['required', 'string', 'max:20', 'unique:users,nip'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15', 'unique:users,phone'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:laki-laki,perempuan'],
            'birthplace' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'gender' => $request->gender,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'password' => Hash::make($request->password),
        ]);

        // Beri peran default "client"
        $user->assignRole('client');

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('client.dashboard');
    }
}
