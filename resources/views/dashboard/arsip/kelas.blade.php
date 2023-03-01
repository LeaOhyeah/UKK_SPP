@extends('dashboard.layouts.main')
@section('content')

    {{-- table --}}
    <div class="card mt-5 shadow-lg">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between">
                <h2 class="">Arsip Kelas</h2>
            </div>
        </div>
        <div class="card-body p-3">
            <table id="tes" class="table table-striped" style="width:100%">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Mencakup</th>
                        <th>Dibuat Pada</th>
                        <th>Dibuat Oleh</th>
                        <th>Dihapus Pada</th>
                        <th>Dihapus Oleh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelass as $kelas)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kelas->name }}</td>
                            <td>{{ $kelas->cakupan }}</td>
                            <td>{{ $kelas->created_at }}</td>
                            <td>{{ $kelas->petugas->name }}</td>
                            <td>{{ $kelas->deleted_at }}</td>
                            <td> {{ App\Models\Petugas::find($kelas->deleted_by)->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- end table --}}
@endsection
