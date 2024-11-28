<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Authdashboard;
use Illuminate\Support\Facades\Auth as LaravelAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthDashboardController extends Controller
{
    public function ViewDashboardLogin()
    {
        return view('dashboard.login');
    }

    public function LoginDashboard(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        $user = Authdashboard::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            LaravelAuth::guard('dashboard')->login($user);
            return redirect()->route('dashboard.app')
            ->with('message', 'Selamat datang admin');
        }
        return redirect()->route('dashboard.login')->with('error', 'Email atau password salah');
    }


    public function LogoutAdminDashboard(Request $request) {
        LaravelAuth::guard('dashboard')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('dashboard.login')->with('success', 'Logout berhasil');
    }

    public function ViewDashboardRegister()
    {
        return view('dashboard.register');
    }

    public function loginDashboardStore(Request $request)
    {
        Log::info('User trying to login', $request->only('email'));

        $credentials = $request->only('email', 'password');

        if (LaravelAuth::guard('dashboard')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')
            ->with('message', 'Login Sukses bro, selamat datang admin');
        }
        return redirect()->route('dashboard.statistik')->with('error', 'Email atau password salah');
    }

    public function RegisterStoreData(Request $request)
    {
        $validateRegister = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:authdashboards,email',
            'password' => 'required|string|min:6'
        ]);
        $validateRegister['password'] = Hash::make($validateRegister['password']);
        Authdashboard::create($validateRegister);
        return redirect()->route('dashboard.login')->with('message', 'Registrasi berhasil ya Bro');
    }
}
