@extends('base')

@section('title', "CONGE")

@section('container')

    <div class="mx-auto col-11 mt-3">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <button type="button" class="btn btn-primary">
                <a class="text-white text-decoration-none" href="{{ route('admin.conges.create') }}">AJOUTER</a>
            </button>

            <h1 class="custom-h1">LISTE DES CONGE</h1>
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
                        <td class="text-secondary">{{ \Carbon\Carbon::parse($conge->dateDemande)->format('d-m-Y') }}</td>
                        <th>

                            <div class="d-flex justify-content-center gap-3">
                                <button type="button" class="btn btn-success"><a class="text-white" href="{{ route('admin.conges.edit', $conge->numConge) }}">Modifier</a></button>

                                <form action="{{ route('admin.conges.destroy', $conge->numConge) }}" method="POST">

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
