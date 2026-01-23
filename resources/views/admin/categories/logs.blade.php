@extends('admin.admin_main')

@section('content')
    <x-admin>

        <h4 class="mb-3">
            Category Logs — {{ $category->name }}
        </h4>

        <table id="crm_category_logs" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Action</th>
                    <th>Old Data</th>
                    <th>New Data</th>
                    <th>Done By</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td class="text-uppercase">{{ $log->action }}</td>
                        <td>
                            <pre>{{ json_encode(json_decode($log->old_data), JSON_PRETTY_PRINT) }}</pre>
                        </td>
                        <td>
                            <pre>{{ json_encode(json_decode($log->new_data), JSON_PRETTY_PRINT) }}</pre>
                        </td>
                        <td>{{ $log->user_id }}</td>
                        <td>{{ $log->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </x-admin>
@endsection

@section('page-js')
    <script>
        $(document).ready(function() {
            new simpleDatatables.DataTable("#crm_category_logs", {
                searchable: true,
                perPage: 10
            });
        });
    </script>
@endsection
