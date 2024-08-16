@extends('base')

@section('title', "AJOUT EMPLOYE")

@section('container')
    <form class="mx-auto col-4 mt-5 text-secondary" method="POST" action="{{ route('admin.employes.store') }}" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label for="numEmp" class="form-label">ID Employe</label>
            <input type="text" class="form-control" value="" id="numEmp" name="numEmp">
        </div>

        <div class="mb-3">
            <label for="Nom" class="form-label">Nom</label>
            <input type="text" class="form-control" value="" id="Nom" name="Nom">
        </div>

        <div class="mb-3">
            <label for="Prenom" class="form-label">Prenom</label>
            <input type="text" class="form-control" value="" id="Prenom" name="Prenom">
        </div>

        <div class="mb-3">
            <label for="poste" class="form-label">Poste</label>
            <input type="text" class="form-control" value="" id="poste" name="poste">
        </div>

        <div class="mb-3">
            <label for="salaire" class="form-label">Salaire</label>
            <input type="number" class="form-control" value="" id="salaire" name="salaire">
        </div>

        <!-- Champ de téléchargement de nouvelle image -->
        <div class="row mb-3">
            <!-- Affichage de l'image actuelle -->
            {{-- @if($employe->images)
                <div class="mb-3">
                    <label class="form-label">Image actuelle</label>
                    <div>
                        <img id="imgActuelle" src="{{ asset($employe->images) }}" alt="Image de l'employé" style="">
                    </div>
                </div>
            @endif --}}
            <div class="col-md-8">
                <div class="mb-3">
                    <input value="" type="file" class="form-control" id="images" name="images">
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="row mb-3 btn btn-primary w-100">ENREGISTRER</button>
            </div>
        </div>

    </form>
@endsection




{{-- @extends('base')

@section('title', $employe->exists ? "MODIFICATION EMPLOYE" : "AJOUT EMPLOYE")

@section('container')
    <form class="mx-auto col-4 mt-5  text-secondary" method="POST" action="{{ $employe->exists ? route('admin.employes.update', $employe->numEmp) : route('admin.employes.store') }} " enctype="multipart/form-data">

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

        <div class="row mb-3">
            <div class="col-md-8">
                <div class="mb-3">
                    <input type="file" class="form-control" id="images" name="images">
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="row mb-3 btn btn-primary w-100">
                    @if ($employe->exists)
                        MODIFIER
                    @else
                        ENREGISTRER
                    @endif
                </button>
            </div>
        </div>


    </form>
@endsection
 --}}
