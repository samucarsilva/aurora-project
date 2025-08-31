
@extends('layouts.app')

@section('content')


    <section>

        @include('components.aurora.card', [
            'courses' => $courses
        ])

    </section>


@endsection