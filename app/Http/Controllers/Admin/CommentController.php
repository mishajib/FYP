<?php

namespace App\Http\Controllers\Admin;

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
        return view('backend.admin.comment', compact('comments'));
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        notify()->success('Comment successfully deleted');
        return back();
    }
}
