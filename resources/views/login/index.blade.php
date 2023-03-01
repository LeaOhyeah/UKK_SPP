@extends('login.main')

@section('content')
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden ">

        <div class="container px-4 py-5 px-md-5 text-center text-lg-start ">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(0, 0%, 100%)">
                        SPPay <br />
                        <span style="color: hsl(0, 0%, 100%)">Pengelolaan SPP</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(0, 0%, 100%)">
                        Selamat datang di website pengelolaan dan pembayaran SPP SMKN 4 Bojonegoro. Silahakan masukkan email dan password Anda untuk melanjutkan. Jika Anda memiliki pertanyaan atau kesulitan dalam menggunakan aplikasi ini, silahkan hubungi pihak sekolah, petugas atau admin. Terima Kasih
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form action="/login" method="post">
                                @csrf

                                @if (session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="form3Example3" class="form-control" value="{{ old('email') }}" autofocus required />
                                    <label class="form-label @error('email') is-invalid @enderror" for="form3Example3">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="form3Example4" class="form-control" required/>
                                    <label class="form-label @error('password') is-invalid @enderror" for="form3Example4">Password</label>
                                </div>

                                <!-- Submit button -->
                                <div class="mt-4 mb-4 justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-block mb-4">
                                        Login
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
@endsection
