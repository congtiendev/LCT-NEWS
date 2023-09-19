<?php

namespace App\Http\Controllers\Admin;

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


class PostController extends Controller
{
    protected $post;
    public function __construct()
    {
        $this->post = new Post();
    }
    public function index()
    {
        $title = "Danh sách bài viết";
        $posts = Post::join('users', 'posts.author_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'posts.id as post_id', 'posts.created_at as post_date', 'users.fullname as author_name', 'categories.name as category_name', 'categories.slug as category_slug')
            ->orderBy('posts.created_at', 'desc')
            ->get();
        return view('admin.post.index', compact('title', 'posts'));
    }

    public function createPost(PostRequest $request)
    {
        $title = "Tạo bài viết";
        $categories = Categories::all();
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
                return redirect()->route('admin.post.create');
            } else {
                Session::flash('error', 'Thêm bài viết thất bại');
                return redirect()->route('admin.post.create');
            }
        }
        return view('admin.post.create', compact('title', 'categories'));
    }

    public function detailPost($slug)
    {
        $post = Post::where('slug', $slug)->join('users', 'posts.author_id', '=', 'users.id')->select('posts.*', 'posts.id as post_id', 'posts.created_at as post_create_date', 'posts.updated_at as post_update_date')->first();
        if ($post) {
            $title = $post->title;
            return view('admin.post.detail', compact('title', 'post'));
        }
    }
    public function updatePost(PostRequest $request, $id)
    {
        $title = "Chỉnh sửa bài viết";
        if ($id) {
            $post = Post::find($id);
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
                        return redirect()->route('admin.post.update', ['id' => $id])->with('success', 'Cập nhật bài viết thành công');
                    } else {
                        return redirect()->route('admin.post.update', ['id' => $id])->with('error', 'Cập nhật bài viết thất bại');
                    }
                }
                return view('admin.post.update', compact('title', 'post', 'categories'));
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

    //Duyệt bài viết
    public function acceptPost(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $updated = Post::where('id', $id)->update(['status' => 1]);
            if ($updated) {
                return response()->json(['message' => 'Duyệt bài viết thành công'], 200);
            } else {
                return response()->json(['message' => 'Duyệt bài viết thất bại'], 500);
            }
        }
    }

    //Hủy duyệt bài viết
    public function rejectPost(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $updated = Post::where('id', $id)->update(['status' => 2]);
            if ($updated) {
                return response()->json(['message' => 'Hủy duyệt bài viết thành công'], 200);
            } else {
                return response()->json(['message' => 'Hủy duyệt bài viết thất bại'], 500);
            }
        }
    }
}
