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
    public function index()
    {
        // Requête Select * From employe
        $conges = DB::table('conges')->get();

        return view('admin.conge.index', ['conges' => $conges]);
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

            DB::table('conges')->insert($congeData);

            return to_route('admin.conges.index');

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
        DB::table('conges')
            ->where('numConge', $numConge)
            ->update($request->validated());

        return to_route('admin.conges.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
