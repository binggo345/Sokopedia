@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead class="bg-success">
                    <td class="row" style="padding-left: 2rem; color:white;"> 
                        Transaction History
                    </td> 
            </thead>
            <tbody>
                @foreach($trans as $t)
                    <td class="row" style="padding-left: 2rem;"> 
                        <a href="{{route ('transactiondetail', $t->id)}}" style="text-decoration: none; color: gray;" >{{$t -> created_at}}</a>
                    </td>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection