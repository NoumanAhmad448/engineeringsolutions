@extends('admin.admin_main')

@section('content')
    @include('messages')

    <div class="card">
        <div class="card-header">
            Edit Course Detail – {{ $detail->course->course_title }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.course.detail.update', $detail->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Detail Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $detail->title }}">
                </div>

                <button class="btn btn-success">
                    Update Detail
                </button>
            </form>
        </div>
    </div>
@endsection
