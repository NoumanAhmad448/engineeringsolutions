@extends('admin.admin_main')

@section('content')

<div class="row">

    {{-- ADD FORM --}}
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Add Internship</div>
            <div class="card-body">

                <form method="POST" action="{{ route('internships.store') }}">
                    @csrf

                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" class="form-control" required>
                    </div>

                    <button class="btn btn-dark btn-block">
                        Add
                    </button>
                </form>

            </div>
        </div>
    </div>

    {{-- LISTING --}}
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Internships</div>
            <div class="card-body">

                <table class="table table-bordered" id="crm_students">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($internships as $internship)
                            <tr>
                                <td>{{ $internship->name }}</td>
                                <td>{{ $internship->slug }}</td>
                                <td>
                                    <a href="{{ route('internships.edit', $internship) }}"
                                       class="btn btn-sm btn-info">
                                        Edit
                                    </a>

                                    <form method="POST"
                                          action="{{ route('internships.destroy', $internship) }}"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

@endsection

@section('page-js')
    @include('export_to_excel', ['id' => '#crm_students'])
@endsection
