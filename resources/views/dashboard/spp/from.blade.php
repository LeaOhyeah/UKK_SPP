@extends('dashboard.layouts.main')
@section('content')
    {{-- form --}}
    <div class=" card shadow mt-4 border-info">

        <form action="/master/spp" method="post" class="my-4 row px-5 d-flex ">
            @csrf
            <div class="d-flex p-2 my-4 border-bottom border-start rounded border-info">
                <h3 class="ms-3 text-primary">Tambahkan SPP Baru</h3>
            </div>

            {{-- bulan --}}
            <div class="col-md-4 px-3 mb-2 mt-3">
                <div class="d-flex flex-column">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="labels mb-2">Bulan</label>
                            <input type="month" class="form-control @error('nama') is-invalid @enderror"
                                placeholder="Bulan" name="month" value="{{ old('month') }}" autofocus>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- nominal --}}
            <div class="col-md-4 px-3 mb-2 mt-3">
                <div class="d-flex flex-column">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="labels mb-2">Nominal (Rp)</label>
                            <input type="number" class="form-control @error('nominal') is-invalid @enderror"
                                placeholder="Nominal" name="nominal" value="{{ old('nominal') }}" autofocus>
                            @error('nominal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- kelas --}}
            <div class="col-md-4 px-3 mb-2 mt-3">
                <div class="d-flex flex-column">
                    <div class="col-md-12">
                        <label for="kelas" class="form-label">Kelas</label>
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

            <input type="hidden" name="nama" value="">


            {{-- button --}}
            <div class="d-flex p-2 justify-content-end mt-4">
                <a href="/master/spp" onclick="return confirm('Batalkan Aksi?')"
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
