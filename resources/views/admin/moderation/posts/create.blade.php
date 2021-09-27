@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-2">
            <div class="card-group">
                <div class="card">
                    <div class="card-header"> Create post</div>
                    <div class="card-body">
                        {{ Form::open(['route' => 'post.store', 'files' => true]) }}

                            <div class="form-group mt-2 md-2">

                                {{ Form::label('subdomain_id', 'Domain') }}
                                <div class="col-8 {{ $errors->has('subdomain_id') ? 'is-invalid' : '' }}">
                                    {{ Form::select('subdomain_id', $subdomain ) }}

                                    @if($errors->has('subdomain_id'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('subdomain_id') }}</strong>
                                    @endif
                                </div>

                                {{ Form::label('tag_id', 'Tag') }}
                                <div class="col-8 {{ $errors->has('tag_id') ? 'is-invalid' : '' }}">
                                    {{ Form::select('tag_id', $tag ) }}

                                    @if($errors->has('tag_id'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('tag_id') }}</strong>
                                    @endif
                                </div>

                                {{ Form::label('category_id', 'Category') }}
                                <div class="col-8 {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                    {{ Form::select('category_id', $category ) }}

                                    @if($errors->has('category_id'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('category_id') }}</strong>
                                    @endif
                                </div>

                                {{ Form::label('moderator_id', 'Moderator') }}
                                <div class="col-8 {{ $errors->has('moderator_id') ? 'is-invalid' : '' }}">
                                    {{ Form::select('moderator_id', $moderator ) }}

                                    @if($errors->has('moderator_id'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('moderator_id') }}</strong>
                                    @endif
                                </div>

                                {{ Form::label('title', 'Title') }}
                                <div class="col-8 {{ $errors->has('title') ? 'is-invalid' : '' }}">
                                    {{ Form::text('title', null, ['class' => 'form-control']) }}

                                    @if($errors->has('title'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('title') }}</strong>
                                    @endif
                                </div>

                                {{ Form::label('post', 'Post', ['class' => 'col-4 text-md-right']) }}
                                <div class="col-8 {{ $errors->has('post') ? 'is-invalid' : '' }}">
                                    <textarea name="post" id="ckeditor"></textarea>

                                    @if($errors->has('post'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('post') }}</strong>
                                    @endif
                                </div>

                                {{ Form::label('is_active', 'Active')}}
                                <div class="col-8 {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                                    {{ Form::hidden('is_active', 0) }}
                                    {{ Form::checkbox('is_active', 1 ) }}

                                    @if($errors->has('is_active'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('is_active') }}</strong>
                                    @endif
                                </div>

                                {{ Form::label('is_top', 'Top') }}
                                <div class="col-8 {{ $errors->has('is_top') ? 'is-invalid' : '' }}">
                                    {{ Form::hidden('is_top', 0) }}
                                    {{ Form::checkbox('is_top', 1) }}

                                    @if($errors->has('is_top'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('is_top') }}</strong>
                                    @endif
                                </div>

                                {{ Form::label('picture_url', 'Picture') }}
                                <div class="col-8 {{ $errors->has('picture_url') ? 'is-invalid' : '' }}">
                                    {{ Form::file('picture_url', null) }}

                                    @if($errors->has('picture_url'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('picture_url') }}</strong>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 mt-2">
                                        {{ Form::submit('Create post', ['class' => 'btn btn-primary']) }}
                                    </div>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.moderation.posts.ckeditor')
@endsection
