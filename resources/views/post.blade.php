@extends('layout')

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        <p><u><a href="#">{{ $post->user->name }}</a>. {{ $post->created_at->format('d.m.Y H:i') }}</u></p>
        <p>{{ $post->description }}</p>
        <p>{{ $post->content }}</p>
    </article>
@endsection
