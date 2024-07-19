<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index($slug = null)
    {
        $categories = DB::table('categories')->get();
        
        if ($slug) {
            $category = DB::table('categories')->where('slug', $slug)->first();
            
            if (!$category) {
                abort(404);
            }

            $posts = DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->where('posts.category_id', $category->id)
                ->select('posts.*', 'categories.name as category_name', 'users.name as author_name')
                ->paginate(4);
        } else {
            $posts = DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->select('posts.*', 'categories.name as category_name', 'users.name as author_name')
                ->paginate(4);
        }

        return view('Client.category', compact('categories', 'posts', 'slug'));
    }
}
