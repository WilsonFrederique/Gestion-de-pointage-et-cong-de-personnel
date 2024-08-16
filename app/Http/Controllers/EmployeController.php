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
    public function index(Request $request)
    {
        // Hanao requête amn employe
        $employes = Employe::query();

        if($Recherche = $request->Rechercher) {
            $employes->where('numEmp', 'LIKE', '%' . $Recherche . '%')
                ->orWhere('Nom', 'LIKE', '%' . $Recherche . '%')
                ->orWhere('Prenom', 'LIKE', '%' . $Recherche . '%');
        }


        // Amn'io get io no maka anle requête
        return view('admin.employe.index', ['employes' => $employes->get()]);

    }

    public function indexProfil(Request $request)
    {
        // Hanao requête amn employe
        $employes = Employe::query()->get();

        // Amn'io get io no maka anle requête
        return view('admin.employe.toutProfil', ['employes' => $employes]);

    }

    public function listes(Request $request)
    {
        // Récupérer les employés dont les numéros sont présents dans la table des congés
        $query1 = DB::table('conges')->select('numEmp');

        // Récupérer les employés dont les numéros sont présents dans la liste récupérée
        $query2 = DB::table('employes')
            ->whereIn('numEmp', $query1);

        if($Recherche = $request->Rechercher) {
            $query2->where('numEmp', 'LIKE', '%' . $Recherche . '%')
                ->orWhere('Nom', 'LIKE', '%' . $Recherche . '%')
                ->orWhere('Prenom', 'LIKE', '%' . $Recherche . '%');
        }

        // Retourner la vue avec les employés concernés
        return view('admin.listes.listesEC', ['query2s' => $query2->get()]);

    }

    public function listesENC(Request $request)
    {
        // Récupérer les employés dont les numéros sont présents dans la table des congés
        $query1 = DB::table('conges')->select('numEmp');

        // Récupérer les employés dont les numéros sont présents dans la liste récupérée
        $query2 = DB::table('employes')
            ->whereNotIn('numEmp', $query1);

        if($Recherche = $request->Rechercher) {
            $query2->where('numEmp', 'LIKE', '%' . $Recherche . '%')
                ->orWhere('Nom', 'LIKE', '%' . $Recherche . '%')
                ->orWhere('Prenom', 'LIKE', '%' . $Recherche . '%');
        }

        // Retourner la vue avec les employés concernés
        return view('admin.listes.listesENC', ['query2s' => $query2->get()]);

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

    //  Eto iz mbola tss sary

    // public function store(EmployeFormRequest $request)
    // {
    //     try {
    //         $employeData = $request->validated();
    //         // dd($employeData);

    //         // Eto le requête insert :
    //         // $employe = Employe::create($employeData);

    //         // 2em Méthode pour le requête insert :
    //         DB::table('employes')->insert($employeData);

    //         return to_route('admin.employes.index');

    //     } catch(\Throwable $th) {
    //         return redirect()->back();
    //     }
    // }

    //  Eto iz efa misy sary

    public function store(EmployeFormRequest $request)
    {
        try {
            $employeData = $request->validated();

            // Gestion du fichier image
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $filename = time() . '_' . $file->getClientOriginalName(); // Crée un nom unique pour le fichier
                $file->move(public_path('images'), $filename); // Déplace le fichier dans le dossier public/images
                $employeData['images'] = 'images/' . $filename; // Enregistre le chemin de l'image dans la base de données
            }

            // Insertion des données dans la table employes
            DB::table('employes')->insert($employeData);

            return to_route('admin.employes.index')->with('success', 'Employé ajouté avec succès!');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite. Veuillez réessayer.');
        }
    }


    /**
     * Display the specified resource. (Zan hoe : Pour la profils ito)
     */
    public function show(string $numEmp)
    {
        $employe = DB::table('employes')
            ->where('numEmp', $numEmp)
            ->first();

        return view('admin.employe.profil', ['employe' => $employe]);

    }

    /**
     * Show the form for editing the specified resource. ( Zan hoe : Mamoaka anle zvtr ho
     * modifiena eto , io Employe io dia le Model)
     */
    public function edit(Employe $employe)
    {
        return view('admin.employe.modForm', [
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
    public function destroy(string $numEmp)
    {
        $deleted = DB::table('employes')
                ->where('numEmp', $numEmp)
                ->delete();

        if ($deleted) {
            // Si la suppression a réussi
            return redirect()->back()->with('success', 'Employé supprimé avec succès.');
        } else {
            // Si la suppression a échoué
            return redirect()->back()->with('error', 'Erreur lors de la suppression de l\'employé.');
        }
    }
}
