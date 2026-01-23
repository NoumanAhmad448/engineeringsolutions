@extends('admin.admin_main')

@section('content')

<div class="row">
    <!-- EDIT COURSE -->
    <div class="col-md-12">
        <a href="{{ route('admin.course.index') }}" class="btn btn-secondary my-2">Back to Courses</a>
            <div class="card">
                <div class="card-header">Edit Course</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ route('admin.course.update', $course->id) }}">
                        @csrf
                        @method('PUT')
                        @include('messages')

                        <div class="row">
                            <!-- Course Level -->
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Course Level</label>
                                    <select name="course_type" class="form-control" required>
                                        <option value="">Select Course Level</option>
                                        <option value="Beginner" {{ $course->course_type == 'Beginner' ? 'selected' : '' }}>
                                            Beginner</option>
                                        <option value="Intermediate"
                                            {{ $course->course_type == 'Intermediate' ? 'selected' : '' }}>Intermediate
                                        </option>
                                        <option value="Advanced" {{ $course->course_type == 'Advanced' ? 'selected' : '' }}>
                                            Advanced</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Course Category -->
                            <div class="col-3">
                                @include('admin.courses.course_category')
                            </div>

                            <!-- Course Title -->
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Course Title</label>
                                    <input type="text" name="course_title" class="form-control"
                                        value="{{ $course->course_title }}">
                                </div>
                            </div>

                            <!-- Time Selection -->
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Time Selection</label>
                                    <input type="text" name="time_selection" class="form-control"
                                        value="{{ $course->time_selection }}">
                                </div>
                            </div>

                            <!-- Rating -->
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Rating (1–5)</label>
                                    <input type="number" step="0.1" min="1" max="5" name="rating"
                                        class="form-control" value="{{ $course->rating }}">
                                </div>
                            </div>

                            <!-- Duration -->
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Duration</label>
                                    <input type="text" name="duration" class="form-control"
                                        value="{{ $course->duration }}">
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="price" class="form-control" value="{{ $course->price }}">
                                </div>
                            </div>

                            <!-- Language -->
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Language</label>
                                    <input type="text" name="language" class="form-control"
                                        value="{{ $course->language }}" placeholder="English, Urdu">
                                </div>
                            </div>

                            <!-- Checkboxes -->
                            <div class="col-3">
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
                                    <input type="checkbox" name="isPopular" value="1"
                                        {{ $course->isPopular ? 'checked' : '' }}>
                                    <label>Popular Course</label>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active" {{ $course->status == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $course->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Course Image -->
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Course Image</label>
                                    @include('file', ['name' => 'image'])

                                    @if (!empty($course->image))
                                        <div class="mb-2">
                                            <img src="{{ img_path($course->image) }}" width="120" class="img-thumbnail">
                                        </div>
                                    @endif
                                </div>
                            </div>
                                                        <div class="col-3">
                                                        </div>

                            <!-- Textareas using x-html_textarea -->
                            <div class="col-3">
                                <x-html_textarea name="learnable_skill" label="Learnable Skills" :value="$course->learnable_skill" />
                            </div>

                            <div class="col-3">
                                <x-html_textarea name="course_requirement" label="Course Requirement" :value="$course->course_requirement" />
                            </div>

                            <div class="col-3">
                                <x-html_textarea name="targeting_student" label="Targeting Student" :value="$course->targeting_student" />
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <x-html_textarea name="description" label="Description" :value="$course->description" />
                            </div>

                            <!-- Submit Button -->
                            <div class="col-3">
                                <button class="btn btn-success btn-block">Update Course</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.course.index') }}" class="btn btn-secondary my-2">
        Back to Courses
    </a>
@endsection
