@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-2 col-6">
            <div class="card-header"> Edit Moderator Role</div>
            <div class="card-body">
{{--                {{ Form::model($moderator, ['route' => ['moderator.update', $moderator->id], 'method' => 'put']) }}--}}
                {{ Form::open(['route' => ['moderator.update', $moderator], 'method' => 'put', 'files' => true]) }}

                    <div class="form-group row">
                        {{ Form::label('role', 'Role') }}
                        {{ Form::select('role', $roles, ['class' => "form-control" .  ($errors->has('role') ? 'is-invalid' : '')]) }}
                        @if($errors->has('role'))
                            <span class="invalid-feedback" role="alert"></span>
                            <strong> {{ $errors->first('role') }}</strong>
                        @endif
                    </div>

                    <div class="form-group ">
                        <div class="col-md-12 mt-2">
                            {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                        </div>
                    </div>
                {{ Form::close() }}
                </div>
            </div>
        </div>
@endsection
