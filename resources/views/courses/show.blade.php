
@extends('layouts.app')

@section('content')


    <div class="row justify-center my-5">

        <div class="col">

            <div class="display-flex flex-column justify-between flex-wrap flex-md-nowrap py-3 my-3 border-low">
                <h1 class="h1"> {{ $course->title }} </h1>
                <p> {{ $course->language }} </p>
            </div>

            <div class="card surface-color-3 text-white shadow-sm mb-4 card-rounded">

                <section class="card-rounded surface-color-7 m-5 p-3">

                    <div class="display-flex flex-column m-5">

                        <div class="display-flex justify-center">
                            <div class="card-rounded shadow-sm width-50 surface-color-5">
                                <img class="img-fluid" src="{{ $course->course_thumbnail_url }}" alt="{{ $course->title ?? 'Course Image' }}">
                            </div>
                        </div>

                    </div>

                </section>


                <section class="mx-5">

                    <p> {{ $course->description }} </p>

                </section>


                <section>

                    <div class="display-flex flex-column align-center m-5">
                        <button class="aurora-button rounded-2 width-50 height-32 btn btn-sm" type="submit"> Enroll </button>
                    </div>

                </section>

            </div>

        </div>

    </div>


@endsection