@extends('layouts.admin')

@section('content')
    <div class="container">


        <div class="row pt-3 pb-3 mb-3 border-bottom">
            <div class="col-6">
                <h2> Permissions - {{ $permissions->count() }}</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('permission.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>Create permissions
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
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <a href="{{ route('permission.destroy', $permission) }}" title="Delete" data-method="DELETE"  data-confirm="Ви впевнені, що хочете видалити доступ?">
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
