@extends('header')

@section('content')
    <div class="container-fluid mb-5">
        {{-- CATEGORY HEADER --}}
        <div class="row mb-4 align-items-center category-header border border-white p-4 rounded">
            <div class="col-md-7">
                <h1 class="fw-bold">{{ $category->name }}</h1>
                <p class="text-muted">{{ $category->description }}</p>
            </div>
            <div class="col-md-5">
                <div class="category-image-wrapper overflow-hidden rounded shadow-sm">
                    <img src="{{ img_path($category->image) }}"
                        class="img-fluid category-image"
                        alt="{{ $category->name }}">
                </div>
            </div>
        </div>


        {{-- LOADER --}}
        <div id="course-loader" class="loader-container">
            <x-loader message="Loading courses..." />
        </div>

        {{-- COURSES --}}
        <h1>All Courses</h1>
        <div id="category-courses" class="row"></div>

    </div>
@endsection

@section('page-js')
    <script>
        $(function() {
            $.ajax({
                url: "{{ route('ajax.category.courses', $category->id) }}",
                type: 'GET',
                success: function(html) {
                    $('#course-loader').hide();
                    $('#category-courses').html(html);
                }
            });
        });
    </script>
@endsection
