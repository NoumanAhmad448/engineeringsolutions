@extends('admin.admin_main')

@section('content')
    @include('messages')

    <table id="crm_enrollments" class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Country</th>
                <th>Course</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enrollments as $e)
                <tr>
                    <td>{{ $e->name }}</td>
                    <td>{{ $e->email ?? '-' }}</td>
                    <td>{{ $e->phone }}</td>
                    <td>{{ $e->country ?? '-' }}</td>
                    <td>{{ $e->course->course_title }}</td>
                    <td>{{ showWebPageDate($e->created_at) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('page-js')
@include('export_to_excel', ['id' => '#crm_enrollments'])
@endsection
