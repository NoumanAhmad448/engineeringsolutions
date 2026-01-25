@extends('header')

@section('content')
    @include('messages')

    <x-company_info>

        @include('messages')
        <h1> Course Enrollment Form </h1>
        <form method="POST" action="{{ route('enroll.store') }}">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Email (optional)</label>
                <input name="email" class="form-control">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input name="phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Country (optional)</label>
                <input name="country" class="form-control">
            </div>

            <div class="form-group">
                <label>Course</label>
                <select name="course_id" class="form-control" required>
                    <option value="">-- Select Course --</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}"
                            {{ isset($selectedCourse) && $selectedCourse->id == $course->id ? 'selected' : '' }}>
                            {{ $course->course_title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary btn-block">
                Submit Enrollment
            </button>

        </form>

    </x-company_info_container>
@endsection
