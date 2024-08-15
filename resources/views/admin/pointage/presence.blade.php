
@extends('base')

@section('title', "LISTE DES EMPLOYÉS PRÉSENCE")

@section('container')

    <div class="mx-auto col-11 mt-3">

        <div class="clearfix mb-4">
            <div class="d-flex justify-content-between align-items-center gap-50">
                <div class="custom-btn-group">
                    <div class="btn-group">
                        <a class="btn btn-primary custom-background-btn" href="{{ route('admin.pointages.index') }}">TOUS LES POINTAGES</a>
                    </div>
                    <form class="d-flex">
                        <input type="date" name="DateRecherche" class="form-control me-2 custom-background" type="search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Rechercher</button>
                    </form>
                    <h1 class="custom-h1-presence">LISTE DES PRÉSENCES</h1>

                </div>
                <div class="btn-group">
                    <a class="btn btn-primary custom-background-absence" href="{{ route('admin.pointages_absences') }}">ABSENCE</a>
                </div>
            </div>
        </div>

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
                @foreach ($presences as $presence)
                    <tr class="table-active">
                        <th class="text-secondary">{{ $presence->id }}</th>
                        <th class="text-secondary">{{ $presence->datePointage }}</th>
                        <th class="text-secondary">{{ $presence->numEmp }}</th>
                        <th class="text-secondary">{{ $presence->pointage }}</th>
                        <th>

                            <div class="d-flex justify-content-center gap-3">
                                <button type="button" class="btn btn-success"><a href="{{ route('admin.pointages.edit', $presence->id) }}" class="text-white">Modifier</a></button>

                                <form action="{{ route('admin.pointages.destroy', $presence->id) }}" method="POST">

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

