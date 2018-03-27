@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Post Id</th>
                <th>User Id</th>
                <th>Category Id</th>
                <th>Photo Id</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->user_id }}</td>
                <td>{{ $post->category_id }}</td>
                <td>{{ $post->photo_id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop