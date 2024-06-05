@extends('layouts.app')

@section('content')
    <h1>Sistem Informasi Rukun Warga 03</h1>
    <div class="card-body">
        <h3>Login Sebagai :
            <?php echo Auth::user()->id_level == 1 ? 'RW' : 'RT'; ?></h3>
    </div>

    <iframe width="600" height="450"
        src="https://lookerstudio.google.com/embed/reporting/4e9b474c-1f2e-4da8-9732-9d06139cef1b/page/UFB2D" frameborder="0"
        style="border:0" allowfullscreen
        sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
@endsection
