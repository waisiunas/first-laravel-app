@extends('layouts.app')

@section('contents')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4>Posts</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('create_post') }}" class="btn btn-primary">Add Post</a>
            </div>
        </div>
    </div>
    <div class="card-body">

        @include('paritials.alerts')

        @if (count($posts) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td><a href="{{ route('single_post', $post) }}" class="btn btn-primary">Show</a></td>
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