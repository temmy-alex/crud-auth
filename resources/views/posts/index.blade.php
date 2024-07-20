@extends('layouts.base')

@section('title', 'List Post')

@section('content')
    <div class="container">
        <h1 class="text-center">List Post</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-success mb-4">Add</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>
                        <img src="{{ $post->getImage() }}" alt="{{ $post->title }}" class="img-fluid" style="width: 100px; height: 100px;">
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
