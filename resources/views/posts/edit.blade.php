@extends('layouts.app')

@section('contents')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4>Edit Post</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('single_post', $post) }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">

        @include('paritials.alerts')

        <form action="{{ route('edit_post', $post) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title">Post Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    id="title" value="{{ old('title') ? old('title') : $post->title }}" placeholder="Please enter your title">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-3">
                <label for="body">Post Body</label>
                <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" cols="30" rows="10" placeholder="Please enter your Post Body">{{ old('body') ? old('body') : $post->body }}</textarea>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection