@extends('layout')

@section('content')
    @include('post-template', [
        'post' => $post,
        'postPage' => true
    ])
@endsection
