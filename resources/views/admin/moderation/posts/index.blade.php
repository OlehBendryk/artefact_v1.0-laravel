@extends('layouts.app')
@section('content')
    <div class="container">


        <div class="row">
            <div class="col-6">
                <h2> Posts - {{ $posts->count() }}</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('post.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>Create post
                </a>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>subdomain</th>
                        <th>tag</th>
                        <th>category</th>
                        <th>moderator</th>
                        <th>title</th>
                        <th>post</th>
                        <th>is_active</th>
                        <th>is_top</th>
                        <th>published at</th>
                        <th>deleted_at</th>
                        <th>picture</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td><a href="{{ route('post.show', $post) }}">{{ $post->id }}</a></td>
                                <td>{{$post->subdomain->name}}</td>
                                <td>{{$post->tag->name}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>{{$post->moderator->name}}</td>
                                <td><a href="{{route('post.show', $post)}}">{{ $post->title }}</td>
                                <td>{{ $post->post }}</td>
                                <td>{{ $post->is_active }}</td>
                                <td>{{ $post->is_top }}</td>
                                <td>{{ $post->published_at }}</td>
                                <td>{{ $post->deleted_at }}</td>
                                <td>{{ $post->picture_url }}</td>

                                <td>
                                    <a href="{{ route('post.destroy', $post) }}" title="Delete" data-method="DELETE"  data-confirm="Ви впевнені, що хочете видалити post {{$post->title}}?">
                                        <i class="fas faw fa-trash-alt text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
