<nav class="navbar navbar-expand-lg navbar-light bg-white" style="border-bottom: 1px solid #E4E4E4">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="w-100 mx-5 px-5">
                <input class="form-control" type="search" placeholder="Cari parfum kesukaanmu">
            </div>
            <div class="d-flex ms-auto">
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-3">MASUK</a>
                <a href="{{ route('register') }}" class="btn btn-primary">DAFTAR</a>
            </div>
        </div>
    </div>
</nav>
