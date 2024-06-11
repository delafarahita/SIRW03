<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets/img/logorw03.jpg') }}">
    <title>SIRW03</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .bg-main {
            background-color: #1F2937
        }

        .bg-font-primary {
            color: #1F2937;
        }

        .bg-font-oren {
            color: white;
            text-shadow: -2px -2px 0 #1F2937, 2px -2px 0 #1F2937, -2px 2px 0 #1F2937, 2px 2px 0 #1F2937;
        }

        .btn-oren {
            background-color: #FFA63E
        }

        .btn-oren-keluhan {
            background-color: #FFA63E;
            border: 1px solid #1F2937;

        }

        .btn-oren-keluhan:hover {
            background-color: #1F2937;
            border: 1px solid #FFA63E;
        }

        .btn-oren:hover {
            background-color: transparent;
            border: 1px solid #FFA63E;
        }

        .bg-foto-main {
            background-image: url("{{ asset('assets/img/landing-image.png') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 100vh;
            width: 100%;
            /* -webkit-filter: blur(2px); */
        }

        .font-s-128 {
            font-size: 8rem;
        }

        .font-s-96 {
            font-size: 6rem;
        }

        .font-s-48 {
            font-size: 3rem;
        }

        .big-img {
            height: auto;
            /* width: 900px; */
            max-width: 100%;
            margin-bottom: 20px;
        }

        .img-uniform-kegiatan {
            width: 400px;
            height: 250px;
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .overlay {
            position: relative;
            /* Atur tinggi overlay sesuai kebutuhan */
            height: 200px;
            overflow: hidden;
        }

        .overlay .overflow-auto {
            max-height: 100px;
            /* Atur tinggi maksimal deskripsi */
            overflow-y: auto;
            /* Aktifkan scroll vertikal */
        }

        .img-uniform-umkm {
            width: 1000px;
            height: 600px;
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .hovereffect {
            height: auto;
            float: right;
            overflow: hidden;
            position: relative;
            text-align: center;
            cursor: default;
            border-radius: 5px;
        }

        .hovereffect .overlay {
            width: 100%;
            height: auto;
            position: absolute;
            overflow: hidden;
            top: 0;
            left: 0;
            opacity: 0;
            background-color: rgba(0, 0, 0, 0.5);
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out
        }

        .hovereffect img {
            display: block;
            position: relative;
            -webkit-transition: all .4s linear;
            transition: all .4s linear;
        }

        .hovereffect h2 {
            text-transform: uppercase;
            color: #fff;
            text-align: center;
            position: relative;
            font-size: 17px;
            background: #1F2937;
            -webkit-transform: translatey(-100px);
            -ms-transform: translatey(-100px);
            transform: translatey(-100px);
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            padding: 10px;
        }

        .hovereffect:hover img {
            -webkit-filter: blur(2px);
            -ms-transform: scale(1.2);
            -webkit-transform: scale(1.2);
            transform: scale(1.2);
        }

        .hovereffect:hover .overlay {
            opacity: 1;
            filter: alpha(opacity=100);
        }

        .hovereffect:hover h2,
        .hovereffect:hover a.info {
            opacity: 1;
            filter: alpha(opacity=100);
            -ms-transform: translatey(0);
            -webkit-transform: translatey(0);
            transform: translatey(0);
        }

        .hovereffect:hover a.info {
            -webkit-transition-delay: .2s;
            transition-delay: .2s;
        }


        @media (max-width: 576px) {
            .font-s-128 {
                font-size: 4rem;
                /* Adjusted font size for smaller screens */
            }

            .font-s-48 {
                font-size: 2rem;
                /* Adjusted font size for smaller screens */
            }

            .img-uniform-umkm {
                width: 400px;
                height: 250px;
                max-width: 100%;
                max-height: 100%;
                object-fit: cover;
            }

        }

        @media (min-width: 768px && max-width: 900px) {
            .img-uniform-umkm {
                width: 600px;
                height: 350px;
                max-width: 100%;
                max-height: 100%;
                object-fit: cover;
            }
        }
    </style>

</head>

<body class="antialiased">
    {{-- navbar --}}
    <main>
        <nav class="navbar sticky-top navbar-expand-lg bg-main "data-bs-theme="dark">
            <div class="container-fluid">
                <div class="mx-3 d-flex justify-content-between align-items-center">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="#" class="navbar-brand text-white fw-bolder"><img
                            src="{{ asset('assets/img/logorw03.jpg') }}" alt="Logo" width="30" height="30"
                            class="me-2 rounded-circle">SIRW03</a>
                </div>
                {{-- <div class="mx-3">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="#" class="navbar-brand text-white fw-bolder"><img
                            src="{{ asset('assets/img/logorw03.jpg') }}" alt="Logo" width="30" height="30"
                            class="me-2 rounded-circle">SIRW03</a>
                </div> --}}
                <div class="collapse navbar-collapse justify-content-end container-fluid" id="navbarNav">
                    <div class="navbar-nav">
                        <a class="nav-link me-lg-5 text-center" aria-current="page" href="#"><span
                                class="">BERANDA</span></a>
                        <a class="nav-link me-lg-5 text-center" href="#umkm">UMKM</a>
                        <a class="nav-link me-lg-5 text-center" href="#kegiatan">KEGIATAN</a>
                        <a class="nav-link me-lg-5 text-center" href="#faq">FAQ</a>
                        <a class="nav-link me-lg-5 text-center" href="#keluhan">LAPORAN</a>
                        <a class="nav-link me-lg-5 text-center" href="#kontak">KONTAK</a>
                        <a href="{{ route('login') }}" class="btn btn-oren text-white px-3">LOGIN</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid bg-foto-main d-flex flex-column justify-content-center align-items-center mb-5">
            <div class="text-center mb-4">
                <h1 class=" text-center fw-bolder font-s-128 bg-font-oren">RW 03</h1>
                <h3 class=" text-center fw-bolder font-s-48 bg-font-oren">PRIMADONA</h3>
            </div>
            <br><br><br>
            <br><br><br>
            <div class="">
                <a href="#umkm" class="btn btn-oren text-white fw-bolder"><span>Lihat lebih lanjut...</span></a>
            </div>
        </div>

        {{-- umkm  --}}
        <div class="container my-5" id="umkm">
            <div>
                <h1 class="bg-font-primary text-center fw-bold font-s-48 mb-3">UMKM</h1>
            </div>
            <div id="carouselExampleAutoPlaying" class="carousel slide my-3" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($umkm as $index => $item)
                        <button type="button" data-bs-target="#carouselExampleAutoPlaying"
                            data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                            aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($umkm as $index => $item)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/foto_umkm/' . $item->foto_umkm) }}"
                                class="img-responsive img-uniform-umkm w-100 d-block rounded"
                                alt="slide {{ $index + 1 }}">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $item->nama_umkm }}</h5>
                                <p>{{ $item->deskripsi_umkm }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoPlaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoPlaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>


        {{-- kegiatan  --}}
        <div class="container my-5" id="kegiatan">
            <div>
                <h1 class="bg-font-primary font-s-48 fw-bold text-center mb-3">INFO KEGIATAN</h1>
            </div>
            <div class="container-fluid">
                <div class="row">
                    @foreach ($kegiatan as $item)
                        <div class="col-lg-4">
                            <div class="col">
                                <div class="col hovereffect my-2">
                                    <img src="{{ asset('storage/image_path/'.$item->image_path) }}" alt="{{$item->nama}}"
                                        class="img-uniform-kegiatan mb-3 rounded img-fluid">
                                    <div class="overlay">
                                        <h2 class="fw-bolder">{{$item->nama}}</h2>
                                        <p class="text-white overflow-auto">{{$item->deskripsi}}</p>
                                        <p class="text-white">📅{{$item->tanggal}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation example ">
                    <ul class="pagination d-flex justify-content-center">
                      {{-- Previous Page Link --}}
                      @if ($kegiatan->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                      @else
                        <li class="page-item"><a class="page-link" href="{{ $kegiatan->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                      @endif

                      {{-- Pagination Elements --}}
                      @foreach ($kegiatan->getUrlRange(1, $kegiatan->lastPage()) as $page => $url)
                        @if ($page == $kegiatan->currentPage())
                          <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                          <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                      @endforeach

                      {{-- Next Page Link --}}
                      @if ($kegiatan->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $kegiatan->nextPageUrl() }}" rel="next">&raquo;</a></li>
                      @else
                        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                      @endif
                    </ul>
                  </nav>
            </div>
        </div>
        <div id="faq" class="container-fluid mt-5 p-5">
            <div class="container">
                <div class="row pt-5 bg-body-tertiary rounded-2 px-2">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4 mb-2">
                        <h1 class="fw-bold font-s-48 bg-font-primary">Pertanyaan yang Sering Diajukan (FAQ)</h1>
                    </div>
                    <div class="col-lg-4 my-1">
                        <p class="d-inline-flex gap-1">
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse"
                                href="#collapseExample2" role="button" aria-expanded="false"
                                aria-controls="collapseExample">
                                Apa yang perlu disiapkan untuk pembuatan surat pengantar RW?
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample2">
                            <div class="text-black">
                                <ul>
                                    <li>Fotokopi Kartu Keluarga (KK) terbaru</li>
                                    <li>Fotokopi Akta Kelahiran (untuk KTP baru)</li>
                                    <li>Fotokopi Surat Nikah (jika sudah menikah)</li>
                                    <li>Fotokopi KTP lama (jika ada perubahan data atau perpanjangan)</li>
                                    <li>Pas foto (jika diperlukan)</li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <p class="d-inline-flex gap-1">
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse"
                                href="#collapseExample1" role="button" aria-expanded="false"
                                aria-controls="collapseExample">
                                Apa yang harus disiapkan untuk membuat KTP?
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample1">
                            <div class="" style="max-height: 150px;">
                                <ul>
                                    <li>Fotokopi Kartu Keluarga (KK)</li>
                                    <li>Fotokopi Akta kelahiran</li>
                                    <li>Fotokopi surat nikah (jika sudah menikah)</li>
                                    <li>Surat pengantar dari RT/RW</li>
                                    <li>Pas foto berwarna</li>
                                </ul>
                            </div>
                        </div>
                        <hr class="bg-white">
                        <p class="d-inline-flex gap-1">
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse"
                                href="#collapseExample3" role="button" aria-expanded="false"
                                aria-controls="collapseExample">
                                Perpindahan Penduduk (Datang & Keluar)
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample3">
                            <div class="text-black">
                                <ul>
                                    <li>Pindah masuk bagi yang belum mempunyai surat pindah (perbantuan pindah antar dinas)</li>
                                    <li>Pindah masuk bagi yang sudah mempunyai surat</li>
                                    <li>Fotokopi Surat Nikah (jika sudah menikah)</li>
                                    <li>Fotokopi KTP lama (jika ada perubahan data atau perpanjangan)</li>
                                    <li>Pas foto (jika diperlukan)</li>
                                </ul>
                            </div>
                        </div>
                        <hr class="bg-white">
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5 p-5 " id="keluhan">
            <div class="container text-center bg-main rounded ">
                <div class="my-3 py-3">
                    <h1 class="text-white fw-bold font-s-48">LAPORAN</h1>
                </div>
                <div class="pb-3">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-success">{{ session('error') }}</div>
                    @endif
                    <form class="mx-1 mx-lg-5" action="{{ route('store_keluhan') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating">
                            <input type="text"
                                class="form-control my-2 @error('nama_penduduk') is-invalid @enderror"
                                name="nama_penduduk" id="floatingInput" placeholder="">
                            <label for="floatingInput">Nama</label>
                            @error('nama_penduduk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control my-2 @error('rt') is-invalid @enderror"
                                name="rt" id="floatingInput" placeholder="">
                            <label for="floatingInput">RT</label>
                            @error('rt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control @error('keluhan') is-invalid @enderror" placeholder="" name="keluhan"
                                id="floatingTextarea" style="height: 100px"></textarea>
                            <label for="floatingTextarea">Isi Laporan</label>
                            @error('keluhan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating">
                            {{-- <textarea class="form-control @error('foto_peng') is-invalid @enderror" placeholder="" name="keluhan"
                            id="floatingTextarea" style="height: 100px"></textarea> --}}
                            <input type="file" class="form-control my-2 @error('foto') is-invalid @enderror"
                                id="foto" name="foto" placeholder="Upload Foto">
                            <label for="foto">Foto Laporan</label>
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="my-2">
                            <button type="submit" class="btn btn-oren-keluhan text-white px-5">KIRIM</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer>
            <div class="container-fluid bg-main text-secondary py-3" id="kontak">
                <div class="row">
                    <div class="col-lg-4 text-center text-lg-end">
                        <p class="text-center text-lg-end fw-bolder">Kontak</p>
                        <div>

                            <a class="text-decoration-none text-secondary" target="_blank"
                                href="https://wa.me/+628563354473">
                                <svg class="me-1" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M6.014 8.00613C6.12827 7.1024 7.30277 5.87414 8.23488 6.01043L8.23339 6.00894C9.14051 6.18132 9.85859 7.74261 10.2635 8.44465C10.5504 8.95402 10.3641 9.4701 10.0965 9.68787C9.7355 9.97883 9.17099 10.3803 9.28943 10.7834C9.5 11.5 12 14 13.2296 14.7107C13.695 14.9797 14.0325 14.2702 14.3207 13.9067C14.5301 13.6271 15.0466 13.46 15.5548 13.736C16.3138 14.178 17.0288 14.6917 17.69 15.27C18.0202 15.546 18.0977 15.9539 17.8689 16.385C17.4659 17.1443 16.3003 18.1456 15.4542 17.9421C13.9764 17.5868 8 15.27 6.08033 8.55801C5.97237 8.24048 5.99955 8.12044 6.014 8.00613Z"
                                            fill="#a3a3a3"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 23C10.7764 23 10.0994 22.8687 9 22.5L6.89443 23.5528C5.56462 24.2177 4 23.2507 4 21.7639V19.5C1.84655 17.492 1 15.1767 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23ZM6 18.6303L5.36395 18.0372C3.69087 16.4772 3 14.7331 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C11.0143 21 10.552 20.911 9.63595 20.6038L8.84847 20.3397L6 21.7639V18.6303Z"
                                            fill="#a3a3a3"></path>
                                    </g>
                                </svg>
                                Whatsapp
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center text-lg-center my-3 m-lg-0">
                        <p class="text-center fw-bolder">Lokasi</p>
                        <a href="https://maps.app.goo.gl/ovt2ioGYrTvcyRdk9"
                            class="text-decoration-none text-secondary" target="_blank">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                style="width: 20px; height: 20px;">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g id="Navigation / Map_Pin">
                                        <g id="Vector">
                                            <path
                                                d="M5 9.92285C5 14.7747 9.24448 18.7869 11.1232 20.3252C11.3921 20.5454 11.5281 20.6568 11.7287 20.7132C11.8849 20.7572 12.1148 20.7572 12.271 20.7132C12.472 20.6567 12.6071 20.5463 12.877 20.3254C14.7557 18.7871 18.9999 14.7751 18.9999 9.9233C18.9999 8.08718 18.2625 6.32605 16.9497 5.02772C15.637 3.72939 13.8566 3 12.0001 3C10.1436 3 8.36301 3.7295 7.05025 5.02783C5.7375 6.32616 5 8.08674 5 9.92285Z"
                                                stroke="#a3a3a3" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M10 9C10 10.1046 10.8954 11 12 11C13.1046 11 14 10.1046 14 9C14 7.89543 13.1046 7 12 7C10.8954 7 10 7.89543 10 9Z"
                                                stroke="#a3a3a3" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            Jl. Mergosono RW 03, Kota Malang, Jawa Timur.
                        </a>
                    </div>
                    <div class="col-lg-4 text-center text-lg-start">
                        <p class="text-center text-lg-start fw-bolder">Ikuti Kami</p>
                        <p>
                            <svg style="width: 20px; height: 20px;" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z"
                                        fill="#a3a3a3"></path>
                                    <path
                                        d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228 17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19 5.44772 18.5523 5 18 5Z"
                                        fill="#a3a3a3"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.65396 4.27606C1 5.55953 1 7.23969 1 10.6V13.4C1 16.7603 1 18.4405 1.65396 19.7239C2.2292 20.8529 3.14708 21.7708 4.27606 22.346C5.55953 23 7.23969 23 10.6 23H13.4C16.7603 23 18.4405 23 19.7239 22.346C20.8529 21.7708 21.7708 20.8529 22.346 19.7239C23 18.4405 23 16.7603 23 13.4V10.6C23 7.23969 23 5.55953 22.346 4.27606C21.7708 3.14708 20.8529 2.2292 19.7239 1.65396C18.4405 1 16.7603 1 13.4 1H10.6C7.23969 1 5.55953 1 4.27606 1.65396C3.14708 2.2292 2.2292 3.14708 1.65396 4.27606ZM13.4 3H10.6C8.88684 3 7.72225 3.00156 6.82208 3.0751C5.94524 3.14674 5.49684 3.27659 5.18404 3.43597C4.43139 3.81947 3.81947 4.43139 3.43597 5.18404C3.27659 5.49684 3.14674 5.94524 3.0751 6.82208C3.00156 7.72225 3 8.88684 3 10.6V13.4C3 15.1132 3.00156 16.2777 3.0751 17.1779C3.14674 18.0548 3.27659 18.5032 3.43597 18.816C3.81947 19.5686 4.43139 20.1805 5.18404 20.564C5.49684 20.7234 5.94524 20.8533 6.82208 20.9249C7.72225 20.9984 8.88684 21 10.6 21H13.4C15.1132 21 16.2777 20.9984 17.1779 20.9249C18.0548 20.8533 18.5032 20.7234 18.816 20.564C19.5686 20.1805 20.1805 19.5686 20.564 18.816C20.7234 18.5032 20.8533 18.0548 20.9249 17.1779C20.9984 16.2777 21 15.1132 21 13.4V10.6C21 8.88684 20.9984 7.72225 20.9249 6.82208C20.8533 5.94524 20.7234 5.49684 20.564 5.18404C20.1805 4.43139 19.5686 3.81947 18.816 3.43597C18.5032 3.27659 18.0548 3.14674 17.1779 3.0751C16.2777 3.00156 15.1132 3 13.4 3Z"
                                        fill="#a3a3a3"></path>
                                </g>
                            </svg>
                            Instagram
                        </p>
                    </div>
                </div>
                <p class="text-center">&copy; <span id="year"></span> All Rights Reserved - SIRW03 Team </p>
            </div>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script>
        // Mendapatkan tahun saat ini
        var year = new Date().getFullYear();

        // Menetapkan tahun ke elemen dengan id "year"
        document.getElementById("year").innerHTML = year;
    </script>

</body>

</html>
