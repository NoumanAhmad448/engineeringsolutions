@extends('admin.admin_main')



@section('content')
    <a href="{{ route('admin.course.index') }}" class="btn btn-secondary my-2">
        Back to Courses
    </a>
    <h5>Add Course Detail</h5>

    <form method="POST" action="{{ route('courses.details.store', $course->id) }}">
        @include('messages')
        @csrf

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <x-html_textarea name="value" label="Value" :value="old('value')" />

        <button type="submit" class="btn btn-primary">
            Add Detail
        </button>
    </form>

    <hr>
    <h5>Course Details Listing</h5>

    <table class="table table-bordered" id="crm_course_details">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($details as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detail->title }}</td>
                    <td>
                        <a href="{{ route('courses.details.edit', $detail->id) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <x-admin>
                            <form method="POST" action="{{ route('courses.details.destroy', $detail->id) }}"
                                style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>

                            </form>
                        </x-admin>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        No details added yet
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@section('page-js')
    <script>
        $(document).ready(function() {
            new simpleDatatables.DataTable("#crm_course_details", {
                searchable: true,
                perPage: 10
            });
        });
    </script>
@endsection
