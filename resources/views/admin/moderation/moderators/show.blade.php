@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Moderator #{{$moderator->id}}</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div> ID - {{$moderator->id}}</div>
                        <div> Name - {{$moderator->name}}</div>
                        <div> Email - {{$moderator->email}}</div>
                        <div> Role - <span class="text-success">{{$moderator->roles()->first()->name}}</span></div>
                        <div> Region - {{$moderator->subdomain->name}}</div>
                        <div> Domain - <span class="text-primary">{{$moderator->subdomain->subdomain}}</span></div>
                    </div>

                    <div class="col-4 text-right">
                        <a href="{{ route('moderator.edit', $moderator) }}" class="btn btn-warning">
                            <i class="fas fa-pencil-alt"></i> Edit role
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('moderator.destroy', $moderator) }}" class="btn btn-danger" data-method="DELETE" data-confirm="Ви впевнені, що хочете видалити moderator {{$moderator->name}}?">
                                <i class="fas faw fa-trash-alt "></i>  Remove
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
