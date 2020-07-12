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
        $data['categories'] = Category::with('children')->with('parent')->latest()->paginate(4);
        $data['posts'] = Post::with('categories')->with('tags')->latest()->approved()->published()->get();
        $data['recentPosts'] = Post::with('categories')->approved()->published()->latest()->take(6)->get();
        $data['mostReadPost'] = Post::with('categories')->with('tags')->approved()->published()->orderBy('view_count', 'desc')->paginate(4);
        $data['tags'] = Tag::latest()->get();
        return view('frontend.home')->with($data);
    }
}
