<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use notify;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware([
            'auth',
            'role:user',
        ]);
        $this->middleware('permission:access category')->only(['index', 'show']);
        $this->middleware('permission:create category')->only(['create', 'store']);
        $this->middleware('permission:edit category')->only(['edit', 'update']);
        $this->middleware('permission:delete category')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::with('parent')->get();
        return view('backend.user.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.user.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CategoryRequest $request)
    {
        $request->validated();
        try {
            $category = new Category();
            if (!empty($request->category)) {
                $category->parent_id = $request->category;
            } else {
                $category->parent_id = null;
            }
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            if (Auth::user()->hasRole('super')) {
                $category->is_approved = true;
            } else {
                $category->is_approved = false;
            }
            $category->save();
            notify()->success("Category successfully added");
            return redirect(route('user.categories.index'));
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        try {
            $category = Category::where('slug', $id)->first();
            return view('backend.user.category.show', compact('category'));
        } catch (ModelNotFoundException $e) {
            notify()->error('Category not found by ID ' . $id);
            return back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        try {
            $category = Category::where('slug', $id)->first();
            $categories = Category::all();
            return view('backend.user.category.edit', compact('category', 'categories'));
        } catch (\Exception $e) {
            notify()->error('Category not found by ID ' . $id);
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CategoryRequest $request, $id)
    {
        $request->validated();
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->parent_id = $request->category;
        $category->is_approved = false;
        notify()->success("Category successfully updated");
        return redirect(route('user.categories.index'));
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
            $category = Category::findOrFail($id);
            if (!empty($category->parent)) {
                notify()->error("Can't delete parent category before delete the child category");
            }
            $category->delete();
            notify()->success('Category successfully deleted');
        } catch (\Exception $e) {
            notify()->error('Category not found by ID ' . $id);
        }

        return back();
    }

}
