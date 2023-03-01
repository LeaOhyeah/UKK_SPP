<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Spp;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        $data = [
            // 'spps' => Spp::orderBy('month')->get(),
            'spps' => Spp::whereHas('kelas', function($query){
                $query->whereNull('deleted_at');
            })->orderBy('nama')->orderBy('month')->get(),
            'title' => 'Data SPP',  
        ];
        return view('dashboard.spp.index', $data);
    }


    public function create()
    {
        $data = [
            'kelass' => Kelas::all(),
            'title' => 'Tambah SPP',
        ];
        return view('dashboard.spp.from', $data);
    }


    public function store(Request $request)
    {
        $nk = Kelas::where('id', $request['kelas_id'])->first();

        $request['nama'] = $nk['name'] . ' ' . $request['month'];

        $validatedData = $request->validate([
            'nama' => 'required|unique:spps,nama',
            'month' => 'required',
            'nominal' => 'required|between:5,6',
            'kelas_id' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi!',
            'nama.unique' => 'SPP ini sudah ada!',
            'month.required' => 'Bulan harus diisi!',
            'nominal.required' => 'Nominal harus diisi!',
            'nominal.between' => 'Masukkan nominal puluhan atau ratusan ribu!',
            'kelas_id.required' => 'Kelas harus diisi!',
        ]);

        $month = $request['month'];
        $date = Carbon::createFromFormat('Y-m', $month)->endOfMonth();

        $validatedData['month'] = $date;

        $validatedData['petugas_id'] = auth()->user()->id;
        $validatedData['deleted_by'] = auth()->user()->id;
        $validatedData['id'] = Str::uuid();

        if (Spp::create($validatedData)) {
            return redirect('/master/spp')->with('success', "Data SPP berhasil ditambahkan!");
        } else {
            return redirect('/master/spp')->with('success', 'Terjadi kesalahan!');
        }
    }


    public function show($id)
    {
        $spp = Spp::find($id);
        $kelass = Kelas::all();
        // $month = Carbon::parse($spp->month)->format('Y-m');
        $title = 'Detail SPP';

        return view('dashboard.spp.show', compact('spp', 'kelass', 'title'));
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {

        $nk = Kelas::where('id', $request['kelas_id'])->first();
        $request['nama'] = $nk['name'] . ' ' . $request['month'];

        if ($request['month'] <> null) {
            $validatedData = $request->validate([
                'nama' => ['required', 'unique:spps,nama,' . $id],
                'nominal' => 'required',
                'month' => 'required',
            ], [
                'nama.unique' => 'SPP ini sudah dibuat!',
                'nominal.required' => 'Nominal harus diisi!',
                'month.required' => 'Bulan harus diisi!',
            ]);

            $month = $request['month'];
            $date = Carbon::createFromFormat('Y-m', $month)->endOfMonth();
            $validatedData['month'] = $date;

            $validatedData['petugas_id'] = auth()->user()->id;

            if (Spp::where('id', $id)->update($validatedData)) {
                return back()->with('success', "Data SPP berhasil diperbarui!");
            } else {
                return back()->with('success', 'Terjadi kesalahan!');
            }
        } else {
            $validatedData = $request->validate([
                'nominal' => 'required',
            ], [
                'nominal.required' => 'Nominal harus diisi!',
            ]);

            $validatedData['petugas_id'] = auth()->user()->id;

            if (Spp::where('id', $id)->update($validatedData)) {
                return back()->with('success', "Data SPP berhasil diperbarui!");
            } else {
                return back()->with('success', 'Terjadi kesalahan!');
            }
        }
    }


    public function destroy($id)
    {
        $spp = Spp::find($id);
        $update = [
            'deleted_by' => auth()->user()->id,
        ];

        Spp::where('id', $id)->update($update);

        if (Spp::destroy($id)) {
            return back()->with('success', 'SPP berhasil dihapus');
        } else {
            return back()->with('success', 'Terjadi kesalahan');
        }
    }
}
