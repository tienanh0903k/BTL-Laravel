@extends('admin.layoutAdmin')
@section('title', 'Home Product')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0">List Product</h5>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    </div>
    <hr />

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>STT</th>
                <th>Title</th>
                <th>Price</th>
                <th>Id</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($product->count() > 0)
            @foreach($product as $rs)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $rs->title }}</td>
                    <td class="align-middle">{{ $rs->price }}</td>
                    <td class="align-middle">{{ $rs->id }}</td>
                    <td class="align-middle">
                        <img src="{{ asset('uploads/product/'.$rs->thumbnail)}}" width="70px" height="70px" alt="Anh dai dien" />
                    </td>
                    <td class="align-middle">{{ $rs->description }}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('products.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('products.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">Product not found</td>
            </tr>
        @endif
        </tbody>
    </table>


@endsection
