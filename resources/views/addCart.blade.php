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
                    <form action="{{route ('addCart', $product -> id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="hidden_user_id" value="{{ Auth::user()-> id }}">
                        <input type="hidden" name="hidden_product_id" value="{{$product -> id}}">
                        <div class="card-body mt-5">
                            <h5 class="card-title">{{$product -> name}}</h5>
                            <p class="card-text">Price : {{$product -> price}}</p>
                            <p class="card-text">{{$product -> desc}}</p>
                            <label for="quantity">Quantity: </label>
                            <input type="number" id="quantity" name="quantity" min="1" max="1000" value="{{$quantity}}" required> 
                            <br>
                            <br>
                            <button class="btn btn-primary" type="submit">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection