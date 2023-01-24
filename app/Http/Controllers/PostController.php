<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;
use App\Services\Post\Service;

class PostController extends BaseController
{
    /**
     * @throws BindingResolutionException
     */
    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request): \Illuminate\Http\RedirectResponse
    {

        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->service->update($post, $data);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
