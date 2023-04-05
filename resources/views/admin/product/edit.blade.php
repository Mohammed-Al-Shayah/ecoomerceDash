@extends('admin.master')

@section('title', 'Edit Category | ' . env('APP_NAME'))

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 m-5">Edit Product</h1>

    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif




    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data"
        class="m-5">
        @csrf
        @method('put')

        <div class="mb-3">
            <label>English Name</label>
            <input type="text" value="{{ $product->name_en }}" name="name_en" @error('name_en') is-invalid @enderror
                placeholder="English Name" class="form-control" />
            @error('name_en')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Arabic Name</label>
            <input type="text" name="name_ar" @error('name_ar') is-invalid @enderror placeholder="Arabic Name"
                class="form-control" value="{{ $product->name_ar }}" />
            @error('name_ar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control" @error('image') is-invalid @enderror
                value="{{ $product->image }}" />
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="salary">Salary</label>
                    <input type="text" id="salary" name="salary" class="form-control" value="{{ $product->salary }}"
                        @error('salary') is-invalid @enderror />
                    @error('salary')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="sale_price">sale price</label>
                    <input type="text" id="sale_price" name="sale_price" class="form-control"
                        value="{{ $product->name_ar }}" />
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="text" id="quantity" name="quantity" class="form-control"
                        @error('quantity') is-invalid @enderror value="{{ $product->quantity }}" />
                    @error('quantity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label>Category</label>
                    <select name="category_id" class="form-control" @error('category_id') is-invalid @enderror
                        value="{{ $product->category_id }}">
                        <option value="">Select</option>
                        @foreach ($categories as $item)
                            <option @selected($products->category_id == $item->id) value="{{ $item->id }}">{{ $item->trans_name }}
                            </option>
                        @endforeach

                    </select>
                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


        </div>

        <div class="mb-3">
            <label>English Content</label>
            <textarea name="content_en" placeholder="English Content" class="myeditor" @error('content_en') is-invalid @enderror
                value="{{ $product->content_en }}"></textarea>
            @error('content_en')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Arabic Content</label>
            <textarea name="content_ar" placeholder="Arabic Content" class="myeditor" @error('content_ar') is-invalid @enderror
                value="{{ $product->content_ar }}"></textarea>
            @error('content_ar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <button class="btn btn-success px-5">Update</button>


    </form>

@stop
