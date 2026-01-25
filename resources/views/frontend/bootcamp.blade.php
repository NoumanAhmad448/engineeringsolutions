@extends('header')

@section('content')
    <div class="container-fluid my-5 bg-primary py-5">
        {{-- PAGE HEADER --}}
        <div class="text-center mb-5">
            <h1 class="font-weight-bold text-uppercase text-white">Bootcamp</h1>
            <p class="text-white 3">
                BES is a Technical Training Institute in Lahore that is providing Complete Bootcamp.
            </p>
        </div>

        {{-- BOOTCAMP FEATURES --}}
        <div class="row mb-5">

            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="font-weight-bold">Online Session</h5>
                        <p class="text-muted mb-0">
                            Burraq Engineering Solutions provides online sessions.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="font-weight-bold">On Campus Lecture</h5>
                        <p class="text-muted mb-0">
                            Burraq Engineering Solutions provides on campus Training.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="font-weight-bold">Practical Training</h5>
                        <p class="text-muted mb-0">
                            Burraq Engineering Solutions provides practical training for all courses.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    {{-- POPULAR / ACTIVE COURSES --}}
    <div class="mb-4">
        <h3 class="font-weight-bold mb-3">Popular Courses</h3>
    </div>
    <div class="row">
        @forelse($courses as $course)
            <div class="col-md-6 col-lg-3 mb-4">
                <x-course_card :course="$course" />
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">No active courses available at the moment.</p>
            </div>
        @endforelse
    </div>
@endsection
