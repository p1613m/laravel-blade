@extends('layout')

@section('content')
<h1>Edit Post</h1>
<form action="{{ route('edit-post-send', $post) }}" method="post" enctype="multipart/form-data">
    @csrf
    <label>Category:
        <select name="category_id">
            @foreach(\App\Models\Category::all() as $category)
                <option value="{{ $category->id }}" @if(old('category_id', $post->category_id) == $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
    </label> @error('category_id') {{ $message }} @enderror<br>
    <label>Title: <input type="text" name="title" value="{{ old('title', $post->title) }}"></label> @error('title') {{ $message }} @enderror<br>
    <label>Description:<br><textarea name="description">{{ old('description', $post->description) }}</textarea></label> @error('description') {{ $message }} @enderror<br>
    <label>Content:<br><textarea name="content">{{ old('content', $post->content) }}</textarea></label> @error('content') {{ $message }} @enderror<br>
    <label>Image:<br>
        <img src="{{ $post->image_url }}" alt="" style="width: 150px;">
        <br><input type="file" name="image">
    </label> @error('image') {{ $message }} @enderror<br>

    <input type="submit" value="Edit">
</form>
@endsection
