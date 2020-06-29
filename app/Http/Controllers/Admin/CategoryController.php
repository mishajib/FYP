<?php

namespace App\Http\Controllers\Admin;

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
            'role:super|admin',
        ]);
        $this->middleware('permission:access category')->only(['index', 'show']);
        $this->middleware('permission:create category')->only(['create', 'store']);
        $this->middleware('permission:edit category')->only(['edit', 'update']);
        $this->middleware('permission:delete category   ')->only('destroy');
        $this->middleware('permission:active category   ')->only('active');
        $this->middleware('permission:access active category   ')->only('activePage');
        $this->middleware('permission:deactive category   ')->only('deactive');
        $this->middleware('permission:approved category   ')->only('approved');
        $this->middleware('permission:pending category   ')->only('pending');
        $this->middleware('permission:access pending category   ')->only('pendingPage');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::with('parent')->get();
        return view('backend.admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.admin.category.create', compact('categories'));
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
            $category->name = Str::ucfirst($request->name);
            $category->slug = Str::slug($request->name);
            $category->parent_id = $request->category;
            if (Auth::user()->hasRole('super')) {
                $category->is_approved = true;
            } else {
                $category->is_approved = false;
            }
            $category->save();
            notify()->success("Category successfully added", "success");
            return redirect(route('admin.categories.index'));
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
            return view('backend.admin.category.show', compact('category'));
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
            return view('backend.admin.category.edit', compact('category', 'categories'));
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
        try {
            $category = Category::findOrFail($id);
            $category->name = Str::ucfirst($request->name);
            $category->slug = Str::slug($request->name);
            $category->parent_id = $request->category;
            if (Auth::user()->hasRole('super')) {
                $category->is_approved = true;
            } else {
                $category->is_approved = false;
            }
            notify()->success("Category successfully updated");
            return redirect(route('admin.categories.index'));
        } catch (\Exception $e) {
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
            $category = Category::findOrFail($id);
            if (!empty($category->parent)) {
                notify()->error("Can't delete parent category before delete the child category");
            }
            $category->delete();
            notify()->success('Category successfully deleted...');
        } catch (\Exception $e) {
            notify()->error('Category not found by ID ' . $id);
        }

        return back();
    }


    //Pending Category Function
    public function pendingPage()
    {
        $categories = Category::pending()->latest()->get();
        return view('backend.admin.category.pending', compact('categories'));

    }

    //Category Approved Function
    public function approved($id)
    {
        $category = Category::find($id);
        if ($category->is_approved == false) {
            $category->is_approved = true;
            $category->save();
            notify()->success('The category has been approved...');
        } else {
            notify()->info('This category is already approved.');
        }

        return back();
    }

    //reverse the approval function
    public function pending($id)
    {
        $category = Category::findOrFail($id);
        if ($category->is_approved == true) {
            $category->is_approved = false;
            $category->save();
            notify()->success('The category remain pending...');
        } else {
            notify()->info('This category is already added for approval.');
        }

        return back();
    }

    //Active Menu Function
    public function activePage()
    {
        $categories = Category::active()->latest()->get();
        return view('backend.admin.category.active', compact('categories'));

    }

    //Category Approved Function
    public function active($id)
    {
        $category = Category::findOrFail($id);
        if ($category->status == false) {
            $category->status = true;
            $category->save();
            notify()->success('The category has been active...');
        } else {
            notify()->info('This category is already active!!!');
        }

        return back();
    }

    //reverse the approval function
    public function deactive($id)
    {
        $category = Category::findOrFail($id);
        if ($category->status == true) {
            $category->status = false;
            $category->save();
            notify()->success('The category has been deactivate...');
        } else {
            notify()->info('This category is already deactivate!!!');
        }

        return back();
    }
}
