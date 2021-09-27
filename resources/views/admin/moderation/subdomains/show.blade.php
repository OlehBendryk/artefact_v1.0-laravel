@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2> Subdomain
                <a href="{{ route('subdomain.toggle', $subdomain) }}" title="Switch" data-method="PUT"  data-confirm="Ви впевнені, що хочете ви перемкнути subdomain {{$subdomain->name}}?">
                    @if($subdomain->status === 'enable')
                        <i class="fas fa-toggle-on"></i>
                    @else
                        <i class="fas fa-toggle-off"></i>
                    @endif
                </a>
            </h2>
        </div>

        <div class="col-6 text-right">
            <a href="{{ route('subdomain.edit', $subdomain) }}" class="btn btn-warning">
                <i class="fa fa-plus"></i>Edit
            </a>
            <a href="{{ route('subdomain.destroy', $subdomain) }}" class="btn btn-danger" data-method="DELETE" data-confirm="Ви впевнені, що хочете видалити subdomain {{$subdomain->name}}?">
                <i class="fas faw fa-trash-alt "></i>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div> ID - {{$subdomain->id}}</div>
            <div> Name - {{$subdomain->name}}</div>
            <div> Subdomain - {{$subdomain->subdomain}}</div>
            <div> Created at - {{$subdomain->created_at}}</div>
            <div> Updated at - {{$subdomain->updated_at}}</div>
        </div>
    </div>
@endsection
