@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2> Permission </h2>
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('permission.edit', $permission) }}" class="btn btn-warning">
                <i class="fa fa-plus"></i>Edit
            </a>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div> ID - {{$permission->id}}</div>
            <div> Name - {{$permission->name}}</div>
            <div> Guard - {{$permission->guard_name}}</div>
            <div> Created at - {{$permission->created_at}}</div>
            <div> Updated at - {{$permission->updated_at}}</div>
        </div>
    </div>
@endsection
