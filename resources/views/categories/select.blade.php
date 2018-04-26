@extends('layouts.default')

@section('title')
    Select or Make Category
@endsection

@section('content')
    <h1>
        Category
        <a href="{{ url('/posts/create') }} " class="header-menu">Back</a>
    </h1>
    <form method="post" action="{{ url('/categories') }}">
        {{ csrf_field() }}
        <span >
            <input type="text" name="kind" placeholder="Add Category" value="{{ old('kind') }}">
            <input type="submit" value="Add">
        </span>
    </form>
<div class="select-category">
    <fieldset class="select-category">
        <legend>Category</legend>
        @forelse($categories as $category)
            <p>{{ $category->kind }}</p>
            <a href="#" class="del" data-id="{{ $category->id }}">[x]</a>
            <form method="post" action="{{ action('CategoriesController@destroy',$category) }}" id="form_{{ $category->id }}">
                {{ csrf_field() }}
                {{ method_field('delete') }}
            </form>
        @empty
            No Categories Yet
        @endforelse
    </fieldset>
</div>
    <script src="/js/main.js"></script>
@endsection



































