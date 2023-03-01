<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Administrasi SPP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (auth()->user()->role == 'master')
                    {{-- arsip --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('arsip*') ? 'active' : '' }}" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Arsip
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="/arsip/user">Siswa</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/arsip/petugas">Admin & Petugas</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="/arsip/kelas">Kelas</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/arsip/spp">SPP</a>
                            </li>
                        </ul>
                    </li>
                @else
                @endif
                @if (auth()->user()->role == 'master' || auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                    {{-- data --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('master*') ? 'active' : '' }}" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="/master/user">Siswa</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/master/petugas">Admin & Petugas</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="/master/kelas">Kelas</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/master/spp">SPP</a>
                            </li>
                        </ul>
                    </li>
                @else
                @endif
                @if (auth()->user()->role == 'master' || auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                    {{-- pembayaran --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('pembayaran*') ? 'active' : '' }}"
                            href="/pembayaran/trs">Bayar</a>
                    </li>
                @else
                    {{-- riwayat --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('siswa') ? 'active' : '' }}" href="/siswa">SPP Saya</a>
                    </li>
                    {{-- riwayat --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('rincian') ? 'active' : '' }}" href="/rincian">Rincian</a>
                    </li>
                @endif



            </ul>
            {{-- @auth('petugas') --}}
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Selamat Datang {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        {{-- <li><a class="dropdown-item" href="/dashboard">Edit Profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li> --}}
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right"> Logout </i>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                {{-- @else --}}
                {{-- @endauth --}}
        </div>
    </div>
</nav>
