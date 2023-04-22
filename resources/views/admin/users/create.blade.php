@extends('admin.master')


@section('title', 'Add User | ' . env('APP_NAME'))

@section('content')

    @if (session('msg'))
        <div class="alert alert-{{ session('type') }} solid  m-5">
            {{ session('msg') }}
        </div>
    @endif


    <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data" class="m-5">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" @error('name') is-invalid @enderror placeholder="Name" class="form-control" />
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="text" name="email" @error('email') is-invalid @enderror placeholder="Email"
                class="form-control" />
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" @error('password') is-invalid @enderror placeholder="Password"
                class="form-control" />
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control" @error('type') is-invalid @enderror>
                <option value="">Select</option>
                <option value="user" {{ old('type') == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('type') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <button class="btn btn-success px-5">Add</button>


    </form>

@endsection



@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

@stop
