@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img class="card-img-top" src="/{{$product -> photo}}" alt="Card image cap">
                </div>
                <div class="col">
                    <div class="card-body mt-5">
                        <h5 class="card-title">{{$product -> name}}</h5>
                        <p class="card-text">Price : {{$product -> price}}</p>
                        <p class="card-text">{{$product -> desc}}</p>
                        <a href="{{route ('addCart', $product -> id)}}" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection