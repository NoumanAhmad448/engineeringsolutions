@extends('header')

@section('content')
    <div class="container-fluid my-5">

        {{-- CATEGORY HEADER --}}
        <div class="row mb-4">
            <div class="col-md-7">
                <h1 class="fw-bold">{{ $category->name }}</h1>
                <p class="text-muted">{{ $category->description }}</p>
            </div>
            <div class="col-md-5">
                <img src="{{ img_path($category->image) }}" class="img-fluid rounded shadow" width="400">
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
