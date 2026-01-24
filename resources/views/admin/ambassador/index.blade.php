@extends('admin.admin_main')

@section('content')
    <div class="card">
        <div class="card-header">Ambassadors</div>

        <div class="card-body">
            <table class="table table-bordered" id="crm_students">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Qualification</th>
                        <th>Field</th>
                        <th>Address</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ambassadors as $a)
                        <tr>
                            <td>{{ $a->name }}</td>
                            <td>{{ $a->father_name }}</td>
                            <td>{{ $a->email }}</td>
                            <td>{{ $a->phone }}</td>
                            <td>{{ $a->qualification }}</td>
                            <td>{{ $a->field }}</td>
                            <td>{{ $a->address }}</td>
                            <td>
                                @if ($a->photo)
                                    <a href="{{ asset('storage/' . $a->photo) }}" target="_blank">
                                        View
                                    </a>
                                @endif
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
