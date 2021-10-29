@extends('layouts.admin')

@section('content')
    <div class="container">


        <div class="row pt-3 pb-3 mb-3 border-bottom">
            <div class="col-6">
                <h2> Tags - {{ $tags->count() }}</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('tag.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>Create tag
                </a>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>code</th>
                        <th>created at</th>
                        <th>updated at</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td><a href="{{ route('tag.show', $tag) }}">{{ $tag->id }}</a></td>
                                <td><a href="{{route('tag.show', $tag)}}">{{ $tag->name }}</a></td>
                                <td>{{ $tag->code }}</td>
                                <td>{{ $tag->created_at }}</td>
                                <td>{{ $tag->updated_at }}</td>
                                <td>
                                    <a href="{{ route('tag.destroy', $tag) }}" class="btn btn-danger" title="Delete" data-method="DELETE"  data-confirm="Ви впевнені, що хочете видалити tag {{$tag->name}}?">
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
