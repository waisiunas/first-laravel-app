@extends('layouts.app')

@section('contents')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h4>Users</h4>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('create_user') }}" class="btn btn-primary">Add User</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (count($users) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary">Edit</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger" role="alert">
                    Nothing Found BRO
                </div>
            @endif

        </div>
    </div>
@endsection
