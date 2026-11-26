<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        Gate::authorize('update', $course); // Si no es el dueño, devuelve 403 automáticamente
        // ... resto de tu código
    }

    public function destroy(Course $course)
    {
        Gate::authorize('delete', $course); // Si no es el dueño, devuelve 403 automáticamente
        // ... resto de tu código
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
