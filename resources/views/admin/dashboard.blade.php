@extends('layouts.admin')

@section('title', 'Dashboard')

@push('after-styles')
    <style>
        .card-dashboard {
            background-image: url('/assets/images/dashboard2.png');
            background-size: cover;
            background-position: center;
            padding: 0;
            border: 0;
            border-radius: 16px;
        }

        .card-dashboard .title {
            color: #597393;
        }

        .card-dashboard .description {
            color: #002060;
        }

        .card-rounded {
            border: 0;
            border-radius: 12px;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <h4>Dashboard</h4>
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card-dashboard">
                    <div class="card-body">
                        <h6 class="title">Jumlah User</h6>
                        <h5 class="description">150 User</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-dashboard">
                    <div class="card-body">
                        <h6 class="title">Jumlah Aktif User</h6>
                        <h5 class="description">150 User</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-dashboard">
                    <div class="card-body">
                        <h6 class="title">Jumlah Produk</h6>
                        <h5 class="description">150 Produk</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-dashboard">
                    <div class="card-body">
                        <h6 class="title">Jumlah Aktif Produk</h6>
                        <h5 class="description">150 Produk</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="card card-rounded">
                    <div class="card-body">
                        <h4>Produk Terbaru</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Tanggal Dibuat</th>
                                        <th scope="col">Harga (Rp)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i <= 5; $i++)
                                        <tr>
                                            <td style="color: #454C75">
                                                <img src="{{ asset('assets/images/laptop.png') }}" alt="Logo"
                                                    height="40">
                                                Microsoft Surface 7ark
                                            </td>
                                            <td style="color: #A3A6AC">12 Mei 2023</td>
                                            <td style="color: #1A1111">Rp 1.000</td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
@endpush
