@extends('base')

@section('title', "POINTAGE")

@section('container')

    <div class="mx-auto col-11 mt-3">

        <div class="mb-4">
            <button type="button" class="btn btn-primary">
                <a class="text-white" href="{{ route('admin.pointages.create') }}">AJOUTER</a>
            </button>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr class="text-white">
                    <th>DATE POINTAGE</th>
                    <th>ID EMPLOYE</th>
                    <th>POINTAGE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pointages as $pointage)
                    <tr class="table-active">
                        <th class="text-secondary">{{ $pointage->datePointage }}</th>
                        <th class="text-secondary">{{ $pointage->numEmp }}</th>
                        <th class="text-secondary">{{ $pointage->pointage }}</th>
                        <th>

                            <div class="d-flex justify-content-center gap-3">
                                <button type="button" class="btn btn-success"><a href="{{ route('admin.pointages.edit', $pointage->pointage) }}" class="text-white">Modifier</a></button>

                                <button type="button" class="btn btn-danger">Supprimer</button>
                            </div>

                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
