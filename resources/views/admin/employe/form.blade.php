@extends('base')

@section('title', $employe->exists ? "MODIFICATION EMPLOYE" : "AJOUT EMPLOYE")

@section('container')
    <form class="mx-auto col-4 mt-5" method="POST" action="{{ $employe->exists ? route('admin.employes.update', $employe->numEmp) : route('admin.employes.store') }}">

        @csrf

        @if ($employe->exists)
            @method('PUT')
        @endif

        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ID Employe</label>
        <input type="text" class="form-control" value="{{ $employe->numEmp }}" id="numEmp" name="numEmp">
        </div>

        <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nom</label>
        <input type="text" class="form-control" value="{{ $employe->Nom }}" id="Nom" name="Nom">
        </div>

        <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Prenom</label>
        <input type="text" class="form-control" value="{{ $employe->Prenom }}" id="Prenom" name="Prenom">
        </div>

        <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Poste</label>
        <input type="text" class="form-control" value="{{ $employe->poste }}" id="poste" name="poste">
        </div>

        <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Salaire</label>
        <input type="number" class="form-control" value="{{ $employe->salaire }}" id="salaire" name="salaire">
        </div>

        <button type="submit" class="btn btn-primary">
            @if ($employe->exists)
                MODIFIER
            @else
                ENREGISTRER
            @endif
        </button>

    </form>
@endsection

