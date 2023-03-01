<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Kelas;


class KelasController extends Controller
{

    public function index()
    {
        $data = [
            'lea' => Kelas::orderBy('name')->get(),
            'title' => 'Data Kelas',
        ];
        return view('dashboard.kelas.index', $data);
    }


    public function create()
    {
        $data = [
            'title' => 'Tambah Kelas',
        ];
        return view('dashboard.kelas.from', $data);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:kelas|in:X,XI,XII,XIII',
            'cakupan' => 'required',
        ], [
            'name.required' => 'Nama Kelas harus di isi!',
            'name.unique' => 'Kelas ini sudah tersedia!',
            'name.in' => 'Kelas dalam X sampai XIII',
            'cakupan' => 'Cakupan harus di isi!',
        ]);

        $validatedData['petugas_id'] = auth()->user()->id;
        $validatedData['deleted_by'] = auth()->user()->id;
        $validatedData['id'] = Str::uuid();

        if (Kelas::create($validatedData)) {
            return redirect('/master/kelas')->with('success', "Data kelas berhasil ditambahkan");
        } else {
            return redirect('/master/kelas')->with('success', 'Terjadi kesalahan');
        }
    }


    public function show($id)
    {
        $kelas = Kelas::find($id);
        $data = [
            'kelas' => $kelas,
            'title' => 'Detail Kelas' .  $kelas->name,
        ];
        return view('dashboard.kelas.show', $data);
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:kelas,name,' . $id],
            'cakupan' => 'required',
        ], [
            'name.required' => 'Nama Kelas harus di isi!',
            'name.unique' => 'Kelas ' . $request->name .  ' sudah tersedia!',
            'cakupan.required' => 'Kompetensi Keahlian harus di isi!',
        ]);

        $validatedData['petugas_id'] = auth()->user()->id;
        $validatedData['deleted_by'] = auth()->user()->id;

        if (Kelas::where('id', $id)->update($validatedData)) {
            return back()->with('success', "Data kelas berhasil di edit");
        } else {
            return back()->with('success', "Terjadi kesalahan");
        }
    }


    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $name = $kelas->name;
        $update = [
            'deleted_by' => auth()->user()->id,
        ];

        Kelas::where('id', $id)->update($update);

        if (Kelas::destroy($id)) {
            return back()->with('success', 'Kelas ' . $name . ' berhasil dihapus');
        } else {
            return back()->with('success', 'Terjadi kesalahan');
        }
    }
}
