@extends('dashboard.layouts.main2')
@section('content')
    <div class="card mt-5 shadow-lg">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-center py-3">
                <h2 class="">Detail Pembayaran {{ $pembayaran->user->name }}</h2>
            </div>
        </div>

        <form action="" method="" class="my-4 row px-5 d-flex ">

            <div class="card-body p-3">

                <div class="row">

                    {{--  --}}
                    <div class="col-md-4 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Nama Siswa</label>
                                    <input type="text" class="form-control"
                                        value="{{ $pembayaran->user->name }}"readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Nama SPP</label>
                                    <input type="text" class="form-control" value="{{ $pembayaran->spp->nama }}"readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 px-3 mb-2 mt-3">
                        <div class="d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="labels mb-2">Nama Petugas</label>
                                    <input type="text" class="form-control"
                                        value="{{ $pembayaran->petugas->name }}"readonly>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </form>

    </div>
    <div class=" card shadow mt-4 border-info">


        <form action="/pembayaran/trs/{{ $pembayaran->id }}" method="post" class="my-4 row px-5 d-flex ">
            @csrf
            @method('put')
            <div class="d-flex p-2 my-4 border-bottom border-start rounded border-info">
                <h3 class="ms-3 text-primary">Edit Data Pembayaran</h3>
            </div>

            {{-- user --}}
            <div class="col-md-4 px-3 mb-2 mt-3">
                <div class="d-flex flex-column">
                    <div class="col-md-12">
                        <label for="kelas" class="form-label">Siswa</label>
                        <select class="form-select" name="user_id">
                            <option value="" selected>Pilih</option>
                            @foreach ($siswa as $s)
                                @if (false)
                                    <option value="{{ $s->id }}" selected>{{ $s->name }}</option>
                                @else
                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            {{-- spp --}}
            <div class="col-md-4 px-3 mb-2 mt-3">
                <div class="d-flex flex-column">
                    <div class="col-md-12">
                        <label for="kelas" class="form-label">SPP</label>
                        <select class="form-select" name="spp_id">
                            <option value="" selected>Pilih</option>
                            @foreach ($spp as $s)
                                @if (old('spp_id') == $s->id)
                                    <option value="{{ $s->id }}" selected>{{ $s->nama }}</option>
                                @else
                                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            {{-- petugas --}}
            <div class="col-md-4 px-3 mb-2 mt-3">
                <div class="d-flex flex-column">
                    <div class="col-md-12">
                        <label for="kelas" class="form-label">Petugas</label>
                        <select class="form-select" name="petugas_id">
                            <option value="" selected>Pilih</option>
                            @foreach ($petugas as $s)
                                @if (old('petugas_id') == $s->id)
                                    <option value="{{ $s->id }}" selected>{{ $s->name }}</option>
                                @else
                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex p-2 justify-content-end mt-2">
                <a href="/pembayaran/trs" onclick="return confirm('Batalkan Aksi?')"
                    class="btn btn-outline-primary mx-4"><b>Kembali</b></a>
                <button type="submit" onclick="return confirm('Pastikan Data yang Anda Masukkan Benar!')"
                    class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
@endsection
