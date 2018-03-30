@extends('layouts.admin')

@section('content')
    @if(Session::has('created_post'))
        <p class="alert alert-success">{{ session('created_post') }}</p>
    @endif
    @if(Session::has('updated_post'))
        <p class="alert alert-info">{{session('updated_post')}}</p>
    @endif
    @if(Session::has('deleted_post'))
        <p class="alert alert-danger">{{ session('deleted_post') }}</p>
    @endif
    <h1>Posts</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Owner</th>
                <th>Category</th>
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
                <td><img height="50px" src="{{ $post->photo ? $post->photo->file : 'https://picsum.photos/75/50/?random' }}" alt="No User Photo" class="img-rounded"></td>
                <td><a href="{{ route('posts.edit', $post->id) }}">{{ $post->user->name }}</a></td>
                <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ str_limit($post->body, 20) }}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop