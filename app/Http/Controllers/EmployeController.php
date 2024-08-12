<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeFormRequest;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource. ( Zan hoe : Affichage eto )
     */
    public function index()
    {
        // Requête Select * From employe
        $employes = DB::table('Employes')->get();

        return view('admin.employe.index', ['employes' => $employes]);

    }

    /**
     * Show the form for creating a new resource. ( Zan hoe : Formulaire eto )
     */
    public function create()
    {
        $employe = new Employe();
        return view('admin.employe.form', compact('employe'));
    }

    /**
     * Store a newly created resource in storage. ( Zan hoe : Eto le Insert eto , NB: io EmployeFormRequest
     * dia le required ny installena igny , Commande install anaz : php artisan make:request EmployeFormRequest
     * , Afaka ovaovaina le anarana fa tsy voatery ho EmployeFormRequest)
     */
    public function store(EmployeFormRequest $request)
    {
        try {
            $employeData = $request->validated();
            // dd($employeData);

            // Eto le requête insert :
            // $employe = Employe::create($employeData);

            // 2em Méthode pour le requête insert :
            DB::table('employes')->insert($employeData);

            return to_route('admin.employes.index');
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
     * Show the form for editing the specified resource. ( Zan hoe : Mamoaka anle zvtr ho
     * modifiena eto , io Employe io dia le Model)
     */
    public function edit(Employe $employe)
    {
        return view('admin.employe.form', [
            'employe' => $employe
        ]);
    }

    /**
     * Update the specified resource in storage. ( Zan hoe : Modification eto )
     */
    public function update(EmployeFormRequest $request, string $numEmp)
    {
        DB::table('employes')
            ->where('numEmp', $numEmp)
            ->update($request->validated());

        return to_route('admin.employes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
