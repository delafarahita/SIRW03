@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bantuan Sosial</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .container {
                text-align: center;
            }

            .button-container {
                margin-top: 20px;
            }

            .button {
                width: 200px;
                height: 50px;
                margin: 10px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
            }

            .button:hover {
                background-color: #0056b3;
            }

            .border-main{
                border-left: 10px solid #1F2937;
            }

            
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row align-items-center">
                <div class="col bg-white rounded p-3 mx-2 border-main">
                    <a href="{{url('admin/data_kriteria')}}">Data Kriteria</a>
                </div>
                <div class="col bg-white rounded p-3 mx-2 border-main">
                    <a href="{{url('admin/data_alternatif')}}">Data Alternatif</a>
                </div>
            </div>
            <div class="row align-items-center my-2">
                <div class="col bg-white rounded p-3 mx-2 border-main">
                    <a href="">Data Perhitungan</a>
                </div>
                <div class="col bg-white rounded p-3 mx-2 border-main">
                    <a href="">Data Hasil Akhir</a>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
