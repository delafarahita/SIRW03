<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>

</head>

<body style="background-color: #1F2937">
    <div class="row vh-100 w-100 ">
        <div class="col d-none d-md-block">
            <img class="w-100 h-100 object-fit-cover" src="{{asset('assets/img/login-image2.jpg')}}" />
        </div>
        <div class="col d-flex justify-content-center align-items-center bg">
            <div class="w-75 w-md-50">
                <h3 class="mb-3 text-center text-white">LOGIN</h3>
                @error('login_gagal')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <span class="alert-inner--text"><strong>Warning!</strong>{{ $message }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
                <form method="POST" action="{{url('proses_login')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label text-white ">USERNAME</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="masukan username" value="{{ old('username') }}">
                    </div>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="">
                        <label for="password" class="form-label text-white ">PASSWORD</label>
                        <input type="password" class="form-control @error('username') is-invalid @enderror" id="password" name="password" value="{{old('password')}}" placeholder="masukan password">
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="mb-3">
                        <a href="#" class="text-white"
                            style="text-decoration: none; font-style: italic; font-size: 0.8rem;">Lupa Password?</a>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <div class="d-grid gap-2 col-6 justify-content-center">
                            <button type="submit" class="btn btn-warning text-white fw-bold"
                                >SUBMIT</button>
                            <a href="{{url('/')}}" class="btn btn-danger">KEMBALI</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
