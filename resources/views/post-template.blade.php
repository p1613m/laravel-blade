<article>
    <h2>{{ $post->title }}</h2>
    <img src="{{ $post->image_url }}" alt=""
         style="@if(isset($postPage)) width: 500px; @else width: 250px; @endif"
    >
    <p><a href="{{ route('home', [ 'category_id' => $post->category_id ]) }}">{{ $post->category->name }}</a></p>
    <p><u><a href="{{ route('home', [ 'user_id' => $post->user_id ]) }}">{{ $post->user->name }}</a>. {{ $post->created_at->format('d.m.Y H:i') }}</u></p>
    <p>{{ $post->description }}</p>
    @if(isset($postPage))
        <p>{!! $post->content !!}</p>
    @endif

    @if(Auth::id() == $post->id)
        <a href="{{ route('edit-post', $post) }}">Edit</a> |
        <a href="{{ route('delete-post', $post) }}"
           onclick="return confirm('?????')"
        >Delete</a> |
    @endif
    @if(!isset($postPage))
        <a href="{{ route('show-post', $post) }}">Read more..</a>
    @endif
    <hr>
</article>
