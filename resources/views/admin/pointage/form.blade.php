@extends('base')

@section('title', $pointage->exists ? "MODIFICATION POINTAGE" : "AJOUT POINTAGE")

@section('container')

    <form class="mx-auto col-4 mt-5  text-secondary" method="POST" action="{{ $pointage->exists ? route('admin.pointages.update', $pointage->id) : route('admin.pointages.store') }}">

        @csrf

        @if ($pointage->exists)
            @method('PUT')
        @endif

        <div class="mb-3" style="display: none">
            <label for="exampleInputEmail1" class="form-label">ID</label>
            <input type="text" class="form-control" value="{{ $pointage->id }}" id="id" name="id">
        </div>

        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Date Pointage</label>
        <input type="date" class="form-control" value="{{ $pointage->datePointage }}" id="datePointage" name="datePointage">
        </div>

        <div class="mb-3">
            <label for="numEmp" class="form-label">ID Employé</label>
            <select class="form-control" id="numEmp" name="numEmp">
                @foreach($employes as $employe)
                    <option value="{{ $employe->numEmp }}" {{ $employe->numEmp == $pointage->numEmp ? 'selected' : '' }}>
                        {{ $employe->numEmp }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pointage" class="form-label">Pointage</label>
            <select class="form-control" id="pointage" name="pointage">
                <option value="Oui" {{ $pointage->pointage == 'Oui' ? 'selected' : '' }}>Oui</option>
                <option value="Non" {{ $pointage->pointage == 'Non' ? 'selected' : '' }}>Non</option>
            </select>
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

