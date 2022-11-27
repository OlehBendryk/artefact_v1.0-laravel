@extends('layouts.admin')

@section('content')
    <div class="container">


    <div class="row pt-3 pb-3 mb-3 border-bottom">
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
                    <th>region</th>
                </tr>
                </thead>
                <tbody>
                    @if(Auth::user()->roles->first()->name == 'admin')
                        @foreach($journalists as $journalist)
                            <tr>
                                <td>{{ $journalist->id }}</td>
                                <td>
                                    <a href="{{ route('moderator.show', $journalist) }}">
                                        {{ $journalist->name }}
                                    </a>
                                </td>
                                <td>{{ $journalist->email }}</td>
                                <td>{{ $journalist->subdomain->name }}</td>
                            </tr>
                        @endforeach
                    @else
                        @foreach($moderators as $moderator)
                            <tr>
                                <td>{{ $moderator->id }}</td>
                                <td>
                                    <a href="{{ route('moderator.show', $moderator) }}">
                                        {{ $moderator->name }}
                                    </a>
                                </td>
                                <td>{{ $moderator->email }}</td>
                                <td>{{ $moderator->subdomain->name }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    </div>

@endsection
