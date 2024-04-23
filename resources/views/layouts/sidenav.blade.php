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
                            <a class="nav-link" href="{{ route('data_rt.index')}}">Data RT</a>
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
