<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class PetugasController extends Controller
{

    public function index()
    {
        $data = [
            'petugas' => Petugas::all(),
            'title' => 'Data Petugas',
        ];
        return view('dashboard.petugas.index', $data);
    }


    public function create()
    {
        $data = [
            'title' => 'Tambahkan Petugas',
        ];
        return view('dashboard.petugas.from', $data);
    }


    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|regex:/(^[a-zA-Z0-9-.\s]{1,100}$)/',
            'email' => 'required|email|unique:petugas,email,',
            'password' => 'required|regex:/(^[a-zA-Z0-9-_]{3,16}$)/',
            'role' => 'required',
        ], [
            'name.required' => 'Nama harus diisi!',
            'name.regex' => 'Gunakan nama asli anda!',
            'email.required' => 'Email harus diisi!',
            'email.unique' => 'Email sudah terdaftar!',
            'email.email' => 'Masukkan email yang valid',
            'password.required' => 'Password harus diisi!',
            'password.regex' => 'Hanya memperbolehkan a-z, A-Z, 0-9 dan atau -_ dengan 3-16 karakter !',
            'role.required' => 'Role harus diisi!',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['id'] = Str::uuid();


        if (Petugas::create($validatedData)) {
            return redirect('/master/petugas')->with('success', 'Data berhasil ditambahakan');
        } else {
            return redirect('/master/petugas')->with('success', 'Terjadi kesalahan!');
        }
    }


    public function show($id)
    {
        $data = [
            'petugas' => Petugas::find($id),
            'title' => 'Detail Petugas',
        ];
        return view('dashboard.petugas.show', $data);
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:petugas,email,' . $id],
            'password' => 'required',
            'role' => 'required',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        if (Petugas::where('id', $id)->update($validatedData)) {
            return redirect('/master/petugas')->with('success', 'Data berhasil diperbarui');
        } else {
            return redirect('/master/petugas')->with('success', 'Terjadi kesalahan!');
        }
    }


    public function destroy($id)
    {
        if (Petugas::destroy($id)) {
            return back()->with('success', 'Data berhasil dihapus!');
        }
        return back()->with('success', 'Terjadi kesalahan');
    }
}
