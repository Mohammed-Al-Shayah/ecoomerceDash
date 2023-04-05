@extends('admin.master')

@section('title','Porducts | '.env('APP_NAME'))

@section('content')

@if (session('msg'))
<div class="alert alert-{{session('type') }} solid  m-5">
{{ session('msg') }}
</div>

@endif
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">All Product</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Category</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($prodects as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                              <span>{{ $product->trans_name }}</span>

                            </td>
                            <td>
                               <img width="80" src="{{ asset('uploads/products/'.$product->image) }}" alt="">

                              </td>
                            <td><span >{{ $product->salary}}</span>
                            </td>
                        </td>
                        <td><span >{{ $product->quantity}}</span>
                        </td>

                    </td>
                    <td><span >{{ $product->category->trans_name}}</span>
                    </td>
                            <td>
                                <span>{{ $product->created_at ? $product->created_at->diffForHumans() :''}}</span>

                              </td>
                            <td>

                                <a class="btn btn-sm btn-primary" href="{{ route('admin.product.edit', $product->id) }}"><i class="fas fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('admin.product.destroy', $product->id) }}" method="POST">
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


@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop
