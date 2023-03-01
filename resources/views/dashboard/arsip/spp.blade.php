@extends('dashboard.layouts.main')
@section('content')
    <h3>
        {{-- welcome {{auth()->user()->name}} --}}
    </h3>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- table --}}
    <div class="card mt-5 shadow-lg">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between">
                <h2 class="">Arsip SPP</h2>
            </div>
        </div>
        <div class="card-body p-3">
            <table id="tes" class="table table-striped" style="width:100%">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Kelas</th>
                        <th>Nominal</th>
                        <th>Dibuat Oleh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spps as $spp)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $spp->month }}</td>
                            <td>{{ $spp->kelas->name }}</td>
                            <td>{{ $spp->nominal }}</td>
                            <td>{{ $spp->petugas->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- end table --}}
@endsection
