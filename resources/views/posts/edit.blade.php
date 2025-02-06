@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="card p-4 shadow-lg" style="width: 500px; background-color: #1a1a1a; color: white;">
        <h3 class="text-center fw-bold">Edit Post</h3>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label text-white">Title</label>
                <input type="text" name="title" class="form-control bg-dark text-white border-0" value="{{ $post->title }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Description</label>
                <textarea name="description" class="form-control bg-dark text-white border-0" rows="3" required>{{ $post->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>
    </div>
</div>
@endsection
