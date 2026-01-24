@extends('admin.admin_main')

@section('content')
    <a href="{{ route('admin.webinar.index') }}" class="btn btn-secondary mb-3">
        Back
    </a>

    <div class="card">
        <div class="card-header">
            Edit Webinar
        </div>

        @include("messages")

        <div class="card-body">
            <form method="POST" action="{{ route('admin.webinar.update', $webinar->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Webinar Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $webinar->name }}" required>
                </div>

                <button class="btn btn-success">
                    Update Webinar
                </button>
            </form>
        </div>
    </div>
@endsection
