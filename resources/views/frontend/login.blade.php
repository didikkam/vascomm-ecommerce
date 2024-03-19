@extends('layouts.auth')

@section('title', 'Login')

@push('after-styles')
@endpush

@section('content')
    <section class="container-fluid h-100 ps-0" style="height: 100%;">
        <div class="row h-100">
            <div class="col-md-6 kiri" style="background: #41A0E4;">
                <img src="{{ asset('assets/images/login-right.png') }}" class="d-block w-100" alt="Slider">
            </div>
            <div class="col-md-6 h-100" style="background: #ffffff;">
                <div class="row">
                    <div class="col-md-8 offset-md-2 mt-5 pt-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="color:#3E3E3E; font-size: 24px;">Selamat Datang Admin</h5>
                                <p style="color: #9B9B9B;">Silahkan masukkan email atau nomor telepon dan password
                                    Anda untuk mulai menggunakan aplikasi</p>
                                <form class="mt-5">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email / Nomor Telpon</label>
                                        <input type="email" class="form-control" placeholder="Contoh: admin@gmail.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" placeholder="Masukkan passward">
                                    </div>
                                    <div class="d-grid mt-5">
                                        <a href="{{ route('admin.index') }}" class="btn btn-primary">MASUK</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-scripts')
@endpush
