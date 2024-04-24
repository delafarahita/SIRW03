<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SIRW03</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            .bg-main{
                background-color: #1F2937
            }
            .bg-font-primary{
                color: #1F2937;
            }
            .btn-oren{
                background-color: #FFA63E
            }
            .btn-oren:hover{
                background-color: transparent;
                border: 1px solid #FFA63E;
            }
            .bg-foto-main{
                background-image: url("{{ asset('assets/img/foto-main.jpg') }}");
                background-repeat: no-repeat;
                background-size: cover;
                height: 100vh;
                width: 100%;
            }
            .font-s-128{
                font-size: 8rem;
            }
            .font-s-96{
                font-size: 6rem;
            }
            .font-s-48{
                font-size: 3rem;
            }

            .big-img{
                height: auto;
                /* width: 900px; */
                max-width: 100%;
                margin-bottom: 20px;
            }
            .small-img {
                height: 230px;
                max-width: 100%;
            }
            
            .hovereffect {
            height:auto;
            float: right;;
            overflow:hidden;
            position:relative;
            text-align:center;
            cursor:default;
            }

            .hovereffect .overlay {
            height:auto;
            position:absolute;
            overflow:hidden;
            top:0;
            left:0;
            opacity:0;
            background-color:rgba(0,0,0,0.5);
            -webkit-transition:all .4s ease-in-out;
            transition:all .4s ease-in-out
            }

            .hovereffect img {
            display:block;
            position:relative;
            -webkit-transition:all .4s linear;
            transition:all .4s linear;
            }

            .hovereffect h2 {
            text-transform:uppercase;
            color:#fff;
            text-align:center;
            position:relative;
            font-size:17px;
            background:rgba(0,0,0,0.6);
            -webkit-transform:translatey(-100px);
            -ms-transform:translatey(-100px);
            transform:translatey(-100px);
            -webkit-transition:all .2s ease-in-out;
            transition:all .2s ease-in-out;
            padding:10px;
            }

            .hovereffect:hover img {
            -ms-transform:scale(1.2);
            -webkit-transform:scale(1.2);
            transform:scale(1.2);
            }

            .hovereffect:hover .overlay {
            opacity:1;
            filter:alpha(opacity=100);
            }

            .hovereffect:hover h2,.hovereffect:hover a.info {
            opacity:1;
            filter:alpha(opacity=100);
            -ms-transform:translatey(0);
            -webkit-transform:translatey(0);
            transform:translatey(0);
            }

            .hovereffect:hover a.info {
            -webkit-transition-delay:.2s;
            transition-delay:.2s;
            }


            @media (max-width: 576px) {
                .font-s-128 {
                    font-size: 4rem; /* Adjusted font size for smaller screens */
                }
                .font-s-48 {
                    font-size: 2rem; /* Adjusted font size for smaller screens */
                }
            }

        </style>

    </head>
    <body class="antialiased">
        {{-- navbar --}}
        <main>
            <nav class="navbar sticky-top navbar-expand-lg bg-main "data-bs-theme="dark">
                <div class="container-fluid">
                    <div class="mx-3">
                        <a href="" class="navbar-brand text-white fw-bolder"><img src="{{asset('assets/img/logorw03.jpg')}}" alt="Logo" width="30" height="30" class="me-2 rounded-circle">SIRW03</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                          <a class="nav-link me-5" aria-current="page" href="#"><span class="">ABOUT</span></a>
                          <a class="nav-link me-5" href="#umkm">UMKM</a>
                          <a class="nav-link me-5" href="#kegiatan">KEGIATAN</a>
                          <a class="nav-link me-5" href="#keluhan">KELUHAN</a>
                          <a href="{{route('login')}}" class="btn btn-oren text-white px-3">LOGIN</a>
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
                <div id="carouselExampleIndicators" class="carousel slide my-3 data-bs-ride="true">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{('assets/img/umkm1.avif')}}" class="d-block w-100" style="height: 600px" alt="slide 1">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>UMKM 1</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="{{('assets/img/umkm2.jpg')}}" class="d-block w-100" style="height: 600px" alt="slide 2">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>UMKM 2</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="{{('assets/img/umkm3.jpg')}}" class="d-block w-100" style="height: 600px" alt="slide 3">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>UMKM 3</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
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
                        <div class="col-lg-8 hovereffect">
                            <img src="{{asset('assets/img/kegiatan2.jpg')}}" alt="Activity 1" class="big-img img-responsive mb-3">
                            <div class="overlay text-center">
                                <h2 >Minggu Bersih</h2>
                            </div>                    
                        </div>
                        <div class="col-lg-4">
                            <div class="col">
                                <div class="col hovereffect">
                                    <img src="{{asset('assets/img/kegiatan1.jpg')}}" alt="Activity 2" class="small-img mb-3">
                                    <div class="overlay">
                                        <h2>Pemungutan Suara</h2>
                                    </div>
                                </div>
                                <div class="col hovereffect">
                                    <img src="{{asset('assets/img/kegiatan4.jpg')}}" alt="Activity 3" class="small-img mb-3">
                                    <div class="overlay">
                                        <h2>Pembersihan TPU</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                <div class="container-fluid mt-5 p-5 bg-main" id="keluhan">
                    <div class="container text-center">
                        <div class="my-3">
                            <h1 class="text-white fw-bold font-s-48">KELUHAN</h1>
                        </div>
                        <div class="">
                            <form action="{{route('keluhan.store')}}" method="POST">
                                <div class="form-floating">
                                    <input type="text" class="form-control my-2" name="nama_penduduk" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Nama</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control my-2" name="rt" id="floatingInput" placeholder="" >
                                    <label for="floatingInput">RT</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="" name="keluhan" id="floatingTextarea" style="height: 200px"></textarea>
                                    <label for="floatingTextarea">Pengaduan</label>
                                </div>
                                <div class="my-2">
                                    <button type="submit" class="btn btn-oren text-white px-5">KIRIM</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
