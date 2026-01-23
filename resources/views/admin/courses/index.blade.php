@extends('admin.admin_main')

@section('page-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="row">
        <!-- ADD COURSE -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Course</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.course.store') }}">
                        @include('messages')
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-3">

                                <div class="form-group">
                                    <label>Course Level</label>
                                    <select name="course_type" class="form-control" required>
                                        <option value="">Select Course Level</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-3">

                                @include('admin.courses.course_category')
                            </div>
                            <div class="col-3">

                                <div class="form-group">
                                    <label>Course Title</label>
                                    <input type="text" name="course_title" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-3">


                                <div class="form-group">
                                    <label>Time Selection</label>
                                    <input type="text" name="time_selection" class="form-control">
                                </div>
                            </div>

                            <div class="col-3">

                                <div class="form-group">
                                    <label>Rating (1–5)</label>
                                    <input type="number" step="0.1" min="1" max="5" name="rating"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-3">

                                <div class="form-group">
                                    <label>Duration</label>
                                    <input type="text" name="duration" class="form-control">
                                </div>
                            </div>

                            <div class="col-3">

                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="price" class="form-control">
                                </div>
                            </div>

                            <div class="col-3">

                                <div class="form-group">
                                    <label>Language</label>
                                    <input type="text" name="language" class="form-control" placeholder="English, Urdu">
                                </div>
                            </div>
                            <div class="col-3">

                                <div class="form-check">
                                    <input type="checkbox" name="has_video_lectures" value="1">
                                    <label>Video Lectures Available</label>
                                </div>

                                <div class="form-check mb-2">
                                    <input type="checkbox" name="has_online_session" value="1">
                                    <label>Online Session Available</label>
                                </div>

                                <div class="form-check mb-3">
                                    <input type="checkbox" name="isPopular" value="1">
                                    <label>Popular Course</label>
                                </div>

                            </div>

                            <div class="col-3">

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
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
                                <x-html_textarea name="learnable_skill" label="Learnable Skills" :value="old('learnable_skill')" />
                            </div>

                            <div class="col-3">
                                <x-html_textarea name="course_requirement" label="Course Requirement" :value="old('course_requirement')" />
                            </div>

                            <div class="col-3">
                                <x-html_textarea name="targeting_student" label="Targeting Student" :value="old('targeting_student')" />
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <x-html_textarea name="description" label="Description" :value="old('description')" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block">Save Course</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- LISTING -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Courses List</div>

                <div class="card-body">
                    <table class="table table-bordered" id="crm_courses">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Rating</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->course_title }}</td>
                                    <td>{{ $course->rating }}</td>
                                    <td>{{ show_payment($course->price) }}</td>
                                    <td>
                                        <span
                                            class="{{ $course->status === 'inactive' ? 'text-danger font-weight-bold' : 'text-success' }}">
                                            {{ ucfirst($course->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.course.edit', $course->id) }}"
                                            class="btn btn-sm btn-info">Edit</a>

                                        <a href="{{ route('admin.course.detail.index', $course->id) }}"
                                            class="btn btn-sm btn-warning">
                                            Details
                                        </a>


                                        <x-admin>
                                            <form method="POST" action="{{ route('admin.course.delete', $course->id) }}"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>

                                            </form>
                                        </x-admin>
                                        {{-- <x-admin>
                                    <a href="{{ route('admin.course.logs', $course->id) }}"
                                    class="btn btn-sm btn-secondary">
                                        Logs
                                    </a>
                                </x-admin> --}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Datatable --}}
                    <script>
                        $(document).ready(function() {
                            new simpleDatatables.DataTable("#crm_courses", {
                                searchable: true,
                                perPage: 10
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
