@extends('dashboard.layouts.main')
@section('content')
    {{-- form --}}
    <div class=" card shadow mt-4 border-info">

        <form action="/master/kelas" method="post" class="my-4 row px-5 d-flex ">
            @csrf
            <div class="d-flex p-2 my-4 border-bottom border-start rounded border-info">
                <h3 class="ms-3 text-primary">Tambahkan Kelas Baru</h3>
            </div>

            <div class="col-md-6 px-3 mb-2 mt-3">
                <div class="d-flex flex-column">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="labels mb-2">Tingkat Kelas</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="X XI atau XII" name="name" value="{{old('name')}}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 px-3 mb-2 mt-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="labels mb-2">Mencakup</label>
                        <input type="text" class="form-control @error('cakupan') is-invalid @enderror" placeholder="TP(1,2) dst.." required
                            name="cakupan" value="{{old('cakupan')}}">
                            @error('cakupan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex p-2 justify-content-end mt-2">
                <a href="/master/kelas" onclick="return confirm('Batalkan Aksi?')"
                    class="btn btn-outline-primary mx-4"><b>Kembali</b></a>
                <button type="submit" onclick="return confirm('Pastikan Data yang Anda Masukkan Benar!')"
                    class="btn btn-primary">Tambahkan</button>
            </div>
        </form>
    </div>
    {{-- end form --}}
@endsection
