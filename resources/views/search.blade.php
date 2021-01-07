@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @if(Auth::user()->is_admin == 1)
        <div style="color: #636b6f; font-size:24px;">Admin</div>
    @else
        <div class="container">
            <div class="row">
                @foreach($product as $p)
                <div class="col-sm">
                    <div class="card" style="width: 20rem;">
                        <div class="card-body mx-auto" style="height: 20rem;">
                            <img class="card-img-top" src="{{$p -> photo}}" alt="Card image cap">
                        </div>    
                        <div class="card-body">
                            <h5 class="card-title">{{$p -> name}}</h5>
                            <p class="card-text">{{$p -> price}}</p>
                            <a href="{{route('detail', $p -> id)}}" class="btn btn-primary">Product Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{ $product->links() }}
    @endif
    </div>
</div>
@endsection