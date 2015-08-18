@extends('template')

@section('title')
    Adim-Posts
@stop

@section('content')
    <h1>Blog admin</h1>

    <a href="{{ route('admin.posts.create') }}" class="btn btn-success">New post</a> <br/><br/>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>
                <a href="{{ route('admin.posts.edit', ['id'=>$post->id]) }}">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
            </td>
            <td>
                <a href="{{ route('admin.posts.destroy', ['id'=>$post->id]) }}">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>

        </tr>
        @endforeach
    </table>

    {!! $posts->render() !!}


@stop