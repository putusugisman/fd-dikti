<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="javascript:void(0);" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('dist/img/Logo_Poltrada_header.png') }}" alt="logo-sm" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('dist/img/Logo_Poltrada_header.png') }}" alt="logo-dark" height="50">
                    </span>
                </a>
                <a href="javascript:void(0);" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('dist/img/Logo_Poltrada_header.png') }}" alt="logo-sm-light" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('dist/img/Logo_Poltrada_header.png') }}" alt="logo-light" height="50">
                    </span>
                </a>
            </div>
        </div>
        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('dist/img/icons/8aeadd89b6b62f6633a59ad691001817.png') }}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">Developer</span>
                    {{-- <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i> --}}
                </button>
                {{-- <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle me-1"></i> My Wallet</a>
                    <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                </div> --}}
            </div>

        </div>
    </div>
</header>