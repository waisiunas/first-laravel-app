@extends('layouts.app')

@section('contents')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4>Add User</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('show_users') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('create_user') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Please enter your name">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Please enter your Email">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Please enter your Password">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        </form>
    </div>
</div>
    
@endsection
