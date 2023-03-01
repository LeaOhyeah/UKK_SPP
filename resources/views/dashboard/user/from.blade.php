@extends('dashboard.layouts.main')
@section('content')
    {{-- form --}}
    <div class=" card shadow mt-4 border-info mb-4">

        <form action="/master/user" method="post" class="my-4 row px-5 d-flex ">
            @csrf
            <div class="d-flex p-2 my-4 border-bottom border-start rounded border-info">
                <h3 class="ms-3 text-primary">Tambahkan Siswa Baru</h3>
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
                            <label class="labels mb-2">Nama Siswa</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nama Siswa" name="name" value="{{ old('name') }}" autofocus>
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
                                placeholder="Email Siswa" name="email" value="{{ old('email') }}" autofocus>
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
                                placeholder="NISN" name="nisn" value="{{ old('nisn') }}" autofocus>
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
                                placeholder="Telepon" name="phone" value="{{ old('phone') }}" autofocus>
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
                        <label for="kelas" class="form-label">Tingkat</label>
                        <select class="form-select" name="kelas_id">
                            @foreach ($kelass as $kelas)
                                @if (old('kelas_id') == $kelas->id)
                                    <option value="{{ $kelas->id }}" selected>{{ $kelas->name }}</option>
                                @else
                                    <option value="{{ $kelas->id }}">{{ $kelas->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {{-- kelas --}}
            <div class="col-md-6 px-3 mb-2 mt-3">
                <div class="d-flex flex-column">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="labels mb-2">Kelas</label>
                            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror"
                                placeholder="GP 1,RPL 1, ... " name="nama_kelas" value="{{ old('nama_kelas') }}" autofocus>
                            @error('nama_kelas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- address --}}
            <div class="col-md-12 px-3 mb-2 mt-3">
                <div class="d-flex flex-column">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="labels mb-2">Alamat</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                placeholder="Alamat" name="address" value="{{ old('address') }}" autofocus>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- button --}}
            <div class="d-flex p-2 justify-content-end mt-5">
                <a href="/master/user" onclick="return confirm('Batalkan Aksi?')"
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
