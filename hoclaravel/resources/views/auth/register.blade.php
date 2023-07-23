@extends('templates.layout')
@section('content')
    <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="mb-4" style="width: 400px;">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-4" style="width: 400px;">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-4" style="width: 400px;">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="text" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
