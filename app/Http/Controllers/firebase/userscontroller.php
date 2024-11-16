<?php

namespace App\Http\Controllers\firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class userscontroller extends Controller
{

    public function RegisterPage()
    {
        return view('taskmanagement.register');
    }

    public function RegisterStoreData(Request $request)
    {
        $dataStore = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|min:3|max:255',
            'password' => 'required|min:8|confirmed',
            'instansi' => 'required|min:3|max:255',
        ]);

        User::created([
            'name'=>$dataStore['name'],
            'email'=>$dataStore['email'],
            'password'=>$dataStore['password'],
            'instansi'=>$dataStore['instansi'],
        ]);
        return redirect()->route('taskmanagement.app')->with('success', 'Registrasi berhasil. Tolong login.');
    }

    public function Login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('taskmanagement.app')->with('success', 'login success');
        } else {
            return redirect()->back()->with('error', 'Email atau password salah.');
        }
    }
}
