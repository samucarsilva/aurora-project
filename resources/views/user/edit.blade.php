
@extends('layouts.app')

@section('content')


    <div class="row justify-center">

        <div class="col-md-15">

            <div class="card bg-dark text-white shadow-sm mb-4 card-rounded">

                <div class="d-flex flex-column card-body align-items-center text-center py-5">

                    <img class="rounded-circle mb-3 profile-picture" src="{{ Auth::user()->profile_picture_url }}" alt="User Profile Picture">

                    <h2 class="mb-0">
                        {{ $user->name }}
                    </h2>

                </div>

            </div>


            <div class="card bg-dark text-white shadow-sm mb-4 card-rounded">

                <form class="d-flex flex-column p-5" method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="mb-3">

                        <label for="name"> Name </label>
                        <input id="name" class="form-control text-light bg-secondary @error('name') is-invalid @enderror" name="name" type="text" value="{{ old('name', $user->name) }}">

                        @error('name')

                            <div class="d-block invalid-feedback">
                                <p class="font-size-1 text-danger"> {{ $message }} </p>
                            </div>

                        @enderror

                    </div>


                    <div class="mb-3">

                        <label for="email"> E-Mail </label>
                        <input id="email" class="form-control text-light bg-secondary @error('email') is-invalid @enderror" name="email" type="email" value="{{ old('email', $user->email) }}">
    
                        @error('email')

                            <div class="d-block invalid-feedback">
                                <p class="font-size-1 text-danger"> {{ $message }} </p>
                            </div>

                        @enderror

                    </div>


                    <div class="mb-3">

                        <label for="password"> Password </label>
                        <input class="form-control text-light bg-secondary @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Leave blank to keep current">

                        @error('password')

                            <div class="d-block invalid-feedback">
                                <p class="font-size-1 text-danger"> {{ $message }} </p>
                            </div>

                        @enderror

                    </div>


                    <div class="mb-3">

                        <label for="profile_picture_path"> Profile Picture </label>
                        <input class="form-control text-light bg-secondary @error('password') is-invalid @enderror" id="profile_picture_path" name="profile_picture_path" type="file">

                        @error('profile_picture_path')

                            <div class="d-block invalid-feedback">
                                <p class="font-size-1 text-danger"> {{ $message }} </p>
                            </div>

                        @enderror

                    </div>


                    <div class="d-flex justify-between">
                        <a class="btn btn-secondary" href="{{ route('dashboard', ['user' => Auth::user()->username]) }}"> Back </a>
                        <button type="submit" class="btn btn-success"> Save </button>
                    </div>

                </form>

            </div>


        </div>

    </div>


@endsection