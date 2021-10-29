@extends('layouts.admin')

@section('content')
    <div class="container">


        <div class="row pt-3 pb-3 mb-3 border-bottom">
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
                        <th>active</th>
                        <th>top</th>
                        <th>published at</th>
                        <th>deleted at</th>
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
                                <td>
                                    {!! $post->excerpt !!} ...
                                    <a href="{{ route('post.show', $post) }}">читати повністю</a>
                                </td>
                                <td>{{ $post->is_active }}</td>
                                <td>{{ $post->is_top }}</td>
                                <td>{{ $post->published_at }}</td>
                                <td>{{ $post->deleted_at }}</td>
                                <td>{{ $post->picture_url }}</td>

                                <td>
                                    <a href="{{ route('post.destroy', $post) }}" class="btn btn-danger" title="Delete" data-method="DELETE"  data-confirm="Ви впевнені, що хочете видалити post {{$post->title}}?">
                                        <i class="fas faw fa-trash-alt"></i>
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
