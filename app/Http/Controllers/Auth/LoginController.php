<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequestLogin; // Importing The Form Request
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse; // For Return Typing
use Illuminate\Support\Facades\Auth; // Facade For Authentication
use Illuminate\View\View; // For Return Typing


class LoginController extends Controller
{


    /**
     * Displays the login form.
     */

    public function create(): View
    {
        return view('auth.login', ['page' => 'login']);
    }


    /**
     * Processes the login attempt.
     *
     * @param FormRequestLogin $request
     */

    public function store(FormRequestLogin $request): RedirectResponse
    {

        // The authenticate() method already attempts to log in the user
        // and throws a validation exception if it fails (including throttling).

            $request->authenticate();


        // Regenerates the session ID to prevent session fixation attacks.

            $request->session()->regenerate();


        // Redirects the user to the home page

            return redirect()->intended('/')->with('success', 'Login successful!');

    }


    /**
     * Log out the user.
     */

    public function destroy(Request $request): RedirectResponse
    {

        Auth::guard('web')->logout(); // Logs out the user from the web guard

        $request->session()->invalidate(); // Invalidates the current session
        $request->session()->regenerateToken(); // Generate a new CSRF token for the next session


        // Redirects to the home or login screen.

        return redirect('/')->with('success', 'You have been successfully logged out.');

    }


}