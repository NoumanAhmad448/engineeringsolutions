@extends('admin.admin_main')

@section('content')
    <a href="{{ route('admin.course.index') }}" class="btn btn-secondary my-2">
        Back to Courses
    </a>

    <div class="card">
        <div class="card-header">Edit Course</div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.course.update', $course->id) }}">
                @csrf
                @method('PUT')
                @include('messages')

                <div class="form-group">
                    <label>Course Type</label>
                    <select name="course_type" class="form-control" required>
                        <option value="">Select Course Type</option>
                        <option value="Beginner" {{ $course->course_type == 'Beginner' ? 'selected' : '' }}>
                            Beginner
                        </option>
                        <option value="Intermediate" {{ $course->course_type == 'Intermediate' ? 'selected' : '' }}>
                            Intermediate
                        </option>
                        <option value="Advanced" {{ $course->course_type == 'Advanced' ? 'selected' : '' }}>
                            Advanced
                        </option>
                    </select>
                </div>
                @include('admin.courses.course_category')

                <div class="form-group">
                    <label>Course Title</label>
                    <input type="text" name="course_title" class="form-control" value="{{ $course->course_title }}">
                </div>

                <div class="form-group">
                    <label>Time Selection</label>
                    <input type="text" name="time_selection" class="form-control" value="{{ $course->time_selection }}">
                </div>

                <div class="form-group">
                    <label>Rating</label>
                    <input type="number" step="0.1" min="1" max="5" name="rating" class="form-control"
                        value="{{ $course->rating }}">
                </div>

                <div class="form-group">
                    <label>Duration</label>
                    <input type="text" name="duration" class="form-control" value="{{ $course->duration }}">
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" value="{{ $course->price }}">
                </div>

                <div class="form-group">
                    <label>Language</label>
                    <input type="text" name="language" class="form-control" value="{{ $course->language }}">
                </div>

                <div class="form-check">
                    <input type="checkbox" name="has_video_lectures" value="1"
                        {{ $course->has_video_lectures ? 'checked' : '' }}>
                    <label>Video Lectures Available</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="has_online_session" value="1"
                        {{ $course->has_online_session ? 'checked' : '' }}>
                    <label>Online Session Available</label>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="isPopular" value="1" {{ $course->isPopular ? 'checked' : '' }}>
                    <label>Popular Course</label>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="active" {{ $course->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $course->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Learnable Skills</label>
                    <textarea name="learnable_skill" class="form-control">{{ $course->learnable_skill }}</textarea>
                </div>

                <div class="form-group">
                    <label>Course Requirement</label>
                    <textarea name="course_requirement" class="form-control">{{ $course->course_requirement }}</textarea>
                </div>

                <div class="form-group">
                    <label>Targeting Student</label>
                    <textarea name="targeting_student" class="form-control">{{ $course->targeting_student }}</textarea>
                </div>
                <div class="form-group">
                    <label>Course Image</label>
                    @include('file', ['name' => 'image'])

                    @if (!empty($course->image))
                        <div class="mb-2">
                            <img src="{{ img_path($course->image) }}" width="120" class="img-thumbnail">
                        </div>
                    @endif
                </div>


                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ $course->description }}</textarea>
                </div>

                <button class="btn btn-success">Update Course</button>
            </form>
            <a href="{{ route('admin.course.index') }}" class="btn btn-secondary my-2">
                Back to Courses
            </a>

        </div>
    </div>
@endsection
