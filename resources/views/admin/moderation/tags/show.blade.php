@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2> Tag</h2>
        </div>

        <div class="col-6 text-right">
            <a href="{{ route('tag.edit', $tag) }}" class="btn btn-warning">
                <i class="fa fa-plus"></i>Edit
            </a>
            <a href="{{ route('tag.destroy', $tag) }}" class="btn btn-danger" data-method="DELETE" data-confirm="Ви впевнені, що хочете видалити tag {{$tag->name}}?">
                <i class="fas faw fa-trash-alt "></i>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div> ID - {{$tag->id}}</div>
            <div> Name - {{$tag->name}}</div>
            <div> Code - {{$tag->code}}</div>
            <div> Created at - {{$tag->created_at}}</div>
            <div> Updated at - {{$tag->updated_at}}</div>
        </div>
    </div>
@endsection
