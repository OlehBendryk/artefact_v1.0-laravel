@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card mt-2">
            <div class="card-group">
                <div class="card">
                    <div class="card-header"> Edit post</div>
                    <div class="card-body">
                        {{ Form::open(['route' => ['post.update', $post], 'method' => 'PUT', 'files' => true]) }}

                            <div class="form-group mt-2 md-2">

                                <div class="col-3">
                                {{ Form::label('tag_id', 'Tag', ['class' => 'col-4 text-md-right']) }}
                                <div class="col-8 {{ $errors->has('tag_id') ? 'is-invalid' : '' }}">
                                    {{ Form::select('tag_id', $tag, $current_tag ) }}

                                    @if($errors->has('tag_id'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('tag_id') }}</strong>
                                    @endif
                                </div>
                            </div>

                                {{ Form::label('category_id', 'Category', ['class' => 'col-4 text-md-right']) }}
                                <div class="col-8 {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                    {{ Form::select('category_id', $category, $current_category ) }}

                                    @if($errors->has('category_id'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('category_id') }}</strong>
                                    @endif
                                </div>

                                {{ Form::label('moderator_id', 'Moderator', ['class' => 'col-4 text-md-right']) }}
                                <div class="col-8 {{ $errors->has('moderator_id') ? 'is-invalid' : '' }}">
                                    {{ Form::select('moderator_id', $moderator, $current_moderator ) }}

                                    @if($errors->has('moderator_id'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('moderator_id') }}</strong>
                                    @endif
                                </div>

                                {{ Form::label('title', 'Title', ['class' => 'col-4 text-md-right']) }}
                                <div class="col-8 {{ $errors->has('title') ? 'is-invalid' : '' }}">
                                    {{ Form::text('title', $post->title, ['class' => 'form-control']) }}

                                    @if($errors->has('title'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('title') }}</strong>
                                    @endif
                                </div>

                                {{ Form::label('post', 'Post', ['class' => 'col-4 text-md-right']) }}
                                <div class="col-8 {{ $errors->has('post') ? 'is-invalid' : '' }}">
    {{--                                {{ Form::textarea('post', $post->post_html, ["id" => "editor" ]) }}--}}

                                    <textarea name="post" rows="5" id="ckeditor">{{ $post->post_html }}</textarea>

                                    @if($errors->has('post'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('post') }}</strong>
                                    @endif
                                </div>

                                {{ Form::label('is_active', 'Active', ['class' => 'col-4 text-md-right']) }}
                                <div class="col-8 {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                                    {{ Form::hidden('is_active', 0 ) }}
                                    {{ Form::checkbox('is_active', 1, $post->is_active ?: 0 ) }}

                                    @if($errors->has('is_active'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('is_active') }}</strong>
                                    @endif
                                </div>

                                {{ Form::label('is_top', 'Top', ['class' => 'col-4 text-md-right']) }}
                                <div class="col-8 {{ $errors->has('is_top') ? 'is-invalid' : '' }}">
                                    {{ Form::hidden('is_top', 0 ) }}
                                    {{ Form::checkbox('is_top', 1, $post->is_top ?: 0) }}

                                    @if($errors->has('is_top'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('is_top') }}</strong>
                                    @endif
                                </div>

                                {{ Form::label('picture_url', 'Picture', ['class' => 'col-4 text-md-right']) }}
                                <div class="col-8 {{ $errors->has('picture_url') ? 'is-invalid' : '' }}">
                                    {{ Form::file('picture_url', $post->picture_url) }}

                                    @if($errors->has('picture_url'))
                                        <span class="invalid-feedback" role="alert"></span>
                                        <strong> {{ $errors->first('picture_url') }}</strong>
                                    @endif
                                </div>

                                    <div class="col-md-12 mt-2">
                                        {{ Form::submit('Edit post', ['class' => 'btn btn-primary']) }}
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
