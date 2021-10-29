@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2> Category</h2>
        </div>

        <div class="col-6 text-right">
            <a href="{{ route('category.edit', $category) }}" class="btn btn-warning">
                <i class="fa fa-plus"></i>Edit
            </a>
            <a href="{{ route('category.destroy', $category) }}" class="btn btn-danger" data-method="DELETE" data-confirm="Ви впевнені, що хочете видалити category {{$category->name}}?">
                <i class="fas faw fa-trash-alt "></i>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div> ID - {{$category->id}}</div>
            <div> Subdomain - {{$category->subdomain->subdomain}}</div>
            <div> Name - {{$category->name}}</div>
            <div> Code - {{$category->code}}</div>
        </div>
    </div>
@endsection
