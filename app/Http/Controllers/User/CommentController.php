<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:access comment');
    }

    public function index()
    {
        $comments = Comment::latest()->get();
        return view('backend.user.comment', compact('comments'));
    }
}
