@extends('admin.master')

@section('title', 'Orders | ' .env('APP_NAME'))


@section('content')

@if (session('msg'))
<div class="alert alert-{{session('type') }} solid  m-5">
{{ session('msg') }}
</div>
@endif

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">All Porducts </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Total</th>
                            <th scope="col">User</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                              <span>{{ $order->total }}</span>

                            </td>

                            <td><span >{{ $order->user->name}}</span>
                            </td>
                            <td>
                                <span>{{ $order->created_at ? $order->created_at->diffForHumans() :''}}</span>

                              </td>
                            <td>

                                <form class="d-inline" action="{{ route('admin.order.destroy', $order->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach



                    </tbody>

                </table>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>

@stop


@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

