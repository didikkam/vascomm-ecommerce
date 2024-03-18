@extends('layouts.frontend')

@section('title', 'Ecommerce')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/assets/owl.theme.default.min.css') }}">
@endpush

@section('content')
    <div class="container mt-3">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images/slider.png') }}" class="d-block w-100" alt="Slider">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/images/slider.png') }}" class="d-block w-100" alt="Slider">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/images/slider.png') }}" class="d-block w-100" alt="Slider">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <h5 class="section-title">Terbaru</h5>
            </div>
            <div class="col-12 mt-3">
                <div class="owl-carousel">
                    @for ($i = 0; $i <= 10; $i++)
                        <div class="card card-product" style="width: 12rem;">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <img src="{{ asset('assets/images/product.png') }}" class="card-img-top" alt="Produk">
                                </div>
                                <h5 class="card-title">Card title {{ $i }}</h5>
                                <h5 class="card-price">IDR. 1.000.000</h5>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <h5 class="section-title">Produk Tersedia</h5>
            </div>
            <div class="col-12 mt-3">
                <div class="row">
                    @for ($i = 0; $i <= 10; $i++)
                        <div class="col-md-2 col-sm-3 mb-3">
                            <div class="card card-product" style="width: 12rem;">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <img src="{{ asset('assets/images/product.png') }}" class="card-img-top"
                                            alt="Produk">
                                    </div>
                                    <h5 class="card-title">Card title {{ $i }}</h5>
                                    <h5 class="card-price">IDR. 1.000.000</h5>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-outline-primary">Lihat lebih banyak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script type="text/javascript" charset="utf8" src="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.js') }}">
    </script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                items: 6,
                loop: true,
                // nav: true,
            });
        });
    </script>
@endpush
