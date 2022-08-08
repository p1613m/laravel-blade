@extends('layout')

@section('content')
    <h1>My Posts</h1>
    @foreach($posts as $post)
        @include('post-template', [
            'post' => $post
        ])
    @endforeach
@endsection
