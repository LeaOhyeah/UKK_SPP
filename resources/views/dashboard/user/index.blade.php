@extends('dashboard.layouts.main')
@section('content')
    <h3>
        {{-- welcome {{auth()->user()->name}} --}}
    </h3>

    {{-- table --}}
    <div class="card mt-5 shadow-lg">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between">
                <h2 class="">Siswa</h2>
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'master')
                    <a class="btn btn-outline-primary text-white" href="/master/user/create"><b>Tambah</b></a>
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
                        <th>Kelas</th>
                        <th>Email</th>
                        <th>NISN</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Dibuat Pada</th>
                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'master')
                            <th>#</th>
                        @else
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/user/{{ $user->id }}">{{ $loop->iteration }}</a></td>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/user/{{ $user->id }}">{{ $user->name }}</a></td>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/user/{{ $user->id }}">{{ $user->kelas->name }}
                                    {{ $user->nama_kelas }}</a>
                            </td>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/user/{{ $user->id }}">{{ $user->email }}</td>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/user/{{ $user->id }}">{{ $user->nisn }}</td>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/user/{{ $user->id }}">{{ $user->phone }}</td>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/user/{{ $user->id }}">{{ $user->address }}</td>
                            <td><a class="text-decoration-none text-dark"
                                    href="/master/user/{{ $user->id }}">{{ $user->created_at }}</td>
                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'master')
                                <td>
                                    <form action="/master/user/{{ $user->id }}" method="post">
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
