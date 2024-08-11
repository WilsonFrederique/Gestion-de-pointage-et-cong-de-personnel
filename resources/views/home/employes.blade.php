@extends('base')

@section('title', "EMPLOYE")

@section('container')

    {{-- <h1>PAGE EMPLOYES</h1> --}}

    <ul>
        @foreach ($employes as $employe)
            <li>{{ $employe->Nom }}</li>
        @endforeach
    </ul>

    <a href="{{ route('app_create') }}">AJOUT</a>

@endsection
