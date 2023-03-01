<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Spp;
use Illuminate\Support\Str;
use App\Models\Petugas;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()->role == 'admin' || auth()->user()->role == 'master') {
            if ($request['nisn'] <> null) {
                if (User::where('nisn', $request['nisn'])->first()) {
                    $user = User::where('nisn', $request['nisn'])->first();
                    $data = [
                        // 'spps' => Spp::where('kelas_id', $user['kelas_id'])->orderBy('month')->get(),
                        'spps' => Spp::whereHas('kelas', function ($query) {
                            $query->whereNull('deleted_at');
                        })->where('kelas_id', $user['kelas_id'])->orderBy('month')->get(),
                        'sppss' => Pembayaran::whereHas('spp', function ($query) {
                            $query->whereHas('kelas', function ($a) {
                                $a->whereNull('deleted_at');
                            });
                        })->get(),
                        'nisn' => $request['nisn'],
                        'siswa' => $user,
                        'name' => $user->name,
                        'title' => 'Pembayaran ' . $user->name,
                    ];
                    return view('dashboard.pembayaran.admin', $data);
                } else {
                    $data  = [
                        'spps' => [],
                        'sppss' => [],
                        'name' => 'Tidak ditemukan!',
                        'title' => 'Pembayaran',
                    ];
                    return view('dashboard.pembayaran.admin', $data);
                }
            } else {
                $data = [
                    'spps' => Pembayaran::whereHas('spp', function ($query) {
                        $query->whereHas('kelas', function ($a) {
                            $a->whereNull('deleted_at');
                        });
                    })->get(),
                    'sppss' => Pembayaran::whereHas('spp', function ($query) {
                        $query->whereHas('kelas', function ($a) {
                            $a->whereNull('deleted_at');
                        });
                    })->get(),
                    'title' => 'Admin Pembayaran',
                    'name' => '',
                ];
                return view('dashboard.pembayaran.admin', $data);
            }
        } else {
            if ($request['nisn'] <> null) {


                if (User::where('nisn', $request['nisn'])->first()) {
                    $user = User::where('nisn', $request['nisn'])->first();
                    $data = [
                        // 'spps' => Spp::where('kelas_id', $user['kelas_id'])->orderBy('month')->get(),
                        'spps' => Spp::whereHas('kelas', function ($query) {
                            $query->whereNull('deleted_at');
                        })->where('kelas_id', $user['kelas_id'])->orderBy('month')->get(),
                        'nisn' => $request['nisn'],
                        'siswa' => $user,
                        'name' => $user->name,
                        'title' => 'Pembayaran ' . $user->name,
                    ];
                    return view('dashboard.pembayaran.index', $data);
                } else {
                    $data  = [
                        'spps' => [],
                        'name' => 'Tidak ditemukan!',
                        'title' => 'Pembayaran',
                    ];
                    return view('dashboard.pembayaran.index', $data);
                }
            } else {
                $data  = [
                    'spps' => [],
                    'name' => '',
                    'title' => 'Pembayaran',
                ];
                return view('dashboard.pembayaran.index', $data);
            }
        }
    }

    public function create(Request $request)
    {
    }

    public function store(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'petugas_id' => $request->petugas_id,
            'spp_id' => $request->spp_id,
            'deleted_by' => $request->deleted_by,
        ];

        $data['id'] = Str::uuid();


        if (Pembayaran::create($data)) {
            return back()->with('success', "Pembayaran berhasil!");
        } else {
            return redirect('/pembayaran/trs')->with('success', "Terjadi kesalahan!");
        }
    }

    public function show($id)
    {
        $data = [
            'pembayaran' => Pembayaran::find($id),
            'spp' => Spp::all(),
            'petugas' => Petugas::all(),
            'title' => 'Admin Pembayaran',
            'siswa' => User::all(),
        ];
        return view('dashboard.pembayaran.form', $data);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'spp_id' => 'required',
            'petugas_id' => 'required',
        ]);
        $condition = Pembayaran::where('user_id', $request['user_id'])->where('spp_id', $request['spp_id'])->first();
        if (!$condition) {
            if (Pembayaran::where('id', $id)->update($validatedData)) {
                return back()->with('success', 'Pembayaran berhasil diperbarui');
            } else {
                return back()->with('success', 'Terjadi kesalahan!');
            }
        } else {
            return back()->with('success', 'Terjadi kesalahan!, Data tersebut sudah ada');
        }
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::find($id);
        $update = [
            'deleted_by' => auth()->user()->id,
        ];

        Pembayaran::where('id', $id)->update($update);

        if (Pembayaran::destroy($id)) {
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('success', 'Terjadi kesalahan');
        }
    }
}
