@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"> Create permission</div>
            <div class="card-body">
                <form method="post" action="{{ route('permission.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mt-2 md-2">

                        <label for="name" class="col-4 text-md-right">Name</label>
                        <div class="col-8">
                            <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required>
                            @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert"></span>
                                <strong> {{ $errors->first('name') }}</strong>
                            @endif
                        </div>

                    <div class="form-group ">
                        <div class="col-md-12 mt-2">
                            <button type="submit" class="btn btn-primary">Create permission</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
