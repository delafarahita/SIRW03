<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            .bg-main{
                background-color: #1F2937
            }
            .btn-oren{
                background-color: #FFA63E
            }
            .btn-oren:hover{
                background-color: transparent;
                border: 1px solid #FFA63E;
            }
            .bg-foto-main{
                background-image: url("{{ asset('asset/img/foto-main.jpg') }}");
                background-repeat: no-repeat;
                background-size: cover;
                height: 100vh; 
                width: 100%;
            }
            .font-s-128{
                font-size: 8rem;
            }
            .font-s-48{
                font-size: 3rem;
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
                        <a href="" class="navbar-brand text-white fw-bolder"><img src="{{asset('asset/img/logorw03.jpg')}}" alt="Logo" width="30" height="30" class="me-2">SIRW03</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                          <a class="nav-link me-5" aria-current="page" href="#"><span class="">ABOUT</span></a>
                          <a class="nav-link me-5" href="#">UMKM</a>
                          <a class="nav-link me-5" href="#">KEGIATAN</a>
                          <a class="nav-link me-5" href="#">KELUHAN</a>
                          <a href="#login" class="btn btn-oren text-white px-3">LOGIN</a>
                        </div>
                    </div>
                </div>
            </nav>       
            <div class="container-fluid bg-foto-main d-flex flex-column justify-content-center align-items-center">
                <div class="text-center mb-4">
                    <h1 class="text-white text-center fw-bolder font-s-128">RW 03</h1>
                    <h3 class="text-white text-center fw-bolder font-s-48">PRIMADONA</h3>
                </div>
                <br><br><br>
                <br><br><br>
                <div class="">
                    <a href="" class="btn btn-oren text-white fw-bolder"><span>Lihat lebih lanjut...</span></a>
                </div>
            </div>
        </main>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
