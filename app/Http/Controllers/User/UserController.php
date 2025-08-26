<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\FormUserRequest;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth; // Facade For Authentication
use Illuminate\Support\Facades\Hash; // Facade For Encryption
use Illuminate\Support\Facades\Storage; // Importing The Storage Facade
use Illuminate\View\View; // For Return Typing


class UserController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     */

    public function edit(): View
    {

        $user = Auth::user();

        return view('user.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(FormUserRequest $request): RedirectResponse
    {

        $user = Auth::user();

        $data = $request->validated(); // Validating Only the Requested Data


        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); // Remove Field From Array to Not Update if Password is Empty
        }


        if ($request->hasFile('profile_picture_path')) {

            // If the user already has a photo, delete the old one to avoid taking up space.

                if ($user->profile_picture_path) {
                    Storage::disk('public')->delete($user->profile_picture_path);
                }


            // Saving the new photo and updating the path in the data array.

                $path = $request->file('profile_picture_path')->store('profile_pictures', 'public');
                $data['profile_picture_path'] = $path;

        }


        $user->update($data); // Update User Data.


        return redirect()->route('user.edit')->with('success', 'Profile updated successfully!');

    }


}