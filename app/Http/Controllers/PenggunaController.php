<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserNotification;

class PenggunaController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.pengguna.pengguna', compact('users'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::with('roles')
            ->where('name', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->orWhere('phone', 'like', "%{$query}%")
            ->get();

        return response()->json($users);
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.pengguna.tambahpengguna', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'role_id' => 'required|exists:roles,id', // Memastikan role_id valid
        ]);

        // Pastikan role_id tidak null sebelum lanjut
        if (!$request->has('role_id')) {
            return redirect()->back()->withErrors(['role_id' => 'Peran harus dipilih.']);
        }

        $defaultPassword = 'password123'; // Password default
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($defaultPassword),
        ]);

        // Ambil role berdasarkan ID
        $role = Role::find($request->role_id);
        $user->assignRole($role);

        // Kirim email ke pengguna baru
        Mail::to($user->email)->send(new NewUserNotification($user->email, $defaultPassword));

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id);
        return view('admin.pengguna.detailpengguna', compact('user'));
    }

    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        $roles = Role::all(); // Ambil semua peran dari database
        return view('admin.pengguna.editpengguna', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nip' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|in:Laki-Laki,Perempuan',
            'birthplace' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
        ]);

        // Update role di tabel model_has_roles
        $user->roles()->sync([$request->role_id]);


        return redirect()->route('pengguna.show', ['id' => $user->id])->with('success', 'Data pengguna berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus');
    }
}
