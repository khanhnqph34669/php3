<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Post\StoreRequest as PostStoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('categories', 'categories.id', '=', 'category_id')
            ->select('posts.*', 'users.name as author', 'categories.name as category')
            ->paginate(10);
        return view("Admin.Post.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view("Admin.Post.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        // Kiểm tra xem có file không và lưu trữ ảnh
        $thumbnailPath = $request->hasFile('thumbnail')
            ? $request->file('thumbnail')->store('posts', 'public')
            : null;

        $data = [
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'thumbnail' => $thumbnailPath, // Lưu đường dẫn ảnh
            'created_at' => now(),
            'updated_at' => now(),
            'views' => 0,
            'hagtag' => $request->hagtag,
        ];

        DB::table('posts')->insert($data);

        return redirect()->route('admin.dashboard.posts.index')->with('success', 'Thêm bài viết thành công');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*', 'users.name as author', 'categories.id as category')
            ->where('posts.id', $id)
            ->first();

        $categories = DB::table('categories')->get();
        return view('Admin.Post.edit', compact('post', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $post = DB::table('posts')->where('id', $id)->first();
            if (!$post) {
                return redirect()->route('admin.dashboard.posts.index')->with('error', 'Bài viết không tồn tại');
            }
            $thumbnailPath = $request->hasFile('thumbnail')
                ? $request->file('thumbnail')->store('posts', 'public')
                : $post->thumbnail;

            $data = [
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->content,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'thumbnail' => $thumbnailPath,
                'updated_at' => now(),
                'hagtag' => $request->hagtag,
            ];

            DB::table('posts')->where('id', $id)->update($data);

            return redirect()->route('admin.dashboard.posts.index')->with('success', 'Cập nhật bài viết thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('admin.dashboard.posts.index')->with('error', 'Cập nhật bài viết thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $post = DB::table('posts')->where('id', $id)->first();
            if (!$post) {
                return redirect()->route('admin.dashboard.posts.index')->with('error', 'Bài viết không tồn tại');
            }
            DB::table('posts')->where('id', $id)->delete();
            return redirect()->route('admin.dashboard.posts.index')->with('success', 'Xóa bài viết thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('admin.dashboard.posts.index')->with('error', 'Xóa bài viết thất bại');
        }
    }
}
