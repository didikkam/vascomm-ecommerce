<style>
    .admin-box {
        display: flex;
        align-items: center;
        padding: 8px 12px;
        border-radius: 6px;
    }

    .admin-img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .admin-img img {
        width: 100%;
        height: auto;
    }

    .profile.dropdown-toggle::after {
        display: none;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-white d-none d-md-block">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" height="50">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link active profile dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="admin-box">
                            <div class="me-3">
                                <p class="py-0 my-0 text-end" style="color: #41A0E4; font-size: 13px;">Hallo Admin,</p>
                                <p class="py-0 my-0 text-end">Didik Abdul Mukmin</p>
                            </div>
                            <div class="admin-img">
                                <img src="https://via.placeholder.com/200" alt="Admin">
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li class="px-5 py-3">
                            <div class="d-flex justify-content-center text-center w-100">
                                <div class="admin-img" style="height: 100px;width:100px;">
                                    <img src="https://via.placeholder.com/200" alt="Admin">
                                </div>
                            </div>
                            <p class="py-0 my-0 text-center mt-3">Didik Abdul Mukmin</p>
                            <p class="py-0 my-0 text-center">email@mail.com</p>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="px-5 py-3 text-center">
                            <a href="{{ route('logout') }}" style="text-decoration: none;" class="text-danger"><img
                                    src="{{ asset('assets/images/power.png') }}" alt="Logo" height="20">
                                Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
