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
                        <h5 class="description">{{ $userCount }} User</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-dashboard">
                    <div class="card-body">
                        <h6 class="title">Jumlah Aktif User</h6>
                        <h5 class="description">{{ $userActiveCount }} User</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-dashboard">
                    <div class="card-body">
                        <h6 class="title">Jumlah Produk</h6>
                        <h5 class="description">{{ $productCount }} Produk</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-dashboard">
                    <div class="card-body">
                        <h6 class="title">Jumlah Aktif Produk</h6>
                        <h5 class="description">{{ $productActiveCount }} Produk</h5>
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
                                    @foreach ($productLatests as $item)
                                        <tr>
                                            <td style="color: #454C75">
                                                <img src="{{ $item->image_formated }}" alt="Logo" width="40"
                                                    class="me-3">
                                                {{ $item->name }}
                                            </td>
                                            <td style="color: #A3A6AC">{{ $item->created_at->isoFormat('D MMMM YYYY') }}
                                            </td>
                                            <td style="color: #1A1111">Rp {{ number_format($item->price, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
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
