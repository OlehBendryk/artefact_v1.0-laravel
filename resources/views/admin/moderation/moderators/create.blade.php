@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"> Create moderator</div>
            <div class="card-body">
                {{ Form::open([
                        'route' => 'moderator.store',
                        'method' => 'post',
                        'role' => 'form',
                        'enctype' => 'multipart/form-data',
                    ]) }}
                @csrf
                <div class="form-group row">

                    {{ Form::label('name', 'Name', ['class' => 'col-4 text-md-right']) }}
                        {{ Form::text('name',null , ['class' => "form-control col-8" .  ($errors->has('name') ? 'is-invalid' : '')], 'required') }}
                        @if($errors->has('name'))
                            <span class="invalid-feedback" role="alert"></span>
                            <strong> {{ $errors->first('name') }}</strong>
                        @endif
                    </div>


                <div class="form-group row">
                    {{ Form::label('email', 'Mail', ['class' => 'col-4 text-md-right']) }}
                        {{ Form::text('email',null , ['class' => "form-control col-8" .  ($errors->has('email') ? 'is-invalid' : '')], 'required') }}
                        @if($errors->has('email'))
                            <span class="invalid-feedback" role="alert"></span>
                            <strong> {{ $errors->first('email') }}</strong>
                        @endif
                </div>

                <div class="form-group row">
                    {{ Form::label('password', 'Password') }}
                    {{ Form::text('password', null, ['class' => 'form-control ' . ( $errors->has('password') ? 'is-invalid' : '' )]) }}
                    @if($errors->has('password'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('password') }}</strong>
                    @endif
                </div>

                <div class="form-group row">
                    {{ Form::label('password_confirmation', 'Password Confirm') }}
                    {{ Form::text('password_confirmation', null, ['class' => 'form-control ' . ( $errors->has('password_confirmation') ? 'is-invalid' : '' )]) }}
                    @if($errors->has('password_confirmation'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('password_confirmation') }}</strong>
                    @endif
                </div>

                <div class="form-group row">
                    {{ Form::label('role', 'Role', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::select('role', $roles, ['class' => "form-control col-8" .  ($errors->has('role') ? 'is-invalid' : ''), 'required']) }}
                    @if($errors->has('role'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('role') }}</strong>
                    @endif
                </div>

                <div class="form-group row">
                    {{ Form::label('subdomain', 'Domain', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::select('subdomain', $subdomains, ['class' => "form-control col-8" .  ($errors->has('subdomain') ? 'is-invalid' : ''), 'required']) }}
                    @if($errors->has('subdomain'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('subdomain') }}</strong>
                    @endif
                </div>

                <div class="form-group mt-3 ">
                        {{ Form::submit('Create moderator', ['class' => 'btn btn-primary']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
