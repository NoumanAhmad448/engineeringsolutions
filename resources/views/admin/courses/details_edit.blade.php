@extends('admin.admin_main')

@section('content')
    <h5>Edit Course Detail</h5>

    <form method="POST" action="{{ route('courses.details.store', $detail->course_id) }}">
        @csrf

        {{-- hidden ID for update --}}
        <input type="hidden" name="detail_id" value="{{ $detail->id }}">

        {{-- always inside the form --}}
        @include('messages')

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $detail->title) }}" required>
        </div>


        <x-html_textarea name="value" label="Value" :value="old('value', $detail->value)" />


        <button type="submit" class="btn btn-success">
            Update Detail
        </button>

        <a href="{{ route('admin.course.detail.index', $detail->course_id) }}" class="btn btn-secondary">
            Back
        </a>
    </form>
@endsection
