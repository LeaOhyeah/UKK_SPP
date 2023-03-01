<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Petugas;
use App\Models\User;
use App\Models\Spp;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    function trashKelas()
    {
        $data = [
            'kelass' => Kelas::onlyTrashed()->get(),
            'title' => 'Archive Kelas',
        ];
        return view('dashboard.arsip.kelas', $data);
    }

    function trashUser()
    {
        $data = [
            'users' => User::onlyTrashed()->get(),
            'title' => 'Archive Siswa',
        ];
        return view('dashboard.arsip.user', $data);
    }

    function trashSPP()
    {
        $data = [
            'spps' => Spp::onlyTrashed()->get(),
            'title' => 'Archive SPP',
        ];
        return view('dashboard.arsip.spp', $data);
    }

    function trashPetugas()
    {
        $data = [
            'petugas' => Petugas::onlyTrashed()->get(),
            'title' => 'Archive Petugas',
        ];
        return view('dashboard.arsip.petugas', $data);
    }
}
