<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest; // Importing the Form Request
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Support\Str; // Import Str Facade
use Illuminate\Support\Facades\Auth; // Facade For Authentication
use Illuminate\Support\Facades\Hash; // Facade For Encryption


class RegisterController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */

    public function create() 
    {
        return view('auth.register', ['page' => 'register']);
    }


    /**
     * Processes the submission of the registration form.
     * 
     * @param RegisterRequest $request
     */

    public function store(RegisterRequest $request) 
    {

        // Take the part of the email before the symbol and sanitize it.

            $emailPrefix = Str::before($request->email, '@');
            $baseUsername = Str::slug($emailPrefix, '');

            $username = $baseUsername;
            $counter = 1;


        // Loop to Ensure Uniqueness.

            while (User::where('username', $username)->exists()) {
                $username = $baseUsername . $counter;
                $counter++;
            }


        // Creates a New User Instance.

            $user = new User();


        // Filling the Table Attributes.

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'student';
            $user->username = $username; // Assign The Generated Username
            $user->terms_accepted_at = Carbon::now();


        // Saving the user in the database.

            $user->save();


        // Logs in the newly created user.

            Auth::login($user);


        // Successfully redirect the user to home page.

            return redirect('/')->with('success', 'Your account has been successfully created!');

    }


}