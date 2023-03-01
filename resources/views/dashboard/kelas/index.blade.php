@extends('dashboard.layouts.main')
@section('content')
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
                <h2 class="">Kelas</h2>
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'master')
                    <a class="btn btn-outline-primary text-white" href="/master/kelas/create"><b>Tambah</b></a>
                @else
                @endif
            </div>
        </div>
        <div class="card-body p-3">
            <table id="tes" class="table table-striped" style="width:100%">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Mencakup</th>
                        <th>Diedit Pada</th>
                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'master')
                            <th>#</th>
                        @else
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lea as $kelas)
                        <tr>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/kelas/{{ $kelas->id }}">{{ $loop->iteration }}</a></td>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/kelas/{{ $kelas->id }}">{{ $kelas->name }}</a></td>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/kelas/{{ $kelas->id }}">{{ $kelas->cakupan }}</td>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/kelas/{{ $kelas->id }}">{{ $kelas->updated_at }}</td>
                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'master')
                            <td>
                                <form action="/master/kelas/{{ $kelas->id }}" method="post">
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
