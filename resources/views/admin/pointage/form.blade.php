@extends('base')

@section('title', $pointage->exists ? "MODIFICATION POINTAGE" : "AJOUT POINTAGE")

@section('container')
    <form class="mx-auto col-4 mt-5  text-secondary" method="POST" action="{{ $pointage->exists ? route('admin.pointages.update', $pointage->pointage) : route('admin.pointages.store') }}">

        @csrf

        @if ($pointage->exists)
            @method('PUT')
        @endif

        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Date Pointage</label>
        <input type="date" class="form-control" value="{{ $pointage->datePointage }}" id="datePointage" name="datePointage">
        </div>

        <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">ID Employe</label>
        <input type="text" class="form-control" value="{{ $pointage->numEmp }}" id="numEmp" name="numEmp">
        </div>

        <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Pointage</label>
        <input type="text" class="form-control" value="{{ $pointage->pointage }}" id="pointage" name="pointage">
        </div>

        <button type="submit" class="btn btn-primary">
            @if ($pointage->exists)
                MODIFIER
            @else
                ENREGISTRER
            @endif
        </button>

    </form>
@endsection

