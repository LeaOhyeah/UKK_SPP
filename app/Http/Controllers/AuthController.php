<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use App\Models\Spp;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function index()
    {
        return view('login.index');
    }

    function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::guard('web')->attempt($credentials, $remember)) {
            return redirect()->intended('/siswa');
        }
        if (Auth::guard('petugas')->attempt($credentials, $remember)) {
            return redirect()->intended('/master/kelas');
        }

        return back()->with('error', 'Email atau Password salah!');

    }

    function logout(Request $request)
    {
        Auth::guard('web')->logout();
        Auth::guard('petugas')->logout();
        return redirect('/');
    }

    function indexUser()
    {
        $user = Auth::user();
        $data = [
            'spps' => Spp::where('kelas_id', $user['kelas_id'])->orderBy('updated_at')->get(),
            'siswa' => $user,
            'title' => 'Rekapan',
        ];
        return view('dashboard.siswa.index', $data);
    }
    function rincian()
    {
        $user = Auth::user();
        $data = [
            'pembayaran' => Pembayaran::where('user_id', auth()->user()->id)->orderBy('created_at')->get(),
            'siswa' => $user,
            'title' => 'Riwayat dan Rincian',
        ];
        return view('dashboard.siswa.rincian', $data);
    }
}
