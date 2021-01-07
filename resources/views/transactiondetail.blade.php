@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">   
            <h3>Detail Transaction</h3>          
            @foreach($trans_det as $t)
                <div class="row"> 
                    <div class="col-md-3">
                        <img class="card-img-top" src="/{{$t -> photo}}" alt="Card image cap">
                    </div>
                    <div class="col-md-3">
                        <div class="card-body mt-5">
                            <h5 class="card-title">{{$t -> name}}</h5>
                            <p class="card-text">Price : {{$t -> price}}</p>
                                <label for="quantity">Quantity: {{$t -> quantity}}</label>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>
</div>
@endsection