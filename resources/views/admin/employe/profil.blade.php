@extends('base')

@section('title', "PROFIL DE L\'EMPLOYE")

@section('container')

    <ul>
        <li>{{ $employe->numEmp }}</li>
        <li>{{ $employe->Nom }}</li>
        <li>{{ $employe->Prenom }}</li>
        <li>{{ $employe->poste }}</li>
        <li>{{ $employe->salaire }}</li>
    </ul>

@endsection
