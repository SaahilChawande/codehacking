@extends('layouts.admin')

@section('content')
    @if(Session::has('media_deleted'))
        <p class="alert alert-success">{{ session('media_deleted') }}</p>
    @endif
    <h1>Media</h1>
    @if($photos)
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <td>{{ $photo->id }}</td>
                        <td><img style="height: 50px; border-radius: 5px" src="{{ $photo->file ? $photo->file : 'No Photo Available' }}" alt="No Photo Available"></td>
                        <td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : 'No Date Available' }}</td>
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}
                            <td class="form-group">
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            </td>
                        {!! Form::close() !!}
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop