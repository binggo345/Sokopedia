@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div style="color: #636b6f; font-size:24px;">Product</div>
    <br>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Product ID</th>
            <th scope="col">Product Image</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Category</th>
            <th scope="col">Product Price</th>
            <th scope="col">Product Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $p)
            <tr>
                <th scope="row">{{$p -> id}}</th>
                <td><img class="card-img-top" src="/{{$p -> photo}}" alt="Card image cap" style="max-width: 80px"></td>
                <td>{{$p -> name}}</td>
                <td>{{$p -> types_id}}</td>
                <td>{{$p -> price}}</td>
                <td>{{$p -> desc}}</td>
                <td>
                    <form action="{{ url('/listProduct', $p -> id) }}" method="POST" enctype="multipart/form-data">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection