<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('Admin.Categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $category = Category::create($request->all());
        return redirect()->route('admin.dashboard.categories.index')->with('success', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('Admin.Categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($request->all());
            return redirect()->route('admin.dashboard.categories.index')->with('success', 'Cập nhật danh mục thành công');
        } catch (Exception $e) {
            return redirect()->route('admin.dashboard.categories.edit', $id)->with('error', 'Cập nhật danh mục thất bại + ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $post = DB::table('posts')->where('category_id', $id)->get();
            if (count($post) > 0) {
                return redirect()->route('admin.dashboard.categories.index')->with('error', 'Danh mục này đang chứa bài viết');
            } else {
                DB::table('categories')->where('id', $id)->delete();
                return redirect()->route('admin.dashboard.categories.index')->with('success', 'Xóa danh mục thành công');
            }
        } catch (Exception $e) {
            return redirect()->route('admin.dashboard.categories.index')->with('error', 'Xóa danh mục thất bại + ' . $e->getMessage());
        }   
    }
}
