
@extends('base')

@section('title', "LISTE DES EMPLOYÉS NON EN CONGÉ")

@section('container')

    <div class="mx-auto col-11 mt-3">

        <div class="d-flex justify-content-between align-items-center mb-4 p-1">
            <button type="button" class="btn btn-dark btn-border-white">
                <a class="text-white text-decoration-none" href="{{ route('admin.employes.index') }}">TOUS LES EMPLOYÉS</a>
            </button>

            <h1 class="custom-h1">LISTE DES EMPLOYÉS NON EN CONGÉ</h1>
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
                @foreach ($query2s as $query2)
                    <tr class="table-active">
                        <th class="text-secondary">{{ $query2->numEmp }}</th>
                        <th class="text-secondary">{{ $query2->Nom }}</th>
                        <th class="text-secondary">{{ $query2->Prenom }}</th>
                        <th class="text-secondary">{{ $query2->poste }}</th>
                        <th class="text-secondary">{{ $query2->salaire }}</th>
                        <th>

                            <div class="d-flex justify-content-center gap-3">
                                <button type="button" class="btn btn-success"><a class="text-white" href="{{ route('admin.employes.edit', $query2->numEmp) }}">Modifier</a></button>

                                <button type="button" class="btn btn-info"><a class="text-white" href="{{ route('admin.employes.show', $query2->numEmp) }}">Profil</a></button>

                                <form action="{{ route('admin.employes.destroy', $query2->numEmp) }}" method="POST">

                                    @csrf

                                    @method('delete')

                                    <button type="submit" class="btn btn-danger">Supprimer</button>

                                </form>

                            </div>

                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
