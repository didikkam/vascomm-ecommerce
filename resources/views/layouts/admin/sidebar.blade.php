<style>
    ul.nav,
    .nav-item {
        width: 100%;
    }

    .nav-item {
        padding: 1px 0;
    }

    .nav-link {
        padding: 10px 10px;
        color: #1A1111;
    }

    .nav-item.active .nav-link,
    .nav-item:hover .nav-link {
        background-color: #41A0E4 !important;
    }

    .nav-item.active a span,
    .nav-item:hover a span {
        color: #FFFFFF;
    }
</style>
<div class="col-auto col-md-3 col-xl-2 px-0 bg-white mt-1">
    <div class="d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu"
            style="">
            <li class="nav-item active">
                <a href="#" class="nav-link align-middle">
                    <img src="{{ asset('assets/images/ic_dashboard_active.png') }}" alt="Logo" height="25">
                    <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link align-middle">
                    <img src="{{ asset('assets/images/ic_user.png') }}" alt="Logo" height="25">
                    <span class="ms-1 d-none d-sm-inline">Manajemen User</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link align-middle">
                    <img src="{{ asset('assets/images/ic_product.png') }}" alt="Logo" height="25">
                    <span class="ms-1 d-none d-sm-inline">Manajemen Produk</span>
                </a>
            </li>
        </ul>
        <hr>
    </div>
</div>
