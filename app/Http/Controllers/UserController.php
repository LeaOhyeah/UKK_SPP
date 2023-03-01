<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index()
    {
        $data = [
            'users' => User::whereHas('kelas', function ($query) {
                $query->whereNull('deleted_at');
            })->orderBy('name')->get(),
            'title' => 'Data Siswa',
        ];
        return view('dashboard.user.index', $data);
    }


    public function create()
    {
        $data = [
            'kelass' => Kelas::all(),
            'title' => 'Tambahkan Siswa',
        ];

        return view('dashboard.user.from', $data);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kelas_id' => 'required',
            'name' => 'required|regex:/(^[a-zA-Z0-9-.\s]{1,100}$)/',
            'email' => 'required|email|unique:users',
            'nisn' => 'required|unique:users|numeric|digits:10',
            'phone' => 'required|unique:users|regex:/(^[0-9+]{8,15}$)/',
            'nama_kelas' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Nama harus diisi!',
            'name.regex' => 'Gunakan nama asli anda',
            'email.required' => 'Email harus diisi!',
            'email.unique' => 'Email sudah terdaftar!',
            'email.email' => 'Masukkan Email yang valid!',
            'nisn.required' => 'NISN harus diisi!',
            'nisn.unique' => 'NISN sudah terdaftar!',
            'nisn.numeric' => 'NISN berupa angka!',
            'nisn.digits' => 'NISN terdiri dari 10 digit!',
            'phone.required' => 'Telepon harus diisi!',
            'phone.unique' => 'Telepon sudah terdaftar!',
            'phone.regex' => 'Telepon berupa angak atau +62 tanpa spasi!',
            'nama_kelas.required' => 'Kelas harus diisi!',
            'address.required' => 'Alamat harus diisi!',
        ]);

        $validatedData['password'] = Hash::make($validatedData['nisn']);
        $validatedData['id'] = Str::uuid();

        if (User::create($validatedData)) {
            return back()->with('success', "Data siswa berhasil ditambahkan!");
        } else {
            return redirect('/master/user')->with('success', 'Terjadi kesalahan!');
        }
    }


    public function show($id)
    {
        $data = [
            'user' => User::find($id),
            'kelass' => Kelas::all(),
            'title' => 'Detail Siswa',
        ];
        return view('dashboard.user.show', $data);
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'nisn' => ['required', 'unique:users,nisn,' . $id],
            'phone' => ['required', 'unique:users,phone,' . $id],
            'address' => 'required',
            'nama_kelas' => 'required',
        ], [
            'name.required' => 'Nama harus diisi!',
            'email.required' => 'Email harus diisi!',
            'email.unique' => 'Email sudah terdaftar!',
            'email.email' => 'Masukkan Email yang valid!',
            'nisn.required' => 'NISN harus diisi!',
            'nisn.unique' => 'NISN sudah terdaftar!',
            'phone.required' => 'Telepon harus diisi!',
            'phone.unique' => 'Telepon sudah terdaftar!',
            'address.required' => 'Alamat harus diisi!',
            'nama_kelas.required' => 'Kelas harus diisi!',
        ]);

        if (User::where('id', $id)->update($validatedData)) {
            return back()->with('success', "Data Siswa berhasil di edit");
        } else {
            return back()->with('success', "Terjadi kesalahan");
        }
    }


    public function destroy($id)
    {
        if (User::destroy($id)) {
            return back()->with('success', 'Siswa berhasil dihapus');
        } else {
            return back()->with('success', 'Terjadi kesalahan');
        }
    }
}
