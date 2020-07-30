<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Subscription;
use App\Models\Category;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $data['categories']   = Category::with('posts')->latest()->paginate(4);
        $data['posts']        = Post::with('categories')->latest()->approved()->published()->get();
        $data['recentPosts']  = $data['posts']->take(6);
        $data['mostReadPost'] = Post::with('categories')->approved()->published()->orderBy('view_count', 'desc')->paginate(4);
        $data['tags']         = Tag::latest()->get();
        return view('frontend.home')->with($data);
    }

    public function subscribe(Request $request)
    {
        $request->validate([
                               'email' => ['bail', 'required', 'string', 'email', 'unique:subscribers,email'],
                           ]);

        $subscribe        = new Subscriber();
        $subscribe->email = $request->email;
        $subscribe->save();

        $posts = Post::latest()->take(4)->get();
        if ($posts->count() > 0) {
            Mail::to($request->email)->send(new Subscription($posts));
        }

        return back()->with('toast_success', 'Subsciption successful');
    }
}
