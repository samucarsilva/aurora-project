<?php

namespace App\Http\Controllers\Course;


use App\Http\Controllers\Controller;
use App\Models\Course;

use Illuminate\Http\Request;


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


    /**
     * Enroll in a specific course.
     */

    public function enroll(Request $request, Course $course) 
    {

            $user = $request->user();

        // Checks if the user is already enrolled in the selected course.

            if ($user->isEnrolledIn($course)) {
                return back()->with('info', 'You are already enrolled in this course.');
            }


        // Checks if the user can enroll in another course.

            if (! $user->canEnroll()) {
                return back()->with('error', 'You have reached your enrollment limit');
            }


        // Enrolling the user.

            $user->enrollments()->create([
                'course_id' => $course->id,
            ]);


        // Redirecting the user to the lessons.

            $firstLesson = $course->lessons()->orderBy('order')->first();

            if ($firstLesson) {
                return redirect()->route('course.lessons', ['course' => $course, 'lesson' => $firstLesson])
                                ->with('success', 'Enrollment completed successfully!');
            }


        // Fallback if the course has no classes.

            return redirect()->route('dashboard', ['user' => $user])
                            ->with('success', 'Enrollment completed successfully!');

    }


}