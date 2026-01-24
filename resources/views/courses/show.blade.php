@extends('header')

@section('content')
    <div class="container my-5">
        <div class="row">

            {{-- LEFT CONTENT --}}
            <div class="col-md-8">

                <h1 class="fw-bold">{{ $course->course_title }}</h1>

                {{-- COURSE HIGHLIGHTS --}}
                <div class="course-highlights mb-5">

                    {{-- LEARNABLE SKILLS --}}
                    @if($course->learnable_skill)
                        <div class="highlight-box mb-4">
                            <h5 class="highlight-title">
                                <i class="fa fa-check-circle text-success"></i>
                                Learnable Skills
                            </h5>
                            <div class="highlight-content">
                                {!! $course->learnable_skill !!}
                            </div>
                        </div>
                    @endif

                    {{-- COURSE REQUIREMENTS --}}
                    @if($course->course_requirement)
                        <div class="highlight-box mb-4">
                            <h5 class="highlight-title">
                                <i class="fa fa-list-ul text-primary"></i>
                                Course Requirements
                            </h5>
                            <div class="highlight-content">
                                {!! $course->course_requirement !!}
                            </div>
                        </div>
                    @endif

                    {{-- TARGETING STUDENT --}}
                    @if($course->targeting_student)
                        <div class="highlight-box mb-4">
                            <h5 class="highlight-title">
                                <i class="fa fa-user-graduate text-warning"></i>
                                Targeting Student
                            </h5>
                            <div class="highlight-content">
                                {!! $course->targeting_student !!}
                            </div>
                        </div>
                    @endif

                </div>

                {{-- DESCRIPTION --}}
                <div class="course-description mb-4">
                    <h4 class="mb-3">Course Description</h4>
                    {!! $course->description !!}
                </div>


                {{-- ACCORDION --}}
                <div class="accordion" id="courseDetails">
                    @foreach ($course->details as $key => $detail)
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#detail{{ $key }}">
                                    {{ $detail->title }}
                                </button>
                            </div>
                            <div id="detail{{ $key }}" class="collapse {{ $key == 0 ? 'show' : '' }}">
                                <div class="card-body">
                                    {!! $detail->description !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            {{-- RIGHT SIDEBAR --}}
            <div class="col-md-4">
                <div class="course-meta card shadow-sm sticky-top" style="top: 90px;">
                    <div class="card-body">

                        <img src="{{ img_path($course->image) }}" class="card-img-top">
                        <h6 class="pt-5 text-uppercase text-muted mb-3">Course Information</h6>
                        <ul class="list-unstyled mb-0 course-info-list">

                            @if ($course->duration)
                                <li>
                                    <i class="fa fa-clock-o text-primary"></i>
                                    <strong>Duration:</strong> {{ $course->duration }}
                                </li>
                            @endif

                            @if (!is_null($course->price))
                                <li>
                                    <i class="fa fa-money text-success"></i>
                                    <strong>Price:</strong> {{ show_payment($course->price) }}
                                </li>
                            @endif

                            @if ($course->rating)
                                <li>
                                    <i class="fa fa-star text-warning"></i>
                                    <strong>Rating:</strong>
                                    <x-show_stars :rating="$course->rating" />
                                </li>
                            @endif

                            @if ($course->c_level)
                                <li>
                                    <i class="fa fa-signal text-info"></i>
                                    <strong>Level:</strong> {{ ucfirst($course->c_level) }}
                                </li>
                            @endif

                            @if ($course->language)
                                <li>
                                    <i class="fa fa-language text-secondary"></i>
                                    <strong>Language:</strong> {{ $course->language }}
                                </li>
                            @endif

                            <li>
                                <i
                                    class="fa fa-video-camera {{ $course->has_video_lectures ? 'text-success' : 'text-muted' }}"></i>
                                <strong>Video Lectures:</strong>
                                {{ $course->has_video_lectures ? 'Available' : 'Not Available' }}
                            </li>

                            <li>
                                <i
                                    class="fa fa-users {{ $course->has_online_session ? 'text-success' : 'text-muted' }}"></i>
                                <strong>Live Sessions:</strong>
                                {{ $course->has_online_session ? 'Available' : 'Not Available' }}
                            </li>

                            @if ($course->isPopular)
                                <li class="text-danger">
                                    <i class="fa fa-fire"></i>
                                    <strong>Popular Course</strong>
                                </li>
                            @endif

                            @if ($course->isFeatured)
                                <li class="text-primary">
                                    <i class="fa fa-certificate"></i>
                                    <strong>Featured Course</strong>
                                </li>
                            @endif
                            <a href="#" class="btn btn-success btn-block">Enroll Now</a>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
