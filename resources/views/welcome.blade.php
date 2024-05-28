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

        .btn-oren {
            background-color: #FFA63E
        }

        .btn-oren:hover {
            background-color: transparent;
            border: 1px solid #FFA63E;
        }

        .bg-foto-main {
            background-image: url("{{ asset('assets/img/foto-main.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            width: 100%;
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
        .img-uniform-umkm {
            width: 1100px;          
            height: 800px;         
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

            .img-uniform-umkm{
                width: 400px;          
                height: 250px;         
                max-width: 100%;     
                max-height: 100%;    
                object-fit: cover;
            }
            
        }

        @media (min-width: 768px && max-width: 900px){
            .img-uniform-umkm{
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
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="#" class="navbar-brand text-white fw-bolder"><img src="{{ asset('assets/img/logorw03.jpg') }}" alt="Logo" width="30" height="30" class="me-2 rounded-circle">SIRW03</a>
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
                                class="">ABOUT</span></a>
                        <a class="nav-link me-lg-5 text-center" href="#umkm">UMKM</a>
                        <a class="nav-link me-lg-5 text-center" href="#kegiatan">KEGIATAN</a>
                        <a class="nav-link me-lg-5 text-center" href="#keluhan">LAPORAN</a>
                        <a href="{{ route('login') }}" class="btn btn-oren text-white px-3">LOGIN</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid bg-foto-main d-flex flex-column justify-content-center align-items-center mb-5">
            <div class="text-center mb-4">
                <h1 class="text-white text-center fw-bolder font-s-128">RW 03</h1>
                <h3 class="text-white text-center fw-bolder font-s-48">PRIMADONA</h3>
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
                        <button type="button" data-bs-target="#carouselExampleAutoPlaying" data-bs-slide-to="{{ $index }}"
                            class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($umkm as $index => $item)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset($item->foto_umkm) }}" class="img-responsive img-uniform-umkm w-100 d-block rounded" alt="slide {{ $index + 1 }}">
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
                                    <img src="{{ asset($item->image_path) }}" alt="{{$item->nama}}"
                                        class="img-uniform-kegiatan mb-3 rounded img-fluid">
                                    <div class="overlay">
                                        <h2 class="fw-bolder">{{$item->nama}}</h2>
                                        <p class="text-white">{{$item->deskripsi}}</p>
                                        <p class="text-white">📅{{$item->tanggal}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="container-fluid mt-5 p-5 bg-main" id="keluhan">
            <div class="container text-center">
                <div class="my-3">
                    <h1 class="text-white fw-bold font-s-48">LAPORAN</h1>
                </div>
                <div class="">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-success">{{ session('error') }}</div>
                    @endif
                    <form action="{{ route('store_keluhan') }}" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input type="text"
                                class="form-control my-2 @error('nama_penduduk') is-invalid @enderror"
                                name="nama_penduduk" id="floatingInput" placeholder="">
                            <label for="floatingInput">Nama</label>
                        </div>
                        @error('nama_penduduk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-floating">
                            <input type="text" class="form-control my-2 @error('rt') is-invalid @enderror"
                                name="rt" id="floatingInput" placeholder="">
                            <label for="floatingInput">RT</label>
                        </div>
                        @error('rt')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-floating">
                            <textarea class="form-control @error('keluhan') is-invalid @enderror" placeholder="" name="keluhan"
                                id="floatingTextarea" style="height: 100px"></textarea>
                            <label for="floatingTextarea">Isi Laporan</label>
                        </div>
                        @error('keluhan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-floating">
                            {{-- <textarea class="form-control @error('foto_peng') is-invalid @enderror" placeholder="" name="keluhan"
                            id="floatingTextarea" style="height: 100px"></textarea> --}}
                            <input type="file" class="form-control my-2 @error('berkas') is-invalid @enderror" id="berkas" name="berkas" placeholder="Upload Foto">
                            <label for="berkas">Foto Laporan</label>
                        </div>
                        @error('berkas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                        <div class="my-2">
                            <button type="submit" class="btn btn-oren text-white px-5">KIRIM</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    
    
</body>

</html>
