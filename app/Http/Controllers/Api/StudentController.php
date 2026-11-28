<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Student::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:150',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:15',
            'date_of_birth' => 'nullable|date',
        ]);
         $student = Student::create($validated);
        return response()->json($student, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return response()->json($student, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'surname' => 'sometimes|required|string|max:150',
            'email' => 'sometimes|required|email|unique:students,email',
            'phone' => 'sometimes|nullable|string|max:15',
            'date_of_birth' => 'sometimes|nullable|date',
        ]);
        $student->update($validated);
        return response()->json($student, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
         $student->delete();
        return response()->json(['message' => 'Estudiante eliminado'], 200);
    }
}
