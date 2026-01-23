@extends('admin.admin_main')

@section('content')
<div class="container-fluid">

    <h4>Job Applications</h4>

    {{-- Exportable table --}}
    <table class="table table-bordered" id="jobApplicationsTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Apply For</th>
                <th>CV</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $app)
            <tr>
                <td>{{ $app->name }}</td>
                <td>{{ $app->email ?? '-' }}</td>
                <td>{{ $app->phone }}</td>
                <td>{{ $app->apply_for }}</td>
                <td>
                    <a href="{{ img_path($app->cv_path) }}" target="_blank">
                        View CV
                    </a>
                </td>
                <td>{{ showWebPageDate($app->created_at) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

@section('page-js')
@include('export_to_excel', ['id' => '#jobApplicationsTable'])
@endsection
