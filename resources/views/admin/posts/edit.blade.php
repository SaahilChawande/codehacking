@extends('layouts.admin')

@section('content')
    <h1>Edit Post</h1>
    <div class="row">
        {!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title: ') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id', 'Category: ') !!}
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Choose a category']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id', 'Photo: ') !!}
            {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('body', 'Description: ') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="row">
        @include('includes.form-error')
    </div>
@stop