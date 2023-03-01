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
                <h2 class="">SPP</h2>
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'master')
                    <a class="btn btn-outline-primary text-white" href="/master/spp/create"><b>Tambah</b></a>
                @else
                @endif
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
                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'master')
                            <th>#</th>
                        @else
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spps as $spp)
                        <tr>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/spp/{{ $spp->id }}">{{ $loop->iteration }}</a></td>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/spp/{{ $spp->id }}">{{ $spp->month }}</a></td>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/spp/{{ $spp->id }}">{{ $spp->kelas->name }}</a></td>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/spp/{{ $spp->id }}">{{ $spp->nominal }}</a></td>
                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'master')
                                <td>
                                    <form action="/master/spp/{{ $spp->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-outline-primary"
                                            onclick="return confirm('Yakin ingin menghapus data?')"><b>
                                                Hapus</b></button>
                                    </form>
                                </td>
                            @else
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- end table --}}
@endsection
