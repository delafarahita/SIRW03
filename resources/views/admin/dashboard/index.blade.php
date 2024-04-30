@extends('layouts.app')

@section('content')
    <h1>Sistem Informasi Rukun Warga 03</h1>
    <div class="card-body">
        <h3>Login Sebagai :
            <?php echo Auth::user()->id_level == 1 ? 'RW' : 'RT'; ?></h3>
    </div>
@endsection
