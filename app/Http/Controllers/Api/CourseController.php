<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Academy;
use App\Http\Controllers\Controller;


class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Course::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'academy_id' => 'required|integer|exists:academies,id',
            'name' => 'required|string|max:150',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'capacity' => 'required|integer|min:1',
        ]);
        $academy = Academy::findOrFail($validated['academy_id']); //Buscamos la academia a la que quiere asignar el curso y si es suya la autorizamos con gate
        Gate::authorize('update', $academy);
        $course = $academy->courses()->create($validated);
        return response()->json($course, 201); //devuelvo el json com mensaje de éxito

    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return response()->json($course, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
         
        $validated = $request->validate([ //Valido igual que post pero con sometimes para admitir patchs
            'academy_id' => 'sometimes|required|integer|exists:academies,id',
            'name' => 'sometimes|required|string|max:150',
            'description' => 'sometimes|nullable|string',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date|after_or_equal:start_date',
            'capacity' => 'sometimes|required|integer|min:1',
        ]);
        $newAcademy = isset($validated['academy_id']) //obtengo la academia si viene en el body de la petición, por defecto null
            ? Academy::findOrFail($validated['academy_id'])
            : null;
        Gate::authorize('update', [$course, $newAcademy]); //Autorizo que sea dueño y que la nueva academia también sea suya
        $course->update($validated);
        return response()->json($course, 200);


    }

    public function destroy(Course $course)
    {
        Gate::authorize('delete', $course); // Si no es el dueño, devuelve 403 automáticamente
        $course->delete();
        return response()->json(['message' => 'Curso eliminado'], 200);
        
    }
    public function students(Course $course)
    {
        //
    }

    public function enroll(Request $request, Course $course)
    {
        //
    }

    public function unenroll(Request $request, Course $course, Student $student)
    {
        //
    }
}
