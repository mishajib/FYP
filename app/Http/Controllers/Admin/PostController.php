<?php

namespace App\Http\Controllers\Admin;

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
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
        $this->middleware(['role:super|admin']);
        $this->middleware('permission:access post')->only(['index', 'show']);
        $this->middleware('permission:create post')->only(['create', 'store']);
        $this->middleware('permission:edit post')->only(['edit', 'update']);
        $this->middleware('permission:delete post')->only('destroy');
        $this->middleware('permission:publish post')->only('approved');
        $this->middleware('permission:unpublish post')->only(['pendingPage', 'pending']);
        $this->middleware('permission:active post');
        $this->middleware('permission:pending post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('backend.admin.post.index', compact('posts'));
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
        return view('backend.admin.post.create')->with($data);
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

            $post->is_approved = true;
            $post->save();

            $post->categories()->attach($request->categories);
            $post->tags()->attach($request->tags);
            notify()->success('Post successfully added');
            return redirect(route('admin.post.index'));
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
        return view('backend.admin.post.show', compact('post'));
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
        return view('backend.admin.post.edit', compact('post', 'categories', 'tags'));
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

            $post->is_approved = true;
            $post->save();

            $post->categories()->sync($request->categories);
            $post->tags()->sync($request->tags);

            notify()->success('Post Successfully Updated');
            return redirect(route('admin.post.index'));
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

    //Pending Post Function
    public function pendingPage()
    {
        $posts = Post::where('is_approved', false)->get();
        return view('backend.admin.post.pending', compact('posts'));

    }

    //Post Approved Function
    public function approved($id)
    {
        $post = Post::findOrFail($id);
        if ($post->is_approved == false) {
            $post->is_approved = true;
            $post->save();
            notify()->success('The post has been approved');
        } else {
            notify()->info('This post is already approved');
        }

        return back();
    }

    //reverse the approval function
    public function pending($id)
    {
        $post = Post::findOrFail($id);
        if ($post->is_approved == true) {
            $post->is_approved = false;
            $post->save();
            notify()->success('The post remain pending');
        } else {
            notify()->info('This post is already added for approval');
        }

        return back();
    }
}
