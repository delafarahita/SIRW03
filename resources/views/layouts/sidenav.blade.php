{{-- <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-2 pt-3">
      <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
        <div class="collapse-close d-md-none">
          <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
            aria-expanded="true" aria-label="Toggle navigation">
            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
            </svg>
          </a>
        </div>
      </div>
      <ul class="nav flex-column pt-3 pt-md-0">
        <li class="nav-item">
          <a href="/dashboard" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon me-3">
              <img src="{{asset('assets/img/logorw03.jpg')}}" alt="Logo" width="30" height="30" class="me-2 rounded-circle">
            </span>
            <span class="mt-1 ms-1 sidebar-text">
              SIRW 03
            </span>
          </a>
        </li>
      <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
        <li class="nav-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
          <a href="/dashboard" class="nav-link">
            <span class="sidebar-icon"> <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
              </svg></span></span>
            <span class="sidebar-text">Dashboard</span>
          </a>
        </li>


        <li class="nav-item {{ Request::segment(1) == 'data_penduduk' ? 'active' : '' }}">
          <a href="{{ url('/DataPenduduk') }}" class="nav-link">
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                <path fill-rule="evenodd"
                  d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                  clip-rule="evenodd"></path>
              </svg></span>
            <span class="sidebar-text">Data Penduduk</span>
          </a>
        </li>
        <li class="nav-item {{ Request::segment(1) == 'bantuan_sosial' ? 'active' : '' }}">
          <a href="/transactions" class="nav-link">
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                <path fill-rule="evenodd"
                  d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                  clip-rule="evenodd"></path>
              </svg></span>
            <span class="sidebar-text">Bantuan Sosial</span>
          </a>
        </li>
        <li class="nav-item {{ Request::segment(1) == 'umkm' ? 'active' : '' }}">
          <a href="{{url('/umkm')}}" class="nav-link">
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                <path fill-rule="evenodd"
                  d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                  clip-rule="evenodd"></path>
              </svg></span>
            <span class="sidebar-text">UMKM</span>
          </a>
        </li>
        <li class="nav-item {{ Request::segment(1) == 'keluhan' ? 'active' : '' }}">
            <a href="{{url('/keluhan')}}" class="nav-link">
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                <path fill-rule="evenodd"
                  d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                  clip-rule="evenodd"></path>
              </svg></span>
            <span class="sidebar-text">Pengaduan</span>
          </a>
        </li>
        <li class="nav-item {{ Request::segment(1) == 'kegiatan' ? 'active' : '' }}">
            <a href="{{url('/Kegiatan')}}" class="nav-link">
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                <path fill-rule="evenodd"
                  d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                  clip-rule="evenodd"></path>
              </svg></span>
            <span class="sidebar-text">Informasi Kegiatan</span>
          </a>
        </li>
      </ul>
    </div>
  </nav> --}}

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
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('data_penduduk.index')}}">Data Penduduk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('data_kk.index')}}">Data KK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Data RT</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ $activeMenu == 'bantuan_sosial' ? 'active' : '' }}">
                <a href="{{ route('bantuan_sosial.index')}}" class="nav-link">
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
            </li>

            <li class="nav-item {{ $activeMenu == 'umkm' ? 'active' : '' }}">
                <a href="{{ route('umkm.index') }}" class="nav-link">
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
            </li>

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
                    <span class="sidebar-text">Pengaduan</span>
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


            <li class="nav-item {{ $activeMenu == 'inventaris' ? 'active' : '' }}">
                <a href="{{ Route('inventaris.index') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d=""></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">Inventaris</span>
                </a>
            </li>

            <li class="nav-item {{ $activeMenu == 'kas' ? 'active' : '' }}">
                <a href="{{ Route('kas.index') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d=""></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">Kas</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
