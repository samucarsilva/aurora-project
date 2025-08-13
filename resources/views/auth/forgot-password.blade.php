
@extends('layouts.app')

@section('properties', 'justify-center align-center')

@section('content')


    <div class="form-container my-5">

        <form class="form-card" action="" method="POST">
            @csrf


            <div class="form-header">
                <h1 class="form-title font-semibold"> Forgot Password </h1>
            </div>


            <div class="form-main">

                <div class="form-group">
                    <p class="font-size-1 mt-4"> Enter your email address and we will send you a link to reset your password. </p>
                </div>

                <div class="form-group">
                    <input class="form-input" type="email" name="email" id="email" autocomplete="email" placeholder=" ">
                    <label class="form-label" for="email"> E-Mail </label>
                </div>

            </div>


            <div class="form-footer">

                <div class="form-group">
                    <button class="button-primary" type="submit"> Submit </button>
                </div>

                <div class="form-group">
                    <a class="button-link" href="{{ route('login.create') }}" role="button"> Sign In </a>
                </div>

            </div>

        </form>


    </div>


@endsection
