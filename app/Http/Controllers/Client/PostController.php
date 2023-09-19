<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Categories;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class PostController extends Controller
{
    protected $post;
    public function __construct()
    {
        $this->post = new Post();
    }

    public function index()
    {
        $title = "Tin tức";
        $posts = Post::join('users', 'posts.author_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'posts.id as post_id', 'posts.created_at as post_date', 'users.fullname as author_name', 'categories.name as category_name', 'categories.slug as category_slug')
            ->orderBy('posts.created_at', 'desc')
            ->get();
        return view('client.post.index', compact('title', 'posts'));
    }

    public function detailPost($slug)
    {
        //Join 3 bảng posts, users, categories, đổi tên nếu trùng tên cột
        $post = Post::where('posts.slug', $slug)
            ->join('users', 'posts.author_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'posts.id as post_id', 'posts.created_at as post_created_date', 'posts.updated_at as post_updated_date', 'users.fullname as author_name', 'categories.name as category_name', 'categories.slug as category_slug')
            ->first();

        if ($post) {
            $title = $post->title;
            $categories = Categories::all();
            $comments = DB::table('comments')
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->select('comments.*', 'comments.created_at as comment_created_date', 'comments.id as comment_id', 'users.fullname', 'users.avatar', 'users.id as user_id', 'users.created_at as user_created_date')
                ->where('comments.post_id', $post->post_id)
                ->orderBy('comments.created_at', 'desc')
                ->get();

            $posts_category = Post::where('category_id', $post->category_id)->where('id', '!=', $post->post_id)->orderBy('created_at', 'desc')->limit(3)->get();
            $posts_recent = Post::orderBy('created_at', 'desc')->limit(3)->get();
            return view('client.post.detail', compact('title', 'post', 'categories', 'posts_category', 'posts_recent', 'comments'));
        } else {
            abort(404);
        }
    }
    public function createPost(PostRequest $request)
    {
        $title = "Đăng tin tức";
        if ($request->isMethod('post')) {
            $data = $request->all();
            $data = $request->except('_token');
            $data['slug'] = Str::slug($data['title']) . '-' . time();
            $data['author_id'] = Auth::user()->id;
            if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                $data['thumbnail'] = uploadFile('uploads/post/thumbnail', $request->file('thumbnail'));
            }
            $this->post->fill($data);
            $post = $this->post->save();
            if ($post) {
                Session::flash('success', 'Thêm bài viết thành công');
                return redirect()->route('post.create');
            } else {
                Session::flash('error', 'Thêm bài viết thất bại');
                return redirect()->route('post.create');
            }
        }
        $categories = Categories::all();
        return view('client.post.create', compact('title', 'categories'));
    }

    public function updatePost(PostRequest $request, $id)
    {
        $title = "Chỉnh sửa bài viết";
        if ($id) {
            $post = Post::FindOrFail($id);
            $categories = Categories::all();
            if ($post) {
                if ($request->isMethod('post')) {
                    $data = $request->all();
                    $data = $request->except('_token');
                    $data['slug'] = Str::slug($data['title']) . '-' . time();
                    $data['author_id'] = Auth::user()->id;
                    if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                        $data['thumbnail'] = uploadFile('uploads/post/thumbnail', $request->file('thumbnail'));
                    } else {
                        $data['thumbnail'] = $post->thumbnail;
                    }
                    $update = Post::where('id', $id)->update($data);
                    if ($update) {
                        return redirect()->route('post.update', ['id' => $id])->with('success', 'Cập nhật bài viết thành công');
                    } else {
                        return redirect()->route('post.update', ['id' => $id])->with('error', 'Cập nhật bài viết thất bại');
                    }
                }
                return view('client.post.update', compact('title', 'post', 'categories'));
            }
        }
    }

    public function deletePost($id)
    {
        if ($id) {
            $deleted = Post::where('id', $id)->delete();
            if ($deleted) {
                return response()->json(['message' => 'Xóa thành công'], 200);
            } else {
                return response()->json(['message' => 'Xóa thất bại'], 500);
            }
        }
    }
}
