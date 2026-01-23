@extends('admin.admin_main')

@section('content')
    <div class="card">
        <div class="card-header">
            Internship Applications
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="crm_students">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Internship</th>
                        <th>Applied At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $app)
                        <tr>
                            <td>{{ $app->name }}</td>
                            <td>{{ $app->email }}</td>
                            <td>{{ $app->phone }}</td>
                            <td>{{ $app->internship->name }}</td>
                            <td>{{ $app->created_at->format('d M Y') }}</td>
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
