<div class="card h-13s0 shadow-sm hover-shadow category-card shadow-sm animate__animated animate__fadeInUp">
    <img src="{{ img_path($course->image) }}" class="card-img-top">
    <div class="card-body">
        <h5 class="mb-2">{{ $course->course_title }}</h5>

        <ul class="list-unstyled small text-muted mb-3" style="height: 100px; width: 180px">
            @if ($course->duration)
                <li>
                    Duration: <i class="bi bi-clock"></i>
                    {{ $course->duration }}
                </li>
            @endif

            <li>
                <i class="bi bi-bar-chart"></i>
                {{ ucfirst($course->course_type ?? 'All Levels') }}
            </li>

            <li>
                <x-show_stars rating="{{ $course->rating }}" />
            </li>


            <li>
                <i class="bi bi-cash"></i>
                {{ $course->price ? show_payment($course->price) : 'Free' }}
            </li>
        </ul>

        <a href="{{ route('course.show', $course->slug) }}" class="btn btn-primary btn-sm w-100">
            View Course
        </a>
    </div>

</div>
