
@extends('layouts.app')

@section('content')


    <div class="row justify-center py-5">

        <div class="col-md-15">

            <div class="card bg-dark text-white shadow-sm mb-4 card-rounded">

                <div class="d-flex flex-column card-body align-items-center text-center py-5">

                    <img class="rounded-circle mb-3 profile-picture" src="{{ Auth::user()->profile_picture_url }}" alt="User Profile Picture">

                    <h2 class="mb-0">
                        {{ Auth::user()->name }}
                        <a href="#" class="text-white" title="Edit Profile">
                            <span class="bi bi-pencil-square pencil-icon">  </span>
                        </a>
                    </h2>

                </div>

            </div>


            <div class="card bg-dark text-white shadow-sm mb-4">
                <div class="card-body">

                    <h3 class="mb-3"> My Courses </h3>

                    <p> You are not yet enrolled in any course. </p>

                </div>

            </div>

        </div>

    </div>


@endsection