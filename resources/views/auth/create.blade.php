@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<div class="d-flex justify-content-center align-items-start mt-5">
    <div class="card p-4 shadow-lg border-0" style="width: 500px; background-color: #1e1e1e; color: #ffffff;">
        <h3 class="text-center text-white">Create Post</h3>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label text-white">Title</label>
                <input type="text" name="title" class="form-control bg-dark text-white border-0" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-white">Description</label>
                <textarea name="description" class="form-control bg-dark text-white border-0" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Create</button>
        </form>
    </div>
</div>
@endsection
