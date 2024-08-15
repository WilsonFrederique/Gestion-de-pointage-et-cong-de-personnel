<?php

namespace App\Http\Controllers;

use App\Http\Requests\CongeFormRequest;
use App\Models\Conge;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CongeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // Hanao requête amn employe
        $conges = Conge::query();

        if($Recherche = $request->Rechercher) {
            $conges->where('numConge', 'LIKE', '%' . $Recherche . '%')
                ->orWhere('numEmp', 'LIKE', '%' . $Recherche . '%')
                ->orWhere('motif', 'LIKE', '%' . $Recherche . '%');
        }

        return view('admin.conge.index', ['conges' => $conges->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $conge = new Conge();
        return view('admin.conge.form', compact('conge'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CongeFormRequest $request)
    {

        try {
            $congeData = $request->validated();

            // Récupérer l'année en cours
            $currentYear = date('Y');

            // Calculer le nombre total de jours de congé pris par l'employé pour l'année en cours
            $totalJoursConges = DB::table('conges')
                ->where('numEmp', $congeData['numEmp'])
                ->whereYear('dateDemande', $currentYear)
                ->sum('nbrjr');

            // Ajouter les jours de congé du nouveau congé
            $totalJoursConges += $congeData['nbrjr'];

            // Vérifier que le nombre total de jours ne dépasse pas 30
            if ($totalJoursConges > 30) {
                return redirect()->back()->withErrors(['nbrjr' => 'Le nombre total de jours de congé pour l\'année ne peut pas dépasser 30 jours.']);
            }

            DB::table('conges')->insert($congeData);

            return to_route('admin.conges.index');

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue.']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conge $conge)
    {
        return view('admin.conge.form', [
            'conge' => $conge
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CongeFormRequest $request, string $numConge)
{
    $congeData = $request->validated();

    // Récupérer l'année en cours
    $currentYear = date('Y');

    // Verification pour jours disponible de conge
    $TJC = DB::table('conges')
        ->where('numEmp', $congeData['numEmp'])
        ->whereYear('dateDemande', $currentYear)
        ->sum('nbrjr');

    $disponibles = 30 - $TJC;

    // Calculer le nombre total de jours de congé pris par l'employé pour l'année en cours
    $totalJoursConges = DB::table('conges')
        ->where('numEmp', $congeData['numEmp'])
        ->whereYear('dateDemande', $currentYear)
        ->sum('nbrjr');

    // Trouver le congé actuel pour obtenir le nombre de jours avant modification
    $currentConge = DB::table('conges')
        ->where('numConge', $numConge)
        ->first();

    // Si le congé actuel existe, soustraire ses jours du total actuel
    if ($currentConge) {
        $totalJoursConges -= $currentConge->nbrjr;
    }

    // Calculer le nombre de jours restant jusqu'à atteindre 30 jours
    $joursRestants = 30 - $totalJoursConges;

    // Vérifier si le nombre de jours demandés dépasse les jours restants
    if ($congeData['nbrjr'] > $joursRestants) {
        return redirect()->back()->withErrors([
            'nbrjr' => 'Le nombre total de jours de congé pour l\'année ne peut pas dépasser 30 jours. Il reste ' . $disponibles . ' jour(s) disponible(s).'
        ]);
    }

    // Mettre à jour le congé
    DB::table('conges')
        ->where('numConge', $numConge)
        ->update($congeData);

    return to_route('admin.conges.index')->with('success', 'Le congé a été mis à jour avec succès.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $numConge)
    {
        $deleted = DB::table('conges')
            ->where('numConge', $numConge)
            ->delete();
        return redirect()->back();
    }
}
