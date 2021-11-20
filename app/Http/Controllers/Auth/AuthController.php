<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman otentikasi
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return view('argon.login');
    }

    /**
     * Melakukan otentikasi
     *
     * @param Illuminate\Http\Request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'required' => ':attribute harus di isi'
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'login' => 'Username atau password yang anda masukkan salah',
        ])->withInput();
    }

    /**
     * Melakukan logout
     *
     * @param Illuminate\Http\Request
     * @return Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
