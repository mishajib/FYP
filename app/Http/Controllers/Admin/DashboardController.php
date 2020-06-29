<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
        $this->middleware(['role:super|admin']);
        $this->middleware('permission:access dashboard');
    }

    public function index()
    {
        $data['posts'] = Post::all()->count();
        $data['pending_posts'] = Post::where('is_approved', false)->count();
        $data['all_views'] = Post::sum('view_count');
        $data['popular_posts'] = Post::orderBy('view_count')->take(5)->get();
        $data['category_count'] = Category::all()->count();
        $data['tag_count'] = Tag::all()->count();
        $data['registered_users'] = User::role('user')->count();
        $data['active_users'] = User::role('user')->withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        return view('backend.admin.dashboard')->with($data);
    }
}
