@extends('admin.admin_main')

@section('content')

@include("messages")

<h4>Course Details – {{ $course->course_title }}</h4>

<div class="row">
    <!-- ADD FORM -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Add Course Detail</div>

            <div class="card-body">
                <form method="POST"
                      action="{{ route('admin.course.detail.store', $course->id) }}">
                    @csrf

                    <div class="form-group">
                        <label>Detail Title</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Detail Value (HTML allowed)</label>
                        <textarea name="value"
                                  class="form-control"
                                  rows="5"></textarea>
                    </div>

                    <button class="btn btn-primary btn-block">
                        Save Detail
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- LISTING -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Details List</div>

            <div class="card-body">
                <table class="table table-bordered" id="crm_course_details">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($details as $detail)
                        <tr>
                            <td>{{ $detail->id }}</td>
                            <td>{{ $detail->title }}</td>
                            <td>
                                <a href="{{ route('admin.course.detail.edit', $detail->id) }}"
                                   class="btn btn-sm btn-info">
                                    Edit
                                </a>

                                <x-admin>
                                    <form method="POST"
                                          action="{{ route('admin.course.detail.delete', $detail->id) }}"
                                          style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </x-admin>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Datatable --}}
                <script>
                    $(document).ready(function () {
                        new simpleDatatables.DataTable("#crm_course_details", {
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
