@extends('admin.master')


@section('title','Create prodect | '.env('APP_NAME'))

@section('content')

@if (session('msg'))
<div class="alert alert-{{session('type') }} solid  m-5">
{{ session('msg') }}
</div>

@endif


<form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" class="m-5">
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
        <label>English Content</label>
        <textarea name="content_en" placeholder="English Content" class="myeditor"></textarea>
    </div>

    <div class="mb-3">
        <label>Arabic Content</label>
        <textarea name="content_ar" placeholder="Arabic Content" class="myeditor">,</textarea>
    </div>

    <div class="mb-3">
        <label for="salary">Salary</label>
        <input type="text" id="salary" name="salary" class="form-control" />
    </div>

    <div class="mb-3">
        <label for="quantity">Quantity</label>
        <input type="text" id="quantity" name="quantity" class="form-control" />
    </div>

    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <option value="">Select</option>

        </select>
    </div>

    <button class="btn btn-success px-5">Add</button>


</form>

@endsection
