<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Spatie\Sluggable\SlugOptions;


class PostController extends Controller
{
    protected $post;
    public function __construct()
    {
        $this->post = new Post();
    }
    public function index()
    {
        return view('admin.post.index');
    }

    public function createPost(PostRequest $request)
    {
        $title = "Tạo bài viết";
        if ($request->isMethod('post')) {
            $data = $request->all();
            $data = $request->except('_token');
            $data['slug'] = Str::slug($data['title'], '-' . time());
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
        return view('admin.post.create', compact('title'));
    }

    public function detailPost($slug)
    {
        $title = "Chi tiết bài viết";
        return view('admin.post.detail', compact('title'));
    }
}
