
@extends('layouts.app')

@section('content')


    <div class="row justify-center py-5">

        <div class="col-md-15">

            <div class="card bg-dark text-white shadow-sm mb-4 card-rounded">

                <div class="d-flex flex-column card-body align-items-center text-center py-5">

                    <img class="rounded-circle mb-3 profile-picture" src="{{ Auth::user()->profile_picture_url }}" alt="User Profile Picture">

                    <h2 class="mb-0">
                        {{ Auth::user()->name }}
                        <a href="{{ route('user.edit') }}" class="text-white" title="Edit Profile">
                            <span class="bi bi-pencil-square pencil-icon">  </span>
                        </a>
                    </h2>

                </div>

            </div>


            <div class="card bg-dark text-white shadow-sm mb-4">
                <div class="card-body">

                    <h3 class="mb-3"> My Courses </h3>

                    @if ($enrollments->isEmpty())
                        <p> You are not yet enrolled in any course. </p>
                    @else

                        <ul class="list-unstyled">

                            @foreach ($enrollments as $enrollment)

                                <li class="border-low mb-3 p-3">

                                    <div class="display-flex justify-between mb-2">

                                        <h5 class="mb-0"> {{ $enrollment->course->title }} </h5>

                                        <small>

                                            @if ($enrollment->completed_at)
                                                Completed on: {{ $enrollment->completed_at->format('d/m/Y') }}
                                            @else
                                                <small> {{ $enrollment->progress_percentage }}% Completed </small>
                                            @endif

                                        </small>

                                    </div>


                                    <div class="progress progress-custom surface-color-2 mb-2" style="height: 16px;">
                                        <div class="progress-bar progress-bar-custom aurora-color-1" role="progressbar" aria-valuemin="0" aria-valuemax="100">  </div>
                                    </div>


                                    <div class="display-flex justify-end">

                                        <div>

                                            @php
                                                $firstLesson = $enrollment->course->lessons->sortBy('order')->first();
                                            @endphp

                                            @if ($firstLesson)
                                                <a href="{{ route('course.lessons', ['course' => $enrollment->course, 'lesson' => $firstLesson]) }}" class="btn btn-sm btn-outline-success">
                                                    Keep Learning
                                                </a>
                                            @else
                                                <small> This course does not have classes yet. </small>
                                            @endif

                                        </div>

                                        

                                    </div>

                                </li>

                            @endforeach

                        </ul>

                    @endif

                </div>

            </div>

        </div>

    </div>


@endsection