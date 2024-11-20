<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as LaravelAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginAuth(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (LaravelAuth::guard('web')->attempt($credentials)) {
            return redirect()->route('taskmanagement.app')
                ->with('message', 'Login berhasil Bro, selamat ngerjain tugas');
        }
        // cek auth
        if(!LaravelAuth::check()) {
            return view('taskmanagement.app')->with('notLoginYet', 'login dulu cuy baru bisa nugas');
        }
        return response()->json(['message' => 'Login gagal'], 401);
    }
    public function registerAuth(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'instansi' => 'required|string',
            'email' => 'required|email|unique:auth',
            'password' => 'required|string|min:6',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        Auth::create($validatedData);
        return redirect()->route('taskmanagement.app')->with('message', 'Registrasi berhasil');
    }
    public function logout()
    {
        LaravelAuth::logout();
        return redirect()->route('taskmanagement.app')->with('message', 'You have successfully logged out.');
    }


}
