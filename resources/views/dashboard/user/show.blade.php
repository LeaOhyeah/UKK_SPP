@extends('dashboard.layouts.main')
@section('content')
    <div class="card mt-5 shadow-lg">

        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-center py-3">
                <h2 class="">Detail Siswa {{ $user->name }}</h2>
            </div>
        </div>

        <form action="/master/user/{{ $user->id }}" method="post" class="my-4 row px-5 d-flex ">
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

                    {{-- nama --}}
                    <div class="col-md-6 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Nama Siswa</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $user->name }}" name="name" {{ (Auth::user()->role == 'master' || Auth::user()->role == 'admin' ) ? '' : 'readonly' }}>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- email --}}
                    <div class="col-md-6 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $user->email }}" name="email" {{ (Auth::user()->role == 'master' || Auth::user()->role == 'admin' ) ? '' : 'readonly' }}>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- nisn --}}
                    <div class="col-md-6 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">NISN</label>
                                    <input type="text" class="form-control @error('nisn') is-invalid @enderror"
                                        value="{{ $user->nisn }}" name="nisn" {{ (Auth::user()->role == 'master' || Auth::user()->role == 'admin' ) ? '' : 'readonly' }}>
                                    @error('nisn')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- phone --}}
                    <div class="col-md-6 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Telepon</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ $user->phone }}" name="phone" {{ (Auth::user()->role == 'master' || Auth::user()->role == 'admin' ) ? '' : 'readonly' }}>
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- kelas_id --}}
                    <div class="col-md-6 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Tingkat kelas</label>
                                    <input type="text" class="form-control" value="{{ $user->kelas->name }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- kelas --}}
                    <div class="col-md-6 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Kelas</label>
                                    <input type="text" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" value="{{ $user->nama_kelas }}" {{ (Auth::user()->role == 'master' || Auth::user()->role == 'admin' ) ? '' : 'readonly' }}>
                                    @error('nama_kelas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- alamat --}}
                    <div class="col-md-12 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Alamat</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        value="{{ $user->address }}" name="address" {{ (Auth::user()->role == 'master' || Auth::user()->role == 'admin' ) ? '' : 'readonly' }}>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>


                    <i class="mt-5 ms-1 d-none d-print-block">
                        Dicetak oleh {{ auth()->user()->name }}
                    </i>

                    {{-- button --}}
                    <div class="d-flex p-2 justify-content-between mx-3 mt-3 d-print-none">
                        <div class="">
                            <a href="/master/user" class="btn btn-primary"><b>Kembali</b></a>
                        </div>
                        <div class="">
                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'master')
                            <button type="submit" onclick="return confirm('Pastikan Data yang Anda Masukkan Benar!')"
                            class="btn btn-primary mx-2 me-4"><b>Edit</b></button>
                            <a id="btn-print" class="btn btn-primary"><b>Cetak</b></a>
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
