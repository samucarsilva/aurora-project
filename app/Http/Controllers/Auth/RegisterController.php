<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequestUser;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class RegisterController extends Controller
{

    public function create() 
    {
        return view('register', ['page' => 'register']);
    }


    /**
     * Processes the submission of the registration form.
     * 
     * @param FormRequestUser $request
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