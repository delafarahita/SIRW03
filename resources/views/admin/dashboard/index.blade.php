@extends('layouts.app')

@section('content')
    <h1>Sistem Informasi Rukun Warga 03</h1>
    <div class="card-body">
        <h3>Login Sebagai :
            <?php echo Auth::user()->id_level == 1 ? 'RW' : 'RT'; ?></h3>
    </div>

    <h4>Jumlah Penduduk Menurut Jenis Kelamin</h4>
    <iframe width="600" height="400"
        src="https://lookerstudio.google.com/embed/reporting/6c48cf5d-a032-4416-8149-828aae71cd4a/page/tiJ2D" frameborder="0"
        style="border:0" allowfullscreen
        sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
@endsection
