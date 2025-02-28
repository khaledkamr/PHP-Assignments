@extends('admin.layout')
@section('body')
<style>
    body {
        background-color: #212529;
        color: #ffffff;
    }
    
    .form-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #2c3034;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }

    .form-control {
        background-color: #343a40;
        border-color: #495057;
        color: #ffffff;
    }

    .form-control:focus {
        background-color: #343a40;
        border-color: #6c757d;
        color: #ffffff;
        box-shadow: 0 0 0 0.25rem rgba(108, 117, 125, 0.25);
    }

    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
        border-color: #0a58ca;
    }
</style>
<div class="container">
    @if(Session::has("success"))
        <p class="alert alert-success">{{session::get('success')}}</p>
    @endif
    <div class="form-container">
        <h2 class="text-center mb-4">Edit Product</h2>
        <form action="{{route('updateProduct', $product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" name="name" value="{{$product->name}}" class="form-control" id="productName" placeholder="Enter product name">
            </div>
            @error('name')
                <p class="alert alert-danger text-center">{{$message}}</p>
            @enderror

            <div class="mb-3">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" name="desc" id="productDescription" rows="3" placeholder="Enter product description">{{$product->desc}}</textarea>
            </div>
            @error('desc')
                <p class="alert alert-danger text-center">{{$message}}</p>
            @enderror

            <div class="mb-3">
                <label for="productPrice" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" name="price" value="{{$product->price}}" class="form-control" id="productPrice" step="0.01" min="0" placeholder="0.00">
                </div>
            </div>
            @error('price')
                <p class="alert alert-danger text-center">{{$message}}</p>
            @enderror

            <div class="mb-3">
                <label for="productImage" class="form-label">Product Image</label>
                <input type="file" name="image" class="form-control" id="productImage" accept="image/*">
                <img src="{{asset("storage/$product->image")}}" width="200px" alt="">
            </div>
            @error('image')
                <p class="alert alert-danger text-center">{{$message}}</p>
            @enderror

            <div class="mb-3">
                <label for="productQuantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control" id="productQuantity" min="0" placeholder="Enter quantity">
            </div>
            @error('quantity')
                <p class="alert alert-danger text-center">{{$message}}</p>
            @enderror

            <div class="d-grid">
                <button type="submit" class="btn btn-primary fw-bold p-3">Add Product</button>
            </div>
        </form>
    </div>
</div>
@endsection