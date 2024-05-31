<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-2 pt-3">
        <div
            class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                    aria-expanded="true" aria-label="Toggle navigation">
                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>

        <ul class="nav flex-column pt-3 pt-md-0">
            <li class="nav-item">
                <a href="{{ route('dashboard')}}" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon me-3">
                        <img src="{{ asset('assets/img/logorw03.jpg') }}" alt="Logo" width="30" height="30"
                            class="me-2 rounded-circle">
                    </span>
                    <span class="mt-1 ms-1 sidebar-text">
                        SIRW 03
                    </span>
                </a>
            </li>

            <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
            <li class="nav-item {{ $activeMenu == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>

            <!-- Replace icons for other menu items -->
            <li class="nav-item {{ $activeMenu == 'data_penduduk' ? 'active' : '' }}">
                <a class="nav-link collapsed dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#collapsePenduduk" aria-expanded="{{ $activeMenu == 'data_penduduk' ? 'true' : 'false' }}" aria-controls="collapseDataPenduduk" data-bs-auto-close="outside">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                            <path fill-rule="evenodd"
                                d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">Penduduk</span>
                </a>
                <div class="collapse {{ $dropdown == 'd_penduduk' ? 'show' : '' }}" id="collapsePenduduk" style="margin-left: 2.5rem;">
                    <ul class="nav flex-column pl-5">
                        <li class="nav-item {{ $activeMenu == 'kk' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('data_kk.index')}}">Data KK</a>
                        </li>
                        <li class="nav-item {{ $activeMenu == 'rt' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('data_rt.index')}}">Data RT</a>
                        </li>
                        <li class="nav-item {{ $activeMenu == 'data_penduduk' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('data_penduduk.index')}}">Data Penduduk</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ $activeMenu == 'bantuan_sosial' ? 'active' : '' }}">
                <a href="{{ route('bantuan_sosial.index')}}" class="nav-link collapsed dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#collapseBansos" aria-expanded="{{ $activeMenu == 'bantuan_sosial' ? 'true' : 'false' }}" aria-controls="collapseBansos" data-bs-auto-close="outside">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 0C4.486 0 0 4.486 0 10c0 2.118.66 4.092 1.784 5.715a1 1 0 001.658-1.143A8 8 0 0110 2c3.981 0 7.251 2.896 7.844 6.715a1 1 0 001.658 1.143A10 10 0 102 10a9.983 9.983 0 002.89 7.07 1 1 0 001.658-1.142A7.982 7.982 0 0110 18a8 8 0 100-16z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">Bantuan Sosial</span>
                </a>
                <div class="collapse {{ $dropdown == 'd_bansos' ? 'show' : '' }}" id="collapseBansos" style="margin-left: 2.5rem;">
                    <ul class="nav flex-column pl-5">
                        <li class="nav-item {{ $activeMenu == 'data_alternatif' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('data_alternatif.index')}}">Data Alternatif</a>
                        </li>
                        <li class="nav-item {{ $activeMenu == 'data_kriteria' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('data_kriteria.index')}}">Data Kriteria</a>
                        </li>
                        <li class="nav-item {{ $activeMenu == 'data_penilaian' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('data_penilaian.index')}}">Data Penilaian</a>
                        </li>
                        <li class="nav-item {{ $activeMenu == 'data_perhitungan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('data_perhitungan.index')}}">Data Perhitungan (EDAS)</a>
                        </li>
                        <li class="nav-item {{ $activeMenu == 'data_perhitungan_moora' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('data_perhitungan.moora')}}">Data Perhitungan (MOORA)</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ $activeMenu == 'umkm' ? 'active' : '' }}">
                <a class="nav-link collapsed dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#collapseUmkm" aria-expanded="{{ $activeMenu == 'umkm' ? 'true' : 'false' }}" aria-controls="collapseUmkm" data-bs-auto-close="outside">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">UMKM</span>
                </a>
                <div class="collapse {{ $dropdown == 'umkm' ? 'show' : '' }}" id="collapseUmkm" style="margin-left: 2.5rem;">
                    <ul class="nav flex-column pl-5">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('umkm.index')}}">Data UMKM</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('kategori_dagang.index')}}">Kategori Dagang</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('kategori_jasa.index')}}">Kategori Jasa</a>
                        </li>
                    </ul>
                </div>

                    {{-- <a href="{{ route('umkm.index') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 2a1 1 0 00-1 1v14a1 1 0 102 0V6h12a1 1 0 100-2H4zm0-2h12a2 2 0 012 2v16a2 2 0 01-2 2H6a2 2 0 01-2-2V2a2 2 0 012-2z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">UMKM</span>
                </a>
            </li> --}}

            <li class="nav-item {{ $activeMenu == 'keluhan' ? 'active' : '' }}">
                <a href="{{ route('keluhan.index') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 5a3 3 0 113 3 3 3 0 01-3-3zM1 8a7 7 0 1114 0h2a9 9 0 01-9 9 9 9 0 01-9-9H1zm12-3a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">Laporan</span>
                </a>
            </li>

            <li class="nav-item {{ $activeMenu == 'kegiatan' ? 'active' : '' }}">
                <a href="{{ route('kegiatan.index') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5 3a1 1 0 00-1 1v1H2a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V7a2 2 0 00-2-2h-2V4a1 1 0 00-2 0v1H6V4a1 1 0 00-1-1zm2 11h8a1 1 0 100-2H7a1 1 0 100 2zm0-4h6a1 1 0 100-2H9a1 1 0 100 2zm0-4h4a1 1 0 100-2H9a1 1 0 100 2z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">Informasi Kegiatan</span>
                </a>
            </li>
            {{-- <div class="collapse {{ $dropdown == 'kegiatan' ? 'show' : '' }}" id="collapseKegiatan" style="margin-left: 2.5rem;">
                <ul class="nav flex-column pl-5">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('kegiatan.index')}}">Kegiatan</a>
                    </li>
                </ul>
            </div> --}}

            <li class="nav-item {{ $activeMenu == 'inventaris' ? 'active' : '' }}">
                <a href="{{ Route('inventaris.index') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 3H16C17.1046 3 18 3.89543 18 5V15C18 16.1046 17.1046 17 16 17H4C2.89543 17 2 16.1046 2 15V5C2 3.89543 2.89543 3 4 3ZM4 5V15H16V5H4ZM8 7H12V9H8V7ZM8 11H12V13H8V11Z"></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">Inventaris</span>
                </a>
            </li>
            <li class="nav-item {{ $activeMenu == 'kas' ? 'active' : '' }}">
                <a href="{{ Route('kas.index') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 2C5 1.44772 5.44772 1 6 1H14C14.5523 1 15 1.44772 15 2V3H17C17.5523 3 18 3.44772 18 4V6C18 6.55228 17.5523 7 17 7H16.9431C17.1373 7.31108 17.2712 7.66388 17.3329 8.03745L18 10.5582V16C18 17.1046 17.1046 18 16 18H4C2.89543 18 2 17.1046 2 16V10.5582L2.66711 8.03745C2.72882 7.66388 2.86274 7.31108 3.05694 7H3C2.44772 7 2 6.55228 2 6V4C2 3.44772 2.44772 3 3 3H5V2ZM6 3V4H14V3H6ZM8.39645 7H11.6036C11.839 6.3959 12.3987 6 13 6H14.7778L14.1316 8.56814C13.744 8.22109 13.2576 8 12.7372 8H7.26284C6.74241 8 6.25602 8.22109 5.8684 8.56814L5.22216 6H7C7.60134 6 8.16104 6.3959 8.39645 7ZM12.7372 10C12.3775 10 12.0438 10.1589 11.8284 10.4142L10.4142 12H9.58579L8.17157 10.4142C7.95622 10.1589 7.62246 10 7.26284 10H4.86612L4.19775 12H15.8023L15.1339 10H12.7372ZM10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15Z"></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">Kas</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ Route('logout') }}" class="nav-link">
                    <span class="sidebar-icon">
                      <svg class="icon icon-xs me-2"  viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11.75 9.874C11.75 10.2882 12.0858 10.624 12.5 10.624C12.9142 10.624 13.25 10.2882 13.25 9.874H11.75ZM13.25 4C13.25 3.58579 12.9142 3.25 12.5 3.25C12.0858 3.25 11.75 3.58579 11.75 4H13.25ZM9.81082 6.66156C10.1878 6.48991 10.3542 6.04515 10.1826 5.66818C10.0109 5.29121 9.56615 5.12478 9.18918 5.29644L9.81082 6.66156ZM5.5 12.16L4.7499 12.1561L4.75005 12.1687L5.5 12.16ZM12.5 19L12.5086 18.25C12.5029 18.25 12.4971 18.25 12.4914 18.25L12.5 19ZM19.5 12.16L20.2501 12.1687L20.25 12.1561L19.5 12.16ZM15.8108 5.29644C15.4338 5.12478 14.9891 5.29121 14.8174 5.66818C14.6458 6.04515 14.8122 6.48991 15.1892 6.66156L15.8108 5.29644ZM13.25 9.874V4H11.75V9.874H13.25ZM9.18918 5.29644C6.49843 6.52171 4.7655 9.19951 4.75001 12.1561L6.24999 12.1639C6.26242 9.79237 7.65246 7.6444 9.81082 6.66156L9.18918 5.29644ZM4.75005 12.1687C4.79935 16.4046 8.27278 19.7986 12.5086 19.75L12.4914 18.25C9.08384 18.2892 6.28961 15.5588 6.24995 12.1513L4.75005 12.1687ZM12.4914 19.75C16.7272 19.7986 20.2007 16.4046 20.2499 12.1687L18.7501 12.1513C18.7104 15.5588 15.9162 18.2892 12.5086 18.25L12.4914 19.75ZM20.25 12.1561C20.2345 9.19951 18.5016 6.52171 15.8108 5.29644L15.1892 6.66156C17.3475 7.6444 18.7376 9.79237 18.75 12.1639L20.25 12.1561Z" fill="currentColor"></path> </g></svg>
                    </span>
                    <span class="sidebar-text">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
