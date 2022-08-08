@extends('layout')

@section('content')
    <h1>Blog</h1>

    @foreach(\App\Models\Category::all() as $category)
        <a href="{{ route('home', [ 'category_id' => $category->id ]) }}"
            @if(request()->get('category_id') == $category->id) style="font-weight: bold" @endif
        >
            {{ $category->name }}
        </a> ({{ $category->posts()->count() }})
        @if(!$loop->last)
            |
        @endif
    @endforeach

    @forelse($posts as $post)
        @include('post-template', [
            'post' => $post
        ])
    @empty
        <p>Постов нет</p>
    @endforelse

@endsection
