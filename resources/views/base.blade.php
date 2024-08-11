<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="">

        {{-- ======================== Mon dossier Css =========================== --}}
        <link rel="stylesheet" href="{{ asset('assets/MonAppCSS.css') }}">

    </head>
    <body class="antialiased">

        {{-- ====== Navigation ====== --}}
        @include('navigation.navigation')

        {{-- ======= Container ====== --}}
        @yield('container')

        {{-- ===== Page Employe ===== --}}
        @section('employe')
        @section('ajoutEmploye')

        {{-- ===== Page Pointage ==== --}}
        @section('pointage')

        {{-- ====== Page Conge ====== --}}
        @section('conge')

        {{-- == Mon Dossier Script == --}}
        @include('script')

    </body>
</html>
