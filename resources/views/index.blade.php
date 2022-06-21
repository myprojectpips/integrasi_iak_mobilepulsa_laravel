<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    
    {{-- Compiled Style --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>

    <script src="{{ asset('asset/js/formatRupiah.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
</head>
<body>
    <div class="container" style="margin-top: 100px;">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.pulsa') }}">Pulsa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.emoney') }}">E-Money</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.checkStatus') }}">Check Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.dataOrder') }}">Data Order</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="card mx-auto mt-3">
            <div class="card-body">
                @yield('content')
            </div>
        </div>

        {{-- 
            @extends('index')
            @section('title', __('Integration Laravel - Mobilepulsa | Pulsa'))

            @section('content')
            <div class="container-fluid">
                Welcome
            </div>
            @endsection

            @section('script')
                
            @endsection

            @section('modal')
                
            @endsection 
        --}}


        @yield('modal')
    </div>
</body>

@yield('script')
</html>