@extends('dashboard.layouts.main')
@section('content')
    {{-- form --}}
    <div class=" card shadow mt-4 border-info mb-4">

        <form action="/master/petugas" method="post" class="my-4 row px-5 d-flex ">
            @csrf
            <div class="d-flex p-2 my-4 border-bottom border-start rounded border-info">
                <h3 class="ms-3 text-primary">Tambahkan Petugas Baru</h3>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- name --}}
            <div class="col-md-6 px-3 mb-2 mt-3">
                <div class="d-flex flex-column">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="labels mb-2">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nama petugas" name="name" value="{{ old('name') }}" autofocus>
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
                                placeholder="Email petugas" name="email" value="{{ old('email') }}" autofocus>
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
                            <label class="labels mb-2">Password</label>
                            <input type="text" class="form-control @error('password') is-invalid @enderror"
                                placeholder="password" name="password" value="{{ old('password') }}" autofocus>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- jabatan --}}
            <div class="col-md-6 px-3 mb-2 mt-3">
                <div class="d-flex flex-column">
                    <div class="col-md-12">
                        <label for="kelas" class="form-label">Jabaan</label>
                        <select class="form-select" name="role">
                            <option value="admin">Admin</option>
                            <option value="petugas" selected>Petugas</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- button --}}
            <div class="d-flex p-2 justify-content-end mt-5">
                <a href="/master/petugas" onclick="return confirm('Batalkan Aksi?')"
                    class="btn btn-outline-primary mx-4"><b>Kembali</b></a>
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'master')
                    <button type="submit" onclick="return confirm('Pastikan Data yang Anda Masukkan Benar!')"
                        class="btn btn-primary">Tambahkan</button>
                @else
                @endif
            </div>

        </form>
    </div>
    {{-- end form --}}
@endsection
