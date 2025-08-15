
@extends('layouts.app')

@section('properties', 'justify-center align-center')

@section('content')


    <div class="form-container">

        <form class="form-card" action="{{ route('login.store') }}" method="POST">
            @csrf


            <div class="form-header">
                <h1 class="form-title font-semibold"> Sign In </h1>
            </div>


            <div class="form-main gap-5">

                <div class="form-group">

                    <input class="form-input @error('email') border-danger text-danger @enderror" type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="email" placeholder=" ">
                    <label class="form-label @error('email') text-danger @enderror" for="email"> E-Mail </label>

                    @error('email')

                        <div class="d-block invalid-feedback">
                            <p class="font-size-1 text-danger"> {{ $message }} </p>
                        </div>

                    @enderror

                </div>


                <div class="form-group">

                    <input class="form-input @error('password') border-danger text-danger @enderror" type="password" name="password" id="password" autocomplete="current-password" placeholder=" ">
                    <label class="form-label @error('password') text-danger @enderror" for="password"> Password </label>

                    @error('password')

                        <div class="d-block invalid-feedback">
                            <p class="font-size-1 text-danger"> {{ $message }} </p>
                        </div>

                    @enderror

                    <div class="display-flex justify-end pt-3">
                        <a class="button-link" href="{{ route('forgot') }}"> Forgot Password </a>
                    </div>

                </div>

            </div>


            <div class="form-footer">

                <div class="form-group">
                    <button class="button-primary" type="submit"> Login </button>
                </div>

                <div class="form-group">
                    <a class="button-link" href="{{ route('register.create') }}"> Sign Up </a>
                </div>

            </div>


        </form>

    </div>


@endsection
