@extends('dashboard.layouts.main')
@section('content')
    <div class="card mt-5 shadow-lg">

        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-center py-3">
                <h2 class="">Detail SPP {{ $spp->month }}</h2>
            </div>
        </div>

        <form action="/master/spp/{{ $spp->id }}" method="post" class="my-4 row px-5 d-flex ">
            @csrf
            @method('put')
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card-body p-3">

                <div class="row">

                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'master')
                        {{-- nominal --}}
                        <div class="col-md-6 px-3 mb-2 mt-3">
                            <div class="d-flex flex-column">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="labels mb-2">
                                            <div class="d-print-none d-inline">Edit</div> Nominal (Rp)
                                        </label>
                                        <input type="number" class="form-control @error('nominal') is-invalid @enderror"
                                            placeholder="Nominal" name="nominal" value="{{ old('nominal', $spp->nominal) }}"
                                            autofocus>
                                        @error('nominal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- bulan --}}
                        <div class="d-print-none col-md-6 px-3 mb-2 mt-3">
                            <div class="d-flex flex-column">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="labels mb-2">Edit Bulan</label>
                                        <input type="month" name="month"
                                            class="form-control @error('nama') is-invalid @enderror" placeholder="Bulan"
                                            value="{{ $spp->month }}" autofocus>
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        {{-- nominal --}}
                        <div class="col-md-6 px-3 mb-2 mt-3">
                            <div class="d-flex flex-column">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="labels mb-2">
                                            Nominal (Rp)
                                        </label>
                                        <input type="number" class="form-control" placeholder="Nominal" name="nominal"
                                            value="{{ old('nominal', $spp->nominal) }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Bulan --}}
                        <div class="col-md-6 px-3 mb-2 mt-3">
                            <div class="d-flex flex-column">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="labels mb-2">Bulan</label>
                                        <input type="text" class="form-control" value="{{ $spp->month }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- kelas --}}
                    <div class="col-md-6 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select class="form-select" name="kelas_id" disabled>
                                    @foreach ($kelass as $kelas)
                                        @if (old('kelas_id', $spp->kelas_id) == $kelas->id)
                                            <option value="{{ $kelas->id }}" selected>{{ $kelas->name }}</option>
                                        @else
                                            <option value="{{ $kelas->id }}">{{ $kelas->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- edited by --}}
                    <div class="col-md-6 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Diedit Oleh</label>
                                    <input type="text" class="form-control"
                                        value="{{ old('petugas_id', $spp->petugas->name) }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- created at --}}
                    <div class="col-md-6 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Dibuat Pada</label>
                                    <input type="text" class="form-control" value="{{ $spp->created_at }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- updated at --}}
                    <div class="col-md-6 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Diedit Pada</label>
                                    <input type="text" class="form-control" value="{{ $spp->updated_at }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="kelas_id" value="{{ $spp->kelas_id }}">


                    <i class="mt-5 ms-1 d-none d-print-block">
                        Dicetak oleh {{ auth()->user()->name }}
                    </i>

                    {{-- button --}}
                    <div class="d-flex p-2 justify-content-between mx-3 mt-5 d-print-none">
                        <div class="">
                            <a href="/master/spp" class="btn btn-primary"><b>Kembali</b></a>
                        </div>
                        <div class="">
                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'master')
                            <a id="btn-print" class="btn btn-primary"><b>Cetak</b></a>
                            <button type="submit" onclick="return confirm('Pastikan Data yang Anda Masukkan Benar!')"
                            class="btn btn-primary mx-2 me-4"><b>Edit</b></button>
                            @else
                            <a id="btn-print" class="btn btn-primary me-4"><b>Cetak</b></a>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </form>

    </div>
@endsection
