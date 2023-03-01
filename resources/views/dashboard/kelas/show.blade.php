@extends('dashboard.layouts.main')
@section('content')
    <div class="card mt-5 shadow-lg">

        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-center py-3">
                <h2 class="">Detail Kelas {{ $kelas->name }}</h2>
            </div>
        </div>

        <form action="/master/kelas/{{ $kelas->id }}" method="post" class="my-4 row px-5 d-flex ">
            @method('put')
            @csrf
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card-body p-3">

                <div class="row">

                    {{-- nama kelas --}}
                    <div class="col-md-4 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Nama Kelas</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $kelas->name }}" name="name" {{ (Auth::user()->role == 'master' || Auth::user()->role == 'admin' ) ? '' : 'readonly' }}>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- mencakup --}}
                    <div class="col-md-8 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Mencakup</label>
                                    <input type="text" class="form-control @error('cakupan') is-invalid @enderror"
                                        value="{{ $kelas->cakupan }}" name="cakupan" {{ (Auth::user()->role == 'master' || Auth::user()->role == 'admin' ) ? '' : 'readonly' }}>
                                    @error('cakupan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- petugas_id --}}
                    <div class="col-md-4 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Diedit Oleh</label>
                                    <input type="text" class="form-control" value="{{ $kelas->petugas->name }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- created_at --}}
                    <div class="col-md-4 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Dibuat Pada</label>
                                    <input type="text" class="form-control" value="{{ $kelas->created_at }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- updated_at --}}
                    <div class="col-md-4 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Diedit Pada</label>
                                    <input type="text" class="form-control" value="{{ $kelas->updated_at }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- print_by --}}
                    <i class="mt-5 ms-1 d-none d-print-block">
                        Dicetak oleh {{ auth()->user()->name }}
                    </i>

                    {{-- button --}}
                    <div class="d-flex p-2 justify-content-between mx-3 mt-3 d-print-none">
                        <div class="">
                            <a href="/master/kelas" class="btn btn-primary"><b>Kembali</b></a>
                        </div>
                        <div class="me-3">
                            <a id="btn-print" class="btn btn-primary"><b>Cetak</b></a>
                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'master')
                            <button type="submit" onclick="return confirm('Pastikan Data yang Anda Masukkan Benar!')"
                            class="btn btn-primary mx-2"><b>Edit</b></button>
                            @else

                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </form>

    </div>
@endsection
