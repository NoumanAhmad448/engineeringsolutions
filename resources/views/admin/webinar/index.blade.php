@extends('admin.admin_main')

@section('content')
    <div class="card">
        <div class="card-header">Webinars</div>
        @include("messages")

        <div class="card-body">
            <form method="POST" action="{{ route('admin.webinar.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <input name="name" class="form-control" placeholder="Webinar Name" required>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block">Add</button>
                    </div>
                </div>
            </form>

            <hr>

            <table class="table table-bordered mt-3" id="crm_students">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($webinars as $webinar)
                        <tr>
                            <td>{{ $webinar->name }}</td>
                            <td>{{ $webinar->slug }}</td>
                            <td>
                                <a href="{{ route('admin.webinar.edit', $webinar) }}" class="btn btn-sm btn-info">Edit</a>
                                <x-admin>
                                <form method="POST" action="{{ route('admin.webinar.delete', $webinar) }}"
                                    class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick='return confirm("Are you sure?")'>Delete</button>
                                </form>
                                </x-admin>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('page-js')
    @include('export_to_excel', ['id' => '#crm_students'])
@endsection
