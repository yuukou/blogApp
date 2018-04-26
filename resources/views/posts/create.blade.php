@extends('layouts.default')

@section('title', 'New Post')

@section('content')
    <h1>
        <a href="{{ url('/home') }}" class="header-menu">Back</a>
        New Post
    </h1>
        <p>
            <a href="{{ url('/categories')}}" >Categories</a>
        </p>
    <form method="post" action="{{ url('/posts') }}">
        <div class="check-category">
        <fieldset>
        <legend>Category</legend>
        @forelse($categories as $category)
            <p><input type="checkbox" name="kind[]" id=kind0 value="{{ $category->id }}">{{ $category->kind }}</p>
        @empty
            No Categories Yet
        @endforelse
        </fieldset>
        </div>

        {{ csrf_field() }}
        <p>
            <input type="text" name="title" placeholder="enter title" value="{{ old('title') }}">
            @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
            @endif
        </p>
        <p>
            <textarea name="body" placeholder="enter body">{{ old('body') }}</textarea>
            @if ($errors->has('body'))
                <span class="error">{{ $errors->first('body') }}</span>
            @endif
        </p>
        <p>
            <button class="sub-btn" type="submit" value="Add">Add</button>
        </p>
    </form>
@endsection



















