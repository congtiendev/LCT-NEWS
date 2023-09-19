<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Banner;
use App\Models\Comment;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Trang chủ";
        $banners = Banner::where('status', 1)->get();
        $posts = Post::join('users', 'posts.author_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'posts.id as post_id', 'posts.created_at as post_date', 'users.fullname as author_name', 'categories.name as category_name', 'categories.slug as category_slug')
            ->orderBy('posts.created_at', 'desc')
            ->where('posts.status', 1)->get();
        // $comments = Comment::all();
        $comments = Comment::join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.fullname as user_name', 'users.avatar as user_avatar')
            ->orderBy('comments.created_at', 'desc')
            ->get();
        return view('client.index', compact('title', 'posts', 'banners', 'comments'));
    }
}
