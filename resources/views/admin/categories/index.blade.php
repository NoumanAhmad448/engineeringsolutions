@extends('admin.admin_main')

@section('content')


<h1>Add Category</h1>
<form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
    @include("messages")
    @csrf

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label>Image</label>
        @include('file', ['name' => 'image'])
    </div>

    <button class="btn btn-success">Add Category</button>
</form>

<hr>



<table id="crm_categories" class="table table-bordered">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>
                @if($category->image)
                    <img src="{{ img_path($category->image) }}" width="50">
                @endif
            </td>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <x-admin>
                <a href="{{ route('categories.delete',$category->id) }}" class="btn btn-sm btn-danger"
                    onclick="return confirm('Are you sure?')">Delete</a>
                </x-admin>

                {{-- <x-admin>
                    <a href="{{ route('categories.logs', $category->id) }}"
                    class="btn btn-info btn-sm">
                        Logs
                    </a>
                </x-admin> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('page-js')
<script>
    $(document).ready(function() {
        new simpleDatatables.DataTable("#crm_categories", {
            searchable: true,
            perPage: 10
        });
    });
</script>
@endsection
