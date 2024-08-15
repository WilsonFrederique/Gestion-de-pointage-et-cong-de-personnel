
@extends('base')

@section('title', $conge->exists ? "MODIFICATION CONGE" : "AJOUT CONGE")

@section('container')

    <form class="mx-auto col-4 mt-5 text-secondary" method="POST" action="{{ $conge->exists ? route('admin.conges.update', $conge->numConge) : route('admin.conges.store') }}">

        @csrf

        @if ($conge->exists)
            @method('PUT')
        @endif

        @if ($errors->has('nbrjr'))
            <div class="alert alert-danger">
                {{ $errors->first('nbrjr') }}
            </div>
        @endif

        <div class="mb-3">
            <label for="numConge" class="form-label">Numéro Congé</label>
            <input type="text" class="form-control" value="{{ old('numConge', $conge->numConge) }}" id="numConge" name="numConge">
        </div>

        <div class="mb-3">
            <label for="numEmp" class="form-label">ID Employé</label>
            <input type="text" class="form-control" value="{{ old('numEmp', $conge->numEmp) }}" id="numEmp" name="numEmp">
        </div>

        <div class="mb-3">
            <label for="motif" class="form-label">Motif</label>
            <input type="text" class="form-control" value="{{ old('motif', $conge->motif) }}" id="motif" name="motif">
        </div>

        <div class="mb-3">
            <label for="nbrjr" class="form-label">Nombre de jours</label>
            <input type="number" class="form-control" value="{{ old('nbrjr', $conge->nbrjr) }}" id="nbrjr" name="nbrjr">
        </div>

        <div class="mb-3">
            <label for="dateDemande" class="form-label">Date demande</label>
            <input type="date" class="form-control" value="{{ old('dateDemande', $conge->dateDemande) }}" id="dateDemande" name="dateDemande">
        </div>

        <button type="submit" class="btn btn-primary">
            @if ($conge->exists)
                MODIFIER
            @else
                ENREGISTRER
            @endif
        </button>

    </form>

@endsection

