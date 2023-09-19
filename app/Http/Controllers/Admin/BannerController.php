<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $title = "Quản lý banner";
        $banners = Banner::all();
        return view('admin.banner.index', compact('title', 'banners'));
    }

    public function createBanner(BannerRequest $request)
    {
        $title = "Tạo banner";
        if ($request->isMethod('post')) {
            $data = $request->all();
            $data = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = uploadFile('uploads/banner/', $request->file('image'));
            }
            $create = Banner::create($data);
            if ($create) {
                return redirect()->route('admin.banner.create')->with('success', 'Tạo banner thành công');
            } else {
                return redirect()->route('admin.banner.create')->with('error', 'Tạo banner thất bại');
            }
        }
        return view('admin.banner.create', compact('title'));
    }

    public function updateBanner(BannerRequest $request, $id)
    {
        $banner = Banner::findOrFail($id);
        if ($request->isMethod('post')) {
            $data = $request->all();
            $data = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = uploadFile('uploads/banner/', $request->file('image'));
            } else {
                $data['image'] = $banner->image;
            }
            $update = Banner::where('id', $id)->update($data);
            if ($update) {
                return redirect()->route('admin.banner.update', ['id' => $id])->with('success', 'Cập nhật banner thành công');
            } else {
                return redirect()->route('admin.banner.update', ['id' => $id])->with('error', 'Cập nhật banner thất bại');
            }
        }
        $title = "Cập nhật banner";
        return view('admin.banner.update', compact('title', 'banner'));
    }

    public function deleteBanner($id)
    {
        $banner = Banner::findOrFail($id);
        $delete = $banner->delete();
        if ($delete) {
            unlink(public_path('storage/' . $banner->image));
            return response()->json(['message' => 'Xóa thành công'], 200);
        } else {
            return response()->json(['message' => 'Xóa thất bại'], 500);
        }
    }

    public function activeBanner(Request $request)
    {
        $id = $request->id;
        $banner = Banner::findOrFail($id);
        if ($banner) {
            $updated = Banner::where('id', $id)->update(['status' => 1]);
            if ($updated) {
                return response()->json(['message' => 'Cập nhật trạng thái thành công'], 200);
            } else {
                return response()->json(['message' => 'Cập nhật trạng thái thất bại'], 500);
            }
        }
    }

    public function deactiveBanner(Request $request)
    {
        $id = $request->id;
        $banner = Banner::findOrFail($id);
        if ($banner) {
            $updated = Banner::where('id', $id)->update(['status' => 0]);
            if ($updated) {
                return response()->json(['message' => 'Cập nhật trạng thái thành công'], 200);
            } else {
                return response()->json(['message' => 'Cập nhật trạng thái thất bại'], 500);
            }
        }
    }
}
