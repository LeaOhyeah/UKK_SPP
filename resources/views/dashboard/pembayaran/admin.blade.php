@extends('dashboard.layouts.main2')
@section('content')
    <form action="/pembayaran/cari" method="get">
        @csrf
        <input type="text" class="mt-4" name="nisn" value="{{ request('nisn') }}" required autofocus>
        <button type="submit">cari</button>
    </form>
    <h3>
        {{-- welcome {{auth()->user()->name}} --}}
    </h3>
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
                <h2 class="">SPP {{ $name }}</h2>
            </div>
        </div>
        <div class="card-body p-3">
            <table id="tes" class="table table-striped" style="width:100%">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nominal</th>
                        <th>Status</th>
                        <th>Petugas</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @if (Request::is('pembayaran/cari*'))
                        @foreach ($spps as $spp)
                            @if (\App\Models\Pembayaran::checkPembayaran($spp->id, $siswa->id))
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>SPP Kelas {{ $spp->kelas->name }} Bulan {{ $spp->month }}</td>
                                    <td>{{ $spp->nominal }}</td>
                                    <td>
                                        @php
                                            $d = \App\Models\Pembayaran::select('created_at')
                                                ->where('spp_id', $spp->id)
                                                ->where('user_id', $siswa->id)
                                                ->first();
                                        @endphp
                                        {{ 'Lunas Pada ' . $d->created_at }}
                                    </td>
                                    <td>{{ $spp->petugas->name }}</td>
                                    <td></td>
                                </tr>
                            @else
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>SPP Kelas {{ $spp->kelas->name }} Bulan {{ $spp->month }}</td>
                                    <td>{{ $spp->nominal }}</td>
                                    <td>
                                        Belum Lunas
                                    </td>
                                    <td></td>
                                    <td>
                                        <form action="/pembayaran/trs" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $siswa->id }}">
                                            <input type="hidden" name="petugas_id" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="spp_id" value="{{ $spp->id }}">
                                            <input type="hidden" name="deleted_by" value="1">
                                            <button type="submit" onclick="return confirmPayment()"
                                                class="btn btn-sm btn-primary">Lunasi Sekarang
                                            </button>
                                        </form>

                                        <script>
                                            function confirmPayment() {
                                                var input = prompt("Ketik 'yakin' untuk melanjutkan");
                                                if (input === "yakin") {
                                                    return true;
                                                } else {
                                                    alert("Tolong pastikan data benar!");
                                                    return false;
                                                }
                                            }
                                        </script>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                    @endif

                </tbody>
            </table>
        </div>
    </div>

    {{-- table --}}
    <div class="card mt-5 shadow-lg">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between">
                <h2 class="">Daftar Pembayaran</h2>
            </div>
        </div>
        <div class="card-body p-3 mt-5">
            <table id="udin" class="table table-striped" style="width:100%">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>SPP</th>
                        <th>Petugas</th>
                        <th>Dibuat Pada</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sppss as $spp)
                        <tr>
                            <td><a href="/pembayaran/trs/{{ $spp->id }}"
                                    class="text-decoration-none text-dark">{{ $loop->iteration }}</a></td>
                            <td><a href="/pembayaran/trs/{{ $spp->id }}"
                                    class="text-decoration-none text-dark">{{ $spp->user->name }}</a></td>
                            <td><a href="/pembayaran/trs/{{ $spp->id }}"
                                    class="text-decoration-none text-dark">{{ $spp->spp->nama }}</a></td>
                            <td><a href="/pembayaran/trs/{{ $spp->id }}"
                                    class="text-decoration-none text-dark">{{ $spp->petugas->name }}</a></td>
                            <td><a href="/pembayaran/trs/{{ $spp->id }}"
                                    class="text-decoration-none text-dark">{{ $spp->created_at }}</a></td>
                            <td>
                                <form action="/pembayaran/trs/{{ $spp->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"
                                        onclick="return confirm('Yakin ingin menghapus data?')"><b>
                                            Hapus</b></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- end table --}}

    <div class="card mt-5">
        <textarea class="d-none" name="" id="" cols="30" rows="10"></textarea>
    </div>
@endsection
