@extends('admin.admin_main')

@section('content')
    <table class="table table-bordered" id="crm_students">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Webinar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $app)
                <tr>
                    <td>{{ $app->name }}</td>
                    <td>{{ $app->email }}</td>
                    <td>{{ $app->phone }}</td>
                    <td>{{ $app->webinar->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('page-js')
    @include('export_to_excel', ['id' => '#crm_students'])
@endsection
