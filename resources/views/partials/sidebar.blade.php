<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a class="nav-link {{ strtolower($activeMenu) == 'list_mahasiswa' ? 'active' : '' }}" href="{{ url('/') }}">
                        <i class="mdi mdi-account-group"></i> List Data Mahasiswa
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ strtolower($activeMenu) == 'riwayat_pendidikan' ? 'active' : '' }}" href="{{ url('/riwayat_pendidikan') }}">
                        <i class="mdi mdi-timetable"></i> Riwayat Pendidikan Mahasiswa
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ strtolower($activeMenu) == 'profil_pt' ? 'active' : '' }}" href="{{ url('/profil_pt') }}">
                        <i class="mdi mdi-hospital-building"></i> Profil PT
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ strtolower($activeMenu) == 'prodi_pt' ? 'active' : '' }}" href="{{ url('/prodi_pt') }}">
                        <i class="mdi mdi-layers-outline"></i> Prodi PT
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ strtolower($activeMenu) == 'list_dosen' ? 'active' : '' }}" href="{{ url('/list_dosen') }}">
                        <i class="mdi mdi-account-tie-voice"></i> Dosen PT
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>