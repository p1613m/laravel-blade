@extends('layout')

@section('content')
    @include('post-template', [
        'post' => $post,
        'postPage' => true
    ])

    <form action="{{ route('send-comment', $post) }}" method="post">
        @csrf
        @guest
            <label>Name: <input type="text" placeholder="Your name" name="name" value="{{ old('name') }}"></label> @error('name') {{ $message }} @enderror<br>
        @endguest
        <label>Comment:<br><textarea placeholder="Your comment" name="comment">{{ old('comment') }}</textarea> @error('comment') {{ $message }} @enderror</label><br>
        <input type="submit" value="Send">
    </form>
    <hr>

    @foreach($post->comments as $comment)
        <div>
            <b>{{ $comment->nickname }}</b> {{ $comment->created_at->format('d.m.Y H:i') }}
            @if(Auth::id() == $post->user_id || (Auth::user() && Auth::id() == $comment->user_id))
                | <a href="{{ route('delete-comment', $comment) }}" onclick="return confirm('????')">Удалить</a>
            @endif
            <p>{{ $comment->comment }}</p>
        </div>
        <hr>
    @endforeach
@endsection
