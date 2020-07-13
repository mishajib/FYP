<?php

namespace App\Http\Controllers\User;

use App\Models\Tag;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:access tag')->only(['index', 'show']);
        $this->middleware('permission:create tag')->only(['create', 'store']);
        $this->middleware('permission:edit tag')->only(['edit', 'update']);
        $this->middleware('permission:delete tag')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tags = Tag::all();
        return view('backend.user.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view("backend.user.tag.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TagRequest $request)
    {
        $request->validated();
        try {
            $tag = new Tag();
            $tag->name = Str::lower($request->name);
            $tag->slug = Str::slug($request->name);
            $tag->save();
            notify()->success('Tag successfully added');
            return redirect(route('user.tags.index'));
        } catch (Exception $e) {
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
        try {
            $tag = Tag::where('slug', $id)->first();
            return view('backend.user.tag.show', compact('tag'));
        } catch (ModelNotFoundException $e) {
            notify()->error('Tag not found by ID ' . $id);
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        try {
            $tag = Tag::where('slug', $id)->first();
            return view('backend.user.tag.edit', compact('tag'));
        } catch (ModelNotFoundException $e) {
            notify()->error('Tag not found by ID ' . $id);
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(TagRequest $request, $id)
    {
        $request->validated();
        try {
            $tag = Tag::findOrFail($id);
            $tag->name = Str::lower($request->name);
            $tag->slug = Str::slug($request->name);
            $tag->save();
            notify()->success('Tag successfully updated');
            return redirect(route('user.tags.index'));
        } catch (Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $tag = Tag::findOrFail($id);
            $tag->delete();
            notify()->success('Tag successfully deleted');
            return back();
        } catch (Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }

    }
}
