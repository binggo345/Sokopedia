@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">             
            @foreach($product as $p)
                <div class="row"> 
                    <div class="col-md-3">
                        <img class="card-img-top" src="/{{$p -> photo}}" alt="Card image cap">
                    </div>
                    <div class="col-md-3">
                        <div class="card-body mt-5">
                            <h5 class="card-title">{{$p -> name}}</h5>
                            <p class="card-text">Price : {{$p -> price}}</p>
                            @foreach($cart as $c)
                            @if($p -> id == $c -> products_id)
                                <label for="quantity">Quantity: {{$c -> quantity}}</label>

                                <form action="{{route ('cart', $c -> id)}}" method="POST" enctype="multipart/form-data">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                                
                                <a href="{{route ('addCart', $p -> id)}}" class="btn btn-success">Edit</a>
                                </form>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
            <br><br>
            <div class="row">
                @if(!empty($c -> quantity))
                <form action="{{route ('checkout')}}" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">Checkout</button>
                </form>
                @else
                    <h6 class="container text-center text-danger">No Item</h6>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection