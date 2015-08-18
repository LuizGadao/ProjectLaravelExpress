@extends('template')
@section('title')
    Posts
@stop

@section('content')
    <h1>Posts</h1>
        @foreach( $posts as $post )
            <h2>{{$post->title}}</h2>
            <p>{{$post->content}}</p>

            @if( $post->tags->count() > 0)
                <h3>TAGs</h3>
                <ul>
                    @foreach( $post->tags as $tag)
                        <li>{{ $tag->name }}</li>
                    @endforeach
                </ul>
            @endif

            @if( $post->comments->count() > 0 )
                <h3>Comments</h3>
                @foreach( $post->comments as $comment )
                    <b>Name: </b> {{$comment->name}} <br/>
                    <b>Email: </b> {{$comment->email}} <br/>
                    <b>Comment: </b> {{$comment->comment}}<br/> <br/>
                @endforeach
            @endif

            <hr/>
        @endforeach
@stop