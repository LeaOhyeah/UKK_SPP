@extends('dashboard.layouts.main2')
@section('content')
    <style>
        .dataTables_length {
            display: none !important;
        }
    </style>
    <div class="card mt-5 shadow-lg">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between">
                <h2 class="">Rincian dan Riwayat Pembayaran {{ auth()->user()->name }}</h2>
            </div>
        </div>
        <div class="card-body p-3">
            <table id="tes" class="table table-striped" style="width:100%">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Spp</th>
                        <th>Terbayar</th>
                        <th>Tanggal</th>
                        <th>Oleh Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayaran as $spp)
                        <tr>
                            <td>SPP Kelas {{$spp->spp->nama}}</td>
                            <td>Rp{{$spp->spp->nominal}}</td>
                            <td>{{ $spp->created_at }}</td>
                            <td>`{{ $spp->petugas->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
