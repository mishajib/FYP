<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        $data['posts'] = Post::with('categories')->with('tags')->latest()->paginate(4);
        return view('frontend.posts')->with($data);
    }

    public function details($slug)
    {
        $data['post'] = Post::with('categories')->with('tags')->where('slug', $slug)->approved()->published()->first();
        $blogKey = 'blog_' . $data['post']->id;

        if (!Session::has($blogKey)) {
            $data['post']->increment('view_count');
            Session::put($blogKey, 1);
        }
        $data['mostReadPost'] = Post::approved()->published()->orderBy('view_count', 'desc')->get();
        $data['posts'] = Post::approved()->published()->latest()->get();
        return view('frontend.single-post')->with($data);
    }

    public function postByCategory($slug)
    {
        $data['category'] = Category::where('slug', $slug)->first();
        $data['posts'] = $data['category']->posts()->approved()->published()->latest()->paginate(4);
        $data['mostReadPost'] = Post::with('categories')->with('tags')->approved()->published()->orderBy('view_count', 'desc')->get();
        $data['categories'] = Category::latest()->paginate(4);
        $data['tags'] = Tag::latest()->get();
        return view('frontend.category')->with($data);
    }

    public function postByTag($slug)
    {
        $data['tag'] = Tag::where('slug', $slug)->first();
        $data['posts'] = $data['tag']->posts()->approved()->published()->get();
        return view('frontend.category')->with($data);
    }
}
