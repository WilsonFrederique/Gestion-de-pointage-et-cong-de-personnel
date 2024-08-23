<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Pointage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PointageFormRequest;

class PointageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Hanao requête amn employe
        $pointages = Pointage::query();

        // Récupérer les employés pour la liste déroulante
        $employes = Employe::all();

        if($Recherche = $request->Rechercher) {
            $pointages->where('id', 'LIKE', '%' . $Recherche . '%')
                ->orWhere('numEmp', 'LIKE', '%' . $Recherche . '%')
                ->orWhere('pointage', 'LIKE', '%' . $Recherche . '%');
        }

        if($Date = $request->DateRecherche) {
            $pointages->where('datePointage', 'LIKE', '%' . $Date . '%');
        }

        return view('admin.pointage.index', [
                    'pointages' => $pointages->get(),
                    'employes' => $employes // Passer la liste des employés à la vue
                ]);
    }

    // Pointage presence
    public function presence(Request $request){
        $presences = Pointage::query()->where('pointage', 'Oui');

        if($Date = $request->DateRecherche) {
            $presences->where('datePointage', 'LIKE', '%' . $Date . '%');
        }

        return view('admin.pointage.presence', ['presences' => $presences->get()]);
    }

    // Pointage absence
    public function absence(Request $request){
        $presences = Pointage::query()->where('pointage', 'Non');

        if($Date = $request->DateRecherche) {
            $presences->where('datePointage', 'LIKE', '%' . $Date . '%');
        }

        return view('admin.pointage.absence', ['presences' => $presences->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pointage = new Pointage();
        $employes = Employe::all(); // Récupérer les employés

        return view('admin.pointage.form', compact('pointage', 'employes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PointageFormRequest $request)
    {
        try {
            $congeData = $request->validated();

            DB::table('pointages')->insert($congeData);

            return to_route('admin.pointages.index');

        } catch(\Throwable $th) {
            return redirect()->back();
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
    public function edit(Pointage $pointage)
    {

        $employes = Employe::all(); // Récupérer les employés

        return view('admin.pointage.form', compact('pointage', 'employes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PointageFormRequest $request, string $id)
    {
        DB::table('pointages')
            ->where('id', $id)
            ->update($request->validated());

        return to_route('admin.pointages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = DB::table('pointages')
            ->where('id', $id)
            ->delete();
        return redirect()->back();
    }
}
