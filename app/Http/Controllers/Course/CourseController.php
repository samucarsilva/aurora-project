<?php

namespace App\Http\Controllers\Course;


use App\Http\Controllers\Controller;
use App\Models\Course;


class CourseController extends Controller
{


    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $courses = Course::where('is_published', true)->get();

        return view('courses.index', [
            'courses' => $courses
        ]);
    }


    /**
     * Display the specified resource.
     */

    public function show(Course $course) 
    {
        return view('courses.show', compact('course'));
    }


}