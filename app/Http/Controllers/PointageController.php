<?php

namespace App\Http\Controllers;

use App\Http\Requests\PointageFormRequest;
use App\Models\Pointage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PointageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Requête Select * From employe
        $pointages = DB::table('pointages')->get();

        return view('admin.pointage.index', ['pointages' => $pointages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pointage = new Pointage();
        return view('admin.pointage.form', compact('pointage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PointageFormRequest $request)
    {
        try {
            $pointageData = $request->validated();

            DB::table('pointages')->insert($pointageData);

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
        return view('admin.pointage.form', [
            'pointage' => $pointage
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PointageFormRequest $request, string $pointage)
    {
        DB::table('pointages')
            ->where('pointage', $pointage)
            ->update($request->validated());

        return to_route('admin.pointages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
