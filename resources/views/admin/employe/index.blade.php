@extends('base')

@section('title', "EMPLOYE")

@section('container')

    <div class="mx-auto col-11 mt-3">

        <div class="mb-4">
            <button type="button" class="btn btn-primary">
                <a class="text-white" href="{{ route('admin.employes.create') }}">AJOUTER</a>
            </button>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr class="text-white">
                    <th>ID EMPLOYE</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>POSTE</th>
                    <th>SALAIRE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employes as $employe)
                    <tr class="table-active">
                        <th class="text-secondary">{{ $employe->numEmp }}</th>
                        <th class="text-secondary">{{ $employe->Nom }}</th>
                        <th class="text-secondary">{{ $employe->Prenom }}</th>
                        <th class="text-secondary">{{ $employe->poste }}</th>
                        <th class="text-secondary">{{ $employe->salaire }}</th>
                        <th>

                            <div class="d-flex justify-content-center gap-3">
                                <button type="button" class="btn btn-success"><a class="text-white" href="{{ route('admin.employes.edit', $employe->numEmp) }}">Modifier</a></button>

                                <button type="button" class="btn btn-danger">Supprimer</button>
                            </div>

                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
