<?php

namespace App\Http\Controllers\api;

use App\Models\Academy;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Academy::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Valida que todos los datos de academy sean correctos y que el email no esté repetido por otra academia
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:academies,email',
        ]);
        $academy = $request->user()->academies()->create($validated); //Creo una academia relacionada con el suaurio
        return response()->json($academy, 201); //devuelvo el json com mensaje de éxito
    }

    /**
     * Display the specified resource.
     */
    public function show(Academy $academy)
    {
        return response()->json($academy, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Academy $academy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Academy $academy)
    {
        //
    }
}
