@extends('admin.admin_main')

@section('content')

<form method="POST"
      action="{{ route('categories.update',$category->id) }}"
      enctype="multipart/form-data">
    @csrf
    @include("messages")


    <div class="form-group">
        <label>Name</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{$category->name}}">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control">{{$category->description}}</textarea>
    </div>

    <div class="form-group">
        <label>Image</label>
        @include('file', ['name' => 'image'])
        @if($category->image)
            <img src="{{ img_path($category->image) }}" alt="CRM" class="img-fluid img-thumbnail rounded-pill"
                width="100" />
        @endif

    </div>

    <button class="btn btn-success">Update</button>
</form>

@endsection
