@extends('admin.master')


@section('title', 'Create prodect | ' . env('APP_NAME'))

@section('content')

    @if (session('msg'))
        <div class="alert alert-{{ session('type') }} solid  m-5">
            {{ session('msg') }}
        </div>
    @endif


    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" class="m-5">
        @csrf

        <div class="mb-3">
            <label>English Name</label>
            <input type="text" name="name_en" @error('name_en') is-invalid @enderror placeholder="English Name"
                class="form-control" />
            @error('name_en')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Arabic Name</label>
            <input type="text" name="name_ar" @error('name_ar') is-invalid @enderror placeholder="Arabic Name"
                class="form-control" />
            @error('name_ar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control" @error('image') is-invalid @enderror />
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="salary">Salary</label>
                    <input type="text" id="salary" name="salary" class="form-control"
                        @error('salary') is-invalid @enderror />
                    @error('salary')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="sale_price">sale price</label>
                    <input type="text" id="sale_price" name="sale_price" class="form-control" />
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="text" id="quantity" name="quantity" class="form-control" @error('quantity') is-invalid @enderror/>
                    @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label>Category</label>
                    <select name="category_id" class="form-control" @error('category_id') is-invalid @enderror>
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
            <textarea name="content_en" placeholder="English Content" class="myeditor" @error('content_en') is-invalid @enderror></textarea>
@error('content_en')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Arabic Content</label>
            <textarea name="content_ar" placeholder="Arabic Content" class="myeditor" @error('content_ar') is-invalid @enderror ></textarea>
            @error('content_ar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <button class="btn btn-success px-5">Add</button>


    </form>

@endsection



@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.1/tinymce.min.js"
        integrity="sha512-in/06qQzsmVw+4UashY2Ta0TE3diKAm8D4aquSWAwVwsmm1wLJZnDRiM6e2lWhX+cSqJXWuodoqUq91LlTo1EA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
            selector: ".myeditor"
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

@stop
