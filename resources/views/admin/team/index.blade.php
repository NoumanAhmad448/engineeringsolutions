@extends('admin.admin_main')

@section('content')

@include("messages")

<form method="POST"
      action="{{ isset($member) ? route('admin.team.update',$member->id) : route('admin.team.store') }}"
      enctype="multipart/form-data">

    @csrf

    <div class="form-group">
        <label for="name">Employee Name</label>
        <input type="text"
               id="name"
               name="name"
               class="form-control"
               value="{{ old('name', $member->name ?? '') }}"
               placeholder="Enter employee name">
    </div>

    <div class="form-group">
        <label for="job_title_id">Job Title</label>
        <select name="job_title_id"
                id="job_title_id"
                class="form-control">
            <option value="">Select Job Title</option>
            @foreach($titles as $title)
                <option value="{{ $title->id }}"
                    {{ (isset($member) && $member->job_title_id == $title->id) ? 'selected' : '' }}>
                    {{ $title->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <div class="form-check">
            <input type="checkbox"
                   class="form-check-input"
                   id="is_leader"
                   name="is_leader"
                   {{ isset($member) && $member->is_leader ? 'checked' : '' }}>
            <label class="form-check-label" for="is_leader">
                Leader
            </label>
        </div>
    </div>

    <div class="form-group">
        @include('file', ['name' => 'image'])
        @if(isset($member) && $member->image_path)
            <img src="{{ img_path($member->image_path) }}" class="img-fluid" width="100"/>
        @endif
    </div>


    <button type="submit" class="btn btn-primary">
        {{ isset($member) ? 'Update' : 'Save' }}
    </button>

</form>



<table id="crm_team" class="table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Title</th>
            <x-admin><th>Action</th></x-admin>
        </tr>
    </thead>
    <tbody>
        @foreach($members as $m)
        <tr>
            <td><img src="{{ img_path($m->image_path) }}" width="50"></td>
            <td>{{ $m->name }}</td>
            <td>{{ $m->jobTitle->title }}</td>

            <td class="d-flex">
                <a href="{{ route('admin.team.edit',$m->id) }}"
                class="btn btn-sm btn-warning">
                Edit
                </a>
            <x-admin>
                <form method="POST" action="{{ route('admin.team.delete',$m->id) }}"
                      onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button class="ml-1 btn btn-sm btn-danger">Delete</button>
                </form>
            </x-admin>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('page-js')
<script>
$(document).ready(function () {
    new simpleDatatables.DataTable("#crm_team", {
        searchable: true,
        perPage: 10
    });
});
</script>
@endsection
