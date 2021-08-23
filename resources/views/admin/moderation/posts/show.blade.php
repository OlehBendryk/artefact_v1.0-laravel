@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2> Post</h2>
        </div>

        <div class="col-6 text-right">
            <a href="{{ route('post.edit', $post) }}" class="btn btn-warning">
                <i class="fa fa-plus"></i>Edit
            </a>
            <a href="{{ route('post.destroy', $post) }}" class="btn btn-danger" data-method="DELETE" data-confirm="Ви впевнені, що хочете видалити post {{$post->title}}?">
                <i class="fas faw fa-trash-alt "></i>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div> ID - {{$post->id}}</div>
            <div> Domain - {{$post->subdomain->name}}</div>
            <div> Tag - {{$post->tag->name}}</div>
            <div> Category - {{$post->category->name}}</div>
            <div> Moderator - {{$post->moderator->name}}</div>
            <div> Title - {{$post->title}}</div>
            <div> Post - {{$post->post}}</div>
            <div> Active - {{$post->is_active}}</div>
            <div> Top - {{$post->is_top}}</div>
            @if($post->published_at)
                <div> Published at - {{$post->published_at}}</div>
            @endif
            @if($post->deleted_at)
                <div> Deleted at - {{$post->deleted_at}}</div>
            @endif
            @if($post->picture_url)
                <div> Picture - {{$post->picture_url}}</div>
            @endif
        </div>
    </div>
@endsection
