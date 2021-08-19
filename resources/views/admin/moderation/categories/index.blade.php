@extends('layouts.app')
@section('content')
    <div class="container">


        <div class="row">
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
                        <th>subdomain_id</th>
                        <th>name</th>
                        <th>code</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td><a href="{{ route('category.show', $category) }}">{{ $category->id }}</a></td>
                                <td>{{ $category->subdomain_id }}</td>
                                <td><a href="{{route('category.show', $category)}}">{{ $category->name }}</a></td>
                                <td>{{ '#' . $category->code }}</td>
                                <td>
                                    <a href="{{ route('category.destroy', $category) }}" title="Delete" data-method="DELETE"  data-confirm="Ви впевнені, що хочете видалити category {{$category->name}}?">
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
