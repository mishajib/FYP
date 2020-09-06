<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:access post')->only(['index', 'show']);
        $this->middleware('permission:create post')->only(['create', 'store']);
        $this->middleware('permission:edit post')->only(['edit', 'update']);
        $this->middleware('permission:delete post')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('backend.user.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['tags'] = Tag::all();
        return view('backend.user.post.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PostRequest $request)
    {
        $request->validated();
        try {
            $image = $request->file('image');
            $slug = Str::slug($request->title);

            if (isset($image)) {
                //make unique image
                $currentDate = Carbon::now()->toDateString();
                $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                //make directory if not exists
                if (!Storage::disk('public')->exists('post')) {
                    Storage::disk('public')->makeDirectory('post');
                }

                $postImage = Image::make($image)->resize(1600, 1066)->save();

                Storage::disk('public')->put('post/' . $imagename, $postImage);

            } else {
                $imagename = 'post.png';
            }

            $post = new Post();
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->slug = $slug;
            $post->image = $imagename;
            $post->body = $request->body;

            if (isset($request->status)) {
                $post->status = true;
            } else {
                $post->status = false;

            }

            if (Auth::user()->hasRole(['super', 'admin'])) {
                $post->is_approved = true;
            } else {
                $post->is_approved = false;
            }

            $post->save();

            $post->categories()->attach($request->categories);
            $post->tags()->attach($request->tags);
            notify()->success('Post successfully added');
            return redirect(route('user.post.index'));
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::where('slug', $id)->first();
        return view('backend.user.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::where('slug', $id)->first();
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.user.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PostRequest $request, Post $post)
    {
        $request->validated();
        try {
            $image = $request->file('image');
            $slug = Str::slug($request->title);

            if (isset($image)) {
                //make unique image
                $currentDate = Carbon::now()->toDateString();
                $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                //make directory if not exists
                if (!Storage::disk('public')->exists('post')) {
                    Storage::disk('public')->makeDirectory('post');
                }

                //delete old post image
                if (Storage::disk('public')->exists('post/' . $post->image)) {
                    Storage::disk('public')->delete('post/' . $post->image);
                }

                $postImage = Image::make($image)->resize(1600, 1066)->save();

                Storage::disk('public')->put('post/' . $imagename, $postImage);

            } else {
                $imagename = $post->image;
            }

            if (Auth::id() != $post->user_id) {
                $post->user_id = $post->user_id;
            } else {
                $post->user_id = Auth::id();
            }
            $post->title = $request->title;
            $post->slug = $slug;
            $post->image = $imagename;
            $post->body = $request->body;

            if (isset($request->status)) {
                $post->status = true;
            } else {
                $post->status = false;

            }

            if (Auth::user()->hasRole(['super', 'admin'])) {
                $post->is_approved = true;
            } else {
                $post->is_approved = false;
            }

            $post->save();

            $post->categories()->sync($request->categories);
            $post->tags()->sync($request->tags);

            notify()->success('Post Successfully Updated');
            return redirect(route('user.post.index'));
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            //check category image exists or not
            if (Storage::disk('public')->exists('post/' . $post->image)) {
                Storage::disk('public')->delete('post/' . $post->image);
            }

            $post->categories()->detach();
            $post->tags()->detach();

            $post->delete();
            notify()->success('Post Successfully Deleted');
            return back();
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }
    }

}
