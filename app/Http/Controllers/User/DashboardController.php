<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class DashboardController extends Controller
{


    /**
     * Display a listing of the resource.
     */

    public function index(User $user): View
    {

        // Ensures that the logged-in user can only see their own dashboard.

            if (Auth::user()->id !== $user->id) {
                abort(403, 'Unauthorized Access.');
            }

        // Loads the user's registrations with courses and classes.

            $enrollments = $user->enrollments()->with('course.lessons')->get();

            return view('user.dashboard', compact('user', 'enrollments'));

    }


}