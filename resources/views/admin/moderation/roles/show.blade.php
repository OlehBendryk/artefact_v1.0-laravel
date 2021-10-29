@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2> Role </h2>
        </div>
        <div class="col-6 text-right">
{{--            <a href="{{ route('role.edit', $role) }}" class="btn btn-warning">--}}
{{--                <i class="fa fa-plus"></i>Edit--}}
{{--            </a>--}}
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div> ID - {{$role->id}}</div>
            <div> Name - {{$role->name}}</div>
            <div> Guard - {{$role->guard_name}}</div>
            <div> Created at - {{$role->created_at}}</div>
        </div>
    </div>
@endsection
