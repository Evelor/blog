@extends('layouts.main')
@section('content')
    <div>
        <div>{{$post->id}}. {{$post->title}}</div>
        <div>{{$post->content}}</div>
        <div>
            <body><p><img src="{{$post->image}}" alt="Картинка"></p></body>
        </div>
    </div>
    <div><a href="{{route('post.edit', $post->id)}}"><button type="submit" class="btn btn-outline-warning mb-3">Edit</button></a></div>

    <form action="{{route('post.destroy', $post->id)}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-outline-danger mb-3">
    </form>
    <div><a href="{{route('post.index')}}"><button type="submit" class="btn btn-outline-primary mb-3">Back</button></a></div>
@endsection
