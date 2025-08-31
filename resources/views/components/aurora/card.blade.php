@if(isset($courses) && $courses->isNotEmpty())

    <div class="row row-cols-1 row-cols-md-4 p-5 g-3">

        @foreach($courses as $course)

            <div class="col-md-3">
            
                <div class="card background-dark text-white h-100">

                    <img src="{{ $course->course_thumbnail_url }}" class="card-img-top" alt="{{ $course->title }}">

                    <div class="card-body p-2">
                        <h5 class="card-title fs-6"> {{ $course->title }} </h5>
                    </div>

                    <div class="card-footer display-flex justify-center text-center p-1">
                        <a href="{{ route('course.show', $course) }}" class="aurora-button rounded-2 w-50 btn btn-sm"> Details </a>
                    </div>

                </div>
            
            </div>

        @endforeach

    </div>

@endif