@extends('admin.admin_main')

@section('content')
    <div class="card col-md-6 mx-auto">
        <div class="card-header">Edit Internship</div>

        <div class="card-body">
            <form method="POST" action="{{ route('internships.update', $internship) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Name</label>
                    <input name="name" class="form-control" value="{{ $internship->name }}" required>
                </div>

                <button class="btn btn-dark">
                    Update
                </button>

                <a href="{{ route('internships.index') }}" class="btn btn-secondary">
                    Back
                </a>
            </form>
        </div>
    </div>
@endsection
