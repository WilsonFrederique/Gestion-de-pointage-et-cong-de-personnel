@extends('base')

@section('title', "CONGE")

@section('container')

    <div class="mx-auto col-11 mt-3">

        <div class="mb-4">
            <button type="button" class="btn btn-primary">
                <a class="text-white" href="{{ route('admin.conges.create') }}">AJOUTER</a>
            </button>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr class="text-white">
                    <th>NUMERO CONGE</th>
                    <th>ID EMPLOYE</th>
                    <th>MOTIFE</th>
                    <th>NOBRE DE JOURS</th>
                    <th>DATE DEMANDE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conges as $conge)
                    <tr class="table-active">
                        <th class="text-secondary">{{ $conge->numConge }}</th>
                        <th class="text-secondary">{{ $conge->numEmp }}</th>
                        <th class="text-secondary">{{ $conge->motif }}</th>
                        <th class="text-secondary">{{ $conge->nbrjr }}</th>
                        <th class="text-secondary">{{ $conge->dateDemande }}</th>
                        <th>

                            <div class="d-flex justify-content-center gap-3">
                                <button type="button" class="btn btn-success"><a class="text-white" href="{{ route('admin.conges.edit', $conge->numConge) }}">Modifier</a></button>

                                <button type="button" class="btn btn-danger">Supprimer</button>
                            </div>

                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
