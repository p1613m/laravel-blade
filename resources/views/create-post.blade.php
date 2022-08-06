@extends('layout')

@section('content')
<h1>Create Post</h1>
<form action="{{ route('create-post-send') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label>Category:
        <select name="category_id">
            @foreach(\App\Models\Category::all() as $category)
                <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
    </label> @error('category_id') {{ $message }} @enderror<br>
    <label>Title: <input type="text" name="title" value="{{ old('title') }}"></label> @error('title') {{ $message }} @enderror<br>
    <label>Description:<br><textarea name="description">{{ old('description') }}</textarea></label> @error('description') {{ $message }} @enderror<br>
    <label>Content:<br><textarea name="content">{{ old('content') }}</textarea></label> @error('content') {{ $message }} @enderror<br>
    <label>Image:<br><input type="file" name="image"></label> @error('image') {{ $message }} @enderror<br>

    <input type="submit" value="Create">
</form>
@endsection
