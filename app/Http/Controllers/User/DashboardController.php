<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:access dashboard');
    }

    public function index()
    {
        $data['posts']            = Post::all()->count();
        $data['all_views']        = Post::sum('view_count');
        $data['popular_posts']    = Post::approved()->published()->orderBy('view_count')->take(5)->get();
        $data['recentPosts']      = Post::approved()->published()->latest()->take(10)->get();
        $data['category_count']   = Category::all()->count();
        $data['tag_count']        = Tag::all()->count();
        $data['registered_users'] = User::role('user')->count();
        return view('backend.user.dashboard')->with($data);
    }
}
