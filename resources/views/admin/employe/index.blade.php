@extends('base')

@section('title', "EMPLOYE")

@section('container')

    <div class="mx-auto col-11 mt-3">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('admin.employes.create') }}">AJOUTER</a>
            </div>

            <div class="d-flex gap-2"> <!-- Flex container for gap management -->
                <div class="btn-group gat-btn-ec p-1">
                    <a class="btn btn-primary custom-ec" href="{{ route('admin.listes') }}">LISTE DES EMPLOYÉS EN CONGÉ</a>
                </div>

                <div class="btn-group gat-btn-enc p-1">
                    <a class="btn btn-primary custom-enc" href="{{ route('admin.listes_non_conge') }}">LISTE DES EMPLOYÉS NON EN CONGÉ</a>
                </div>
            </div>

            <h1 class="custom-h1 mb-0">LISTE DES EMPLOYÉS</h1> <!-- Adjust margin-bottom to align with buttons -->
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

                                <button type="button" class="btn btn-info"><a class="text-white" href="{{ route('admin.employes.show', $employe->numEmp) }}">Profil</a></button>

                                <form action="{{ route('admin.employes.destroy', $employe->numEmp) }}" method="POST">

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
