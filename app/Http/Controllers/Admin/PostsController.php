<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Moderator;
use App\Models\Post;
use App\Models\Subdomain;
use App\Models\Tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.moderation.posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $subdomain = Subdomain::all()->pluck('name', 'id');
        $tag = Tag::all()->pluck('name', 'id');
        $category = Category::all()->pluck('name', 'id');
        $moderator = Moderator::all()->pluck('name', 'id');

        return view('admin.moderation.posts.create')
            ->with('subdomain', $subdomain)
            ->with('tag', $tag)
            ->with('moderator', $moderator)
            ->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostCreateRequest $request, Post $post)
    {
        $post->subdomain_id = $request->get('subdomain_id');
        $post->tag_id = $request->get('tag_id');
        $post->category_id = $request->get('category_id');
        $post->moderator_id = $request->get('moderator_id');
        $post->title = $request->get('title');
        $post->post_raw = strip_tags($request->get('post'));
        $post->post_html = $request->get('post');
        $post->is_active = $request->get('is_active');
        $post->is_top = $request->get('is_top');

        $post->save();

        return redirect()->route('post.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.moderation.posts.show')
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
//        dd($post);
        $tag = Tag::all()->pluck('name', 'id');
        $category = Category::all()->pluck('name', 'id');
        $moderator = Moderator::all()->pluck('name', 'id');

        $current_tag = $post->tag->id;
        $current_category = $post->category->id;
        $current_moderator = $post->moderator->id;

        return view('admin.moderation.posts.edit')
            ->with('post', $post)
            ->with('tag', $tag)
            ->with('category', $category)
            ->with('moderator', $moderator)
            ->with('current_tag', $current_tag)
            ->with('current_category', $current_category)
            ->with('current_moderator', $current_moderator);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->update([
            'tag_id' => $request->get('tag_id'),
            'category_id' => $request->get('category_id'),
            'moderator_id' => $request->get('moderator_id'),
            'title' => $request->get('title'),
            'post_raw' => strip_tags($request->get('post')),
            'post_html' => $request->get('post'),
            'is_active' => $request->get('is_active'),
            'is_top' => $request->get('is_top')
        ]);

        return redirect()->route('post.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        if(!$post->id){
            return redirect()->route('post.index')
                ->with('error', "There is no such post");
        }
        $post->delete();

        return redirect()->route('post.index')
            ->with('success', "Post {$post->name} has been deleted");
    }
}

