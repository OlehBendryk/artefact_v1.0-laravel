@extends('layouts.admin')

@section('content')
    <div class="container">


        <div class="row pt-3 pb-3 mb-3 border-bottom">
            <div class="col-6">
                <h2> Categories - {{ $categories->count() }}</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('category.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>Create category
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
                        <th>name</th>
                        <th>code</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td><a href="{{ route('category.show', $category) }}">{{ $category->id }}</a></td>
                                <td>{{ $category->subdomain->name }}</td>
                                <td><a href="{{route('category.show', $category)}}">{{ $category->name }}</a></td>
                                <td>{{$category->code }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $category) }}" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="{{ route('category.destroy', $category) }}" class="btn btn-danger" title="Delete" data-method="DELETE"  data-confirm="Ви впевнені, що хочете видалити category {{$category->name}}?">
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
