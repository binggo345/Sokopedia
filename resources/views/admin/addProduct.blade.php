@extends('layouts.app')

@section('content')
<div class="container text-center">
    <form action="{{ url('/addProduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="color: #636b6f; font-size:24px;">Add Product</div>
        <br>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" required>
        </div>

        <div class="form-group">
            <label for="cat">Category</label>
            <select class="form-control" id="cat" name="cat" required> 
                <option selected disabled value="">Select Category</option>
                @foreach($type as $t)
                <option value="{{$t -> id}}">{{$t -> name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="desc">Description</label>
            <input type="text" class="form-control" id="desc" name="desc" placeholder="Product Description" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Product Price" required>
        </div>

        <div class="form-group">
            <label for="img" class="justify-content-center">Choose File</label>
            <input type="file" class="form-control-file" id="img" name="img" required>
        </div>

        <button class="btn btn-light" type="submit">Add Product</button>
    </form>
</div>
@endsection