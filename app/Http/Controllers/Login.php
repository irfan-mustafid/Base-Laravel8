<?php

namespace App\Http\Controllers;

use App\Models\mAllJaminan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Psy\debug;

class Login extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        // echo Hash::make("12345678");

        if (Auth::attempt($credentials)) {
            // dd($request->all(), $credentials, Auth::user(), User::find('2'));
            $request->session()->regenerate();
            return response()->json(['status' => true, 'redirect' => '/dashboard']);
        } else {
            return response()->json(['status' => false, 'pesan' => 'Incorrect email or password', 'redirect' => '/login']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
