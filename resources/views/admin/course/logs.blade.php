@extends('admin.admin_main')

@section('content')

<h4>Logs – {{ $course->course_title }}</h4>

<table class="table table-bordered" id="crm_course_logs">
    <thead>
        <tr>
            <th>Date</th>
            <th>Action</th>
            <th>User</th>
            <th>Old Data</th>
            <th>New Data</th>
        </tr>
    </thead>
    <tbody>
        @foreach($logs as $log)
        <tr>
            <td>{{ $log->created_at }}</td>
            <td class="text-uppercase">{{ $log->action }}</td>
            <td>{{ $log->user_id }}</td>
            <td>
                <pre>{{ json_encode($log->old_data, JSON_PRETTY_PRINT) }}</pre>
            </td>
            <td>
                <pre>{{ json_encode($log->new_data, JSON_PRETTY_PRINT) }}</pre>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function () {
        new simpleDatatables.DataTable("#crm_course_logs", {
            searchable: true,
            perPage: 10
        });
    });
</script>

@endsection
