@extends('dashboard.layouts.main2')
@section('content')
<style>
    .dataTables_length {
        display: none !important;
    }
</style>
    <div class="card mt-5 shadow-lg">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between">
                <h2 class="">Administrasi SPP {{ auth()->user()->name }}</h2>
            </div>
        </div>
        <div class="card-body p-3">
            <table class="table table-striped" style="width:100%">
                <thead class="bg-primary text-white">
                    <tr>
                        {{-- <th>No</th> --}}
                        <th>Spp</th>
                        <th>Nominal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spps as $spp)
                        @if (\App\Models\Pembayaran::checkPembayaran($spp->id, $siswa->id))
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>Kelas {{ $spp->kelas->name }} {{ $spp->month }}</td>
                                <td>{{ $spp->nominal }}</td>
                                <td>
                                    Lunas pada
                                    @php
                                        $d = \App\Models\Pembayaran::select('created_at')
                                            ->where('spp_id', $spp->id)
                                            ->where('user_id', $siswa->id)
                                            ->first();
                                    @endphp

                                    {{ $d->created_at }}
                                </td>
                            </tr>
                        @else
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>Kelas {{ $spp->kelas->name }} {{ $spp->month }}</td>
                                <td>{{ $spp->nominal }}</td>
                                <td>
                                    Belum Lunas
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
