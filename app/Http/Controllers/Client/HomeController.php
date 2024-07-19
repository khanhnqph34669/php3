<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public $trendingPost;
    public function __construct()
    {
        $this->index();
    }
    public function index()
    {
        $firstPost = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name as category_name')
            ->inRandomOrder()
            ->first();
        $firstPost->thumbnail = $firstPost->thumbnail === null
            ? "https://dibo.vn/wp-content/uploads/2020/12/news.jpg"
            : $firstPost->thumbnail;

        $threePostSecond = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name as category_name')
            ->where('posts.id', '!=', $firstPost->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        foreach ($threePostSecond as $threePost) {
            if ($threePost->thumbnail === null) {
                $threePost->thumbnail = "https://dibo.vn/wp-content/uploads/2020/12/news.jpg";
            }
        }

        $fivePostRight = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name as category_name')
            ->where('posts.id', '!=', $firstPost->id)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        foreach ($fivePostRight as $fivePost) {
            if ($fivePost->thumbnail === null) {
                $fivePost->thumbnail = "https://dibo.vn/wp-content/uploads/2020/12/news.jpg";
            }
        }

        $trendingPost = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.title', 'posts.slug', 'categories.name as category_name')
            ->where('views', '>',700)
            ->where('posts.created_at', '>=', now()->subDays(7))
            ->inRandomOrder()
            ->limit(3)
            ->get();
        return view("Client.index", compact('firstPost', 'threePostSecond', 'fivePostRight', 'trendingPost'));
    }

    public function category()
    {
        $category = DB::table('categories')->get();
        
        return view("Client.category", compact("category"));
    }

    public function about()
    {
        return view("Client.about");
    }

    public function detailPost($slug)
    {
        $post = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name as category_name')
            ->where('posts.slug', $slug)
            ->first();
            $trendingPost = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.title', 'posts.slug', 'categories.name as category_name')
            ->where('views', '>',700)
            ->where('posts.created_at', '>=', now()->subDays(7))
            ->inRandomOrder()
            ->limit(3)
            ->get();
        return view("Client.detailPost", compact("post","trendingPost"));
    }

    public function search(Request $request){
        $query = $request->input('query');
        $resultPost = DB::table('posts')
        ->where('title', 'like', "%$query%")
        ->orWhere('content', 'like', "%$query%")
        ->paginate(10);

        $relsultCategory = DB::table("categories")
        ->where('name', 'like', "%$query%")
        ->paginate(10);
        return view("Client.searchResults", compact("query","resultPost","relsultCategory"));
    }
}
