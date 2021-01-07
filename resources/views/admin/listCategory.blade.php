@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div style="color: #636b6f; font-size:24px;">Category</div>
    <br>
    <table class="table">
        <tbody>
            @foreach($type as $t)
            <tr>
                <td>
                    <a href="{{ url('/listCategoryDet', $t -> id) }}" style="text-decoration: none; color: gray;" >{{$t -> name}}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection