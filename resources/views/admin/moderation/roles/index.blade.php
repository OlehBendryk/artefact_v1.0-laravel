@extends('layouts.admin')

@section('content')
    <div class="container">


        <div class="row pt-3 pb-3 mb-3 border-bottom">
            <div class="col-6">
                <h2> Roles - {{ $roles->count() }}</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('role.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>Create role
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
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>
                                <a href="{{ route('role.show', $role) }}">
                                    {{ $role->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('role.destroy', $role) }}" class="btn btn-danger" title="Delete" data-method="DELETE"  data-confirm="Ви впевнені, що хочете видалити Role {{ $role->name }}?">
                                    <i class="fas faw fa-trash-alt"></i>
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
