@extends('header')
@section('page-css')
    <style>
        .amount-orange {
            color: #fd7e14
        }
    </style>
@endsection
@section('content')
    <h1 class="h1 my-5"> You searched for <span class="text-underline">{{ $q }}</span></h1>
    <div class="row">
        @forelse($courses as $course)
            <div class="col-md-6 col-lg-3 mb-4">
                <x-course_card :course="$course" />
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">No courses found for "{{ $q }}"</p>
            </div>
        @endforelse
    </div>
@endsection
