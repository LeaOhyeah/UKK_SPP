@extends('dashboard.layouts.main')
@section('content')
<div class="card mt-5 shadow-lg">

    <div class="card-header bg-primary text-white">
        <div class="d-flex justify-content-center py-3">
            <h2 class="">Detail petugas {{ $petugas->name }}</h2>
        </div>
    </div>

    <form action="/master/petugas/{{ $petugas->id }}" method="post" class="my-4 row px-5 d-flex ">
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
                                <label class="labels mb-2">Nama Petugas</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ $petugas->name }}" name="name">
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
                                <label class="labels mb-2">Email Petugas</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $petugas->email }}" name="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- password --}}
                <div class="col-md-6 px-3 mb-2 mt-3 d-print-none">
                    <div class="d-flex flex-column">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="labels mb-2">Password Baru</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                     name="password">
                                @error('password')
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
                                <label class="labels mb-2">Jabatan</label>
                                <input type="text" class="form-control" value="{{ $petugas->role }}" name="role" readonly>
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
                        <a href="/master/petugas" class="btn btn-primary"><b>Kembali</b></a>
                    </div>
                    <div class="">
                        <a id="btn-print" class="btn btn-primary"><b>Cetak</b></a>
                        <button type="submit" onclick="return confirm('Pastikan Data yang Anda Masukkan Benar!')"
                            class="btn btn-primary mx-2 me-4"><b>Edit</b></button>
                    </div>
                </div>

            </div>
        </div>
    </form>

</div>
@endsection
