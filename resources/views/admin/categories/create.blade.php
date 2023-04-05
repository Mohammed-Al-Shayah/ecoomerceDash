@extends('admin.master')

@section('title','Create Category | '.env('APP_NAME'))

@section('content')
@include('admin.errors')

@if (session('msg'))
<div class="alert alert-{{session('type') }} solid  m-5">
{{ session('msg') }}
@endif

<form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data" class="m-5">
    @csrf

    <div class="mb-3">
        <label>English Name</label>
        <input type="text" name="name_en" placeholder="English Name" class="form-control" />
    </div>

    <div class="mb-3">
        <label>Arabic Name</label>
        <input type="text" name="name_ar" placeholder="Arabic Name" class="form-control" />
    </div>

    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control" />
    </div>

    <div class="mb-3">
        <label>Parent</label>
        <select name="parent_id" class="form-control">
            <option value="">Select</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->trans_name }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success px-5">Add</button>


</form>


@stop
