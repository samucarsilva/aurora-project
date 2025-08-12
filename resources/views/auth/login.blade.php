
@extends('layouts.app')

@section('properties', 'justify-center align-center')

@section('content')


    <div class="form-container">

        <form class="form-card" action="" method="POST">
            @csrf


            <div class="form-header">
                <h1 class="form-title font-semibold"> Sign In </h1>
            </div>


            <div class="form-main gap-5">

                <div class="form-group">
                    <input class="form-input" type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="off" placeholder=" ">
                    <label class="form-label" for="email"> E-Mail </label>
                </div>


                <div class="form-group">

                    <input class="form-input" type="password" name="password" id="password" autocomplete="off" placeholder=" ">
                    <label class="form-label" for="password"> Password </label>

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
                    <a class="button-link" href="{{ route('register') }}"> Sign Up </a>
                </div>

            </div>


        </form>

    </div>


@endsection
