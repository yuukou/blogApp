@extends('layouts.default')

@section('title')
    {{ $post->title }}
@endsection

@section('content')

    <h1>
        <a href="{{ url('/home') }} " class="header-menu">Back</a>
        {{ $post->title }}
    </h1>

    <p>{!! nl2br(e($post->body)) !!}</p>

    <li>
         @foreach ($categories as $category)
        {{ $category->kind }}
         @endforeach
    </li>

@endsection
















