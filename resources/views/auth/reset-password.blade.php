
@extends('layouts.app')

@section('properties', 'justify-center align-center')

@section('content')


    <div class="form-container my-5">

        <form class="form-card" action="" method="POST">
            @csrf


            <div class="form-header">
                <h1 class="form-title font-semibold"> Reset Password </h1>
            </div>


            <div class="form-main">

                <div class="form-group">

                    <input class="form-input" type="password" name="password" id="password" autocomplete="new-password" placeholder=" ">
                    <label class="form-label" for="password"> Password </label>

                </div>

                <div class="form-group">

                    <input class="form-input" type="password" name="confirm-password" id="confirm-password" autocomplete="new-password" placeholder=" ">
                    <label class="form-label" for="confirm-password"> Confirm Password </label>

                </div>

            </div>


            <div class="form-footer">

                <div class="form-group">
                    <button class="button-primary" type="submit"> Reset Password </button>
                </div>

                <div class="form-group">
                    <a class="button-link" href="{{ route('login') }}" role="button"> Cancel </a>
                </div>

            </div>

        </form>


    </div>


@endsection