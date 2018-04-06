@extends('layouts.admin')

@section('content')
    @if(Session::has('category_created'))
        <p class="alert alert-success">{{ session('category_created') }}</p>
    @endif
    @if(Session::has('category_updated'))
        <p class="alert alert-info">{{session('category_updated')}}</p>
    @endif
    @if(Session::has('category_deleted'))
        <p class="alert alert-danger">{{ session('category_deleted') }}</p>
    @endif
    <h1>Categories</h1>
    <div class="col-sm-6">
        {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-6">
        @if($categories)
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td><a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                            <td>{{ $category->created_at ? $category->created_at->diffForHumans() : 'No Date' }}</td>
                        </tr>
                    @endforeach
            </table>
        @endif
    </div>
@stop