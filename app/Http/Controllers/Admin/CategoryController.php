<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Sluggable\SlugOptions;

class CategoryController extends Controller
{
    protected $categories;
    protected $posts;
    public function __construct()
    {
        $this->categories = new Categories();
        $this->posts = new Post();
    }
    public function index()
    {
        $title = "Danh sách danh mục";
        $categories = Categories::orderBy('created_at', 'desc')->get();
        //Dựa vào category_id lấy ra số lượng bài viết của từng danh mục
        $categories->map(function ($category) {
            $category->total_post = Post::where('category_id', $category->id)->count();
            return $category;
        });

        return view('admin.category.index', compact('title', 'categories'));
    }

    public function createCategory(CategoryRequest $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $data = $request->except('_token');
            $data['slug'] = Str::slug($data['name']);
            $this->categories->fill($data);
            $create = $this->categories->save();
            if ($create) {
                return redirect()->route('admin.category.create')->with('success', 'Tạo danh mục thành công');
            } else {
                return redirect()->route('admin.category.create')->with('error', 'Tạo danh mục thất bại');
            }
        }
        $title = "Tạo danh mục";
        return view('admin.category.create', compact('title'));
    }

    public function updateCategory(CategoryRequest $request, $id)
    {
        $category = Categories::find($id);
        if ($request->isMethod('post')) {
            $data = $request->all();
            $data = $request->except('_token');
            $data['slug'] = Str::slug($data['name']);
            $category->fill($data);
            $update = $category->save();
            if ($update) {
                return redirect()->route('admin.category.update', ['id' => $id])->with('success', 'Cập nhật danh mục thành công');
            } else {
                return redirect()->route('admin.category.update', ['id' => $id])->with('error', 'Cập nhật danh mục thất bại');
            }
        }
        $title = "Cập nhật danh mục";
        return view('admin.category.update', compact('title', 'category'));
    }

    public function deleteCategory($id)
    {
        $category = Categories::find($id);
        if ($category) {
            $category->delete();
            return redirect()->route('admin.category.index')->with('success', 'Xóa danh mục thành công');
        }
        return redirect()->route('admin.category.index')->with('error', 'Xóa danh mục thất bại');
    }
}
