@extends('layouts.base')

@section('title', 'Create Post')

@section('content')
<div class="container">
    <h1 class="text-center">Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-4 row">
            <label class="control-label text-right col-md-3">Title</label>
            <div class="col-md-5">
                <input type="text" name="title" id="title"
                    class="form-control" autocomplete="title"
                    value="{{ old('title') }}">

                @error('title')
                    <div class="text-danger">
                        <small>{{ $message }}</small>
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group mb-4 row">
            <label class="control-label text-right col-md-3">Description</label>
            <div class="col-md-5">
                <input type="text" name="description" id="description"
                    class="form-control" autocomplete="description"
                    value="{{ old('description') }}">

                @error('description')
                    <div class="text-danger">
                        <small>{{ $message }}</small>
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="image" class="control-label text-right col-md-3">Image</label>
            <div class="col-md-5">
                <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">

                @error('image')
                    <div class="text-danger">
                        <small>{{ $message }}</small>
                    </div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="" class="btn btn-success">Back</a>
    </form>
</div>
@endsection
