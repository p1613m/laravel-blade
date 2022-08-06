@extends('layout')

@section('content')
<h1>Blog</h1>
    @foreach($posts as $post)
        <article>
            <h2>{{ $post->title }}</h2>
            <p><u><a href="#">{{ $post->user->name }}</a>. {{ $post->created_at->format('d.m.Y H:i') }}</u></p>
            <p>{{ $post->description }}</p>
{{--            <a href="{{ route('show-post', [ 'post' => $post ]) }}">Read more..</a>--}}
            <a href="{{ route('show-post', $post) }}">Read more..</a>
            <hr>
        </article>
    @endforeach
@endsection
