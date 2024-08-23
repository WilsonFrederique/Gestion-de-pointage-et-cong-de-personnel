@extends('base')

@section('title', "POINTAGE")

@section('container')

    <div class="mx-auto col-11 mt-3">

        <div class="clearfix mb-4">
            <div class="custom-btn-group">
                <div class="btn-group">
                    <a class="btn btn-primary custom-background-btn-ajoutPointage" href="{{ route('admin.pointages.create') }}">AJOUTER</a>
                </div>

                <form class="d-flex">
                    <input type="date" name="DateRecherche" class="form-control me-2 custom-background" type="search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form>

                <div class="PreAb">
                    <div class="btn-group me-2">
                        <a class="btn custom-btn1" href="{{ route('admin.pointages_presences') }}">PRÉSENCE</a>
                    </div>

                    <div class="btn-group">
                        <a class="btn custom-btn2" href="">ABSENCE</a>
                    </div>
                </div>
                <h1 class="custom-h1-presence">LISTE DES POINTAGES</h1>
            </div>
        </div>

        {{-- Inclusion du formulaire --}}
        {{-- @include('admin.pointage.form', ['employes' => $employes]) --}}

        <table class="table table-striped table-hover">
            <thead>
                <tr class="text-white">
                    <th>CODE</th>
                    <th>DATE POINTAGE</th>
                    <th>ID EMPLOYE</th>
                    <th>POINTAGE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pointages as $pointage)
                    <tr class="table-active">
                        <th class="text-secondary">{{ $pointage->id }}</th>
                        <td class="text-secondary">{{ \Carbon\Carbon::parse($pointage->datePointage)->format('d-m-Y') }}</td>
                        <th class="text-secondary">{{ $pointage->numEmp }}</th>
                        <th class="text-secondary">{{ $pointage->pointage }}</th>
                        <th>

                            <div class="d-flex justify-content-center gap-3">
                                <button type="button" class="btn btn-success"><a href="{{ route('admin.pointages.edit', $pointage->id) }}" class="text-white">Modifier</a></button>

                                <form action="{{ route('admin.pointages.destroy', $pointage->id) }}" method="POST">

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
