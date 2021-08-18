@extends('layouts.app')

@section('content')
    <div class="container">


    <div class="row">
        <div class="col-6">
            <h2> Moderators - {{ $moderators->count() }}</h2>
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('moderator.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>Create moderator
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
                    <th>mail</th>
                </tr>
                </thead>
                <tbody>
                @foreach($moderators as $moderator)
                    <tr>
                        <td>{{ $moderator->id }}</td>
                        <td>
                            <a href="{{ route('moderator.show', $moderator) }}">
                                {{ $moderator->name }}
                            </a>
                        </td>
                        <td>{{ $moderator->email }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    </div>

@endsection
