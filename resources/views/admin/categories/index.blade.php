@extends('admin.master')

@section('title','Categorise | '.env('APP_NAME'))

@section('content')

@if (session('msg'))
<div class="alert alert-{{session('type') }} solid  m-5">
{{ session('msg') }}
</div>

@endif
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">All categories</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Parent</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                              <span>{{ $category->trans_name }}</span>

                            </td>
                            <td>
                               <img width="80" src="{{ asset('uploads/categories/'.$category->image) }}" alt="">

                              </td>
                            <td><span >{{ $category->perant->trans_name}}</span>
                            </td>
                            <td>
                                <span>{{ $category->created_at ? $category->created_at->diffForHumans() :''}}</span>

                              </td>
                            <td>

                                <a class="btn btn-sm btn-primary" href="{{ route('admin.category.edit', $category->id) }}"><i class="fas fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop
