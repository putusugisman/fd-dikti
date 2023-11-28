<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ strtolower($activeMenu) == 'list_mahasiswa' ? 'active' : '' }}" href="{{ url('/') }}">
                            <i class="mdi mdi-account-group me-2"></i> List Data Mahasiswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ strtolower($activeMenu) == 'riwayat_pendidikan' ? 'active' : '' }}" href="{{ url('/riwayat_pendidikan') }}">
                            <i class="mdi mdi-timetable me-2"></i> Riwayat Pendidikan Mahasiswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ strtolower($activeMenu) == 'profil_pt' ? 'active' : '' }}" href="{{ url('/profil_pt') }}">
                            <i class="mdi mdi-hospital-building me-2"></i> Profil PT
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ strtolower($activeMenu) == 'prodi_pt' ? 'active' : '' }}" href="{{ url('/prodi_pt') }}">
                            <i class="mdi mdi-layers-outline me-2"></i> Prodi PT
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ strtolower($activeMenu) == 'list_dosen' ? 'active' : '' }}" href="{{ url('/list_dosen') }}">
                            <i class="mdi mdi-account-tie-voice me-2"></i> Dosen PT
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>