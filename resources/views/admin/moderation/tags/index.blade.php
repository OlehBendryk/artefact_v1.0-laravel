@extends('layouts.app')
@section('content')
    <div class="container">


        <div class="row">
            <div class="col-6">
                <h2> Subdomains - {{ $subdomains->count() }}</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('subdomain.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>Create subdomain
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
                        <th>subdomain</th>
                        <th>status</th>
                        <th>created at</th>
                        <th>updated at</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subdomains as $subdomain)
                        <tr>
                            <td>
                                <a href="{{ route('subdomain.show', $subdomain) }}">{{ $subdomain->id }}</a>
                            </td>
                            <td>{{ $subdomain->name }}</td>
                            <td>
                                <a href="{{route('subdomain.show', $subdomain)}}">{{ $subdomain->subdomain }}</a>
                            </td>
                            <td>
                                @if($subdomain->status === 'enable')
                                    {{ $subdomain->status }}
                                @else
                                    {{ $subdomain->status }}
                                @endif
                            </td>
                            <td>{{ $subdomain->created_at }}</td>
                            <td>{{ $subdomain->updated_at }}</td>
                            <td>
                                <a href="{{ route('subdomain.toggle', $subdomain) }}" title="Switch" data-method="PUT"  data-confirm="Ви впевнені, що хочете ви перемкнути subdomain {{$subdomain->name}}">
                                    @if($subdomain->status === 'enable')
                                        <i class="fas fa-toggle-on"></i>
                                    @else
                                        <i class="fas fa-toggle-off"></i>
                                    @endif

                                </a>
                            </td>
                            <td>

                                <a href="{{ route('subdomain.destroy', $subdomain) }}" title="Delete" data-method="DELETE"  data-confirm="Ви впевнені, що хочете видалити subdomain {{$subdomain->name}}?">
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
