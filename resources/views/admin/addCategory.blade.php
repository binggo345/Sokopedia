@extends('layouts.app')

@section('content')
<div class="container text-center">
    <form action="{{ url('/addCategory') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Category Name" required>
        </div>

        <button class="btn btn-primary" type="submit">Add Category</button>
    </form>
</div>
@endsection