<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::with('posts')->latest()->paginate(4);
        $data['posts'] = Post::with('categories')->latest()->approved()->published()->get();
        $data['recentPosts'] = $data['posts']->take(6);
        $data['mostReadPost'] = Post::with('categories')->approved()->published()->orderBy('view_count', 'desc')->paginate(4);
        $data['tags'] = Tag::latest()->get();
        return view('frontend.home')->with($data);
    }
}
