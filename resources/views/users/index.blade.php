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

            @include('paritials.alerts')

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
                                    <a href="{{ route('edit_user', $user->id) }}" class="btn btn-primary">Edit</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteUser({{ $user->id }})">
                                        Delete
                                    </button>
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

    @include('paritials.modal')

    <script>
        function deleteUser(id) {
            const deleteForm = document.getElementById('delete-form');
            let route = "{{ route('delete_user', ':id') }}";
            route = route.replace(':id', id);
            deleteForm.setAttribute('action', route);
        }
    </script>
@endsection
