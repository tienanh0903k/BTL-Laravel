@extends('admin.layoutAdmin')

@section('title', 'Update Product')

@section('content')
    <hr />
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ $product->title }}" class="form-control" id="title" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control" id="price" placeholder="Enter price">
        </div>
        <div class="form-group">
            <label for="discount">Discount</label>
            <input type="number" name="discount" value="{{ $product->discount }}" class="form-control" id="discount" placeholder="Enter discount">
        </div>
        <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control-file" id="thumbnail">
            <img src="{{ asset('uploads/product/'.$product->thumbnail)}}" width="70px" height="70px" alt="Anh dai dien" />
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Enter description">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control" id="category_id">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>


@endsection
