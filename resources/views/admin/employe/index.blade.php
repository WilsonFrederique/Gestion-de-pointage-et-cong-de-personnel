@extends('base')

@section('title', "EMPLOYE")

@section('container')

    <div class="mx-auto col-11 mt-3">

        <div class="mb-4">
            <button type="button" class="btn btn-primary">
                <a href="{{ route('admin.employes.create') }}">AJOUTER</a>
            </button>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID Employe</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Poste</th>
                    <th>Salaire</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employes as $employe)
                    <tr class="table-active">
                        <th>{{ $employe->numEmp }}</th>
                        <th>{{ $employe->Nom }}</th>
                        <th>{{ $employe->Prenom }}</th>
                        <th>{{ $employe->poste }}</th>
                        <th>{{ $employe->salaire }}</th>
                        <th>

                            <div class="d-flex justify-content-center gap-3">
                                <button type="button" class="btn btn-success"><a href="{{ route('admin.employes.edit', $employe->numEmp) }}">Modifier</a></button>

                                <button type="button" class="btn btn-danger">Supprimer</button>
                            </div>

                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
