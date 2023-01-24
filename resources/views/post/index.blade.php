@extends('layouts.main')
@section('content')
    <div>
        @foreach($posts as $post)
            <div><a href="{{route('post.show', $post->id)}}"> {{$post->id}}. {{$post->title}}</a></div>
        @endforeach
    </div>
    <div><a href="{{route('post.create')}}"><button type="submit" class="btn btn-outline-success">Add</button></a></div>
    <div>
        {{$posts->withQueryString()->links()}}
    </div>
@endsection
