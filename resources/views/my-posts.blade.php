@extends('layout')

@section('content')
    <h1>My Posts</h1>
    @foreach($posts as $post)
        <article>
            <h2>{{ $post->title }}</h2>
            <p><u><a href="#">{{ $post->user->name }}</a>. {{ $post->created_at->format('d.m.Y H:i') }}</u></p>
            <p>{{ $post->description }}</p>

            <a href="#">Edit</a> |
            <a href="{{ route('delete-post', $post) }}"
                onclick="return confirm('?????')"
            >Delete</a>
            <hr>
        </article>
    @endforeach
@endsection
