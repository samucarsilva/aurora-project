<?php


namespace App\Http\Controllers\Auth;


use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequestUser;
use App\Models\User;


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

    public function store(FormRequestUser $request) 
    {

        // Collect only validated data.

            $data = $request->validated();


            $data['password'] = Hash::make($data['password']);
            $data['role'] = 'student';
            $data['terms_accepted_at'] = Carbon::now();


        // Creates the user in the database.

            User::create($data);


        // Redirects user to home page with success.

            return redirect('/')->with('success', 'Your account has been successfully created!');

    }


}