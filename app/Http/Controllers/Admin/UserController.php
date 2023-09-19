<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use App\Models\User;

class UserController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        $title = 'Quản lý người dùng';
        $users = User::paginate(10);
        return view('admin.user.index', compact('title', 'users'));
    }

    public function profile($id)
    {
        $title = 'Trang cá nhân';
        $user = User::find($id);
        return view('admin.user.profile', compact('title', 'user'));
    }

    public function createUser(UserRequest $request)
    {
        $title = 'Thêm người dùng';
        if ($request->isMethod('post')) {
            $data = $request->all();
            $data = $request->except('_token');
            $data['password'] = Hash::make($data['password']);
            $this->user->fill($data);
            $user = $this->user->save();
            if ($user) {
                Session::flash('success', 'Thêm người dùng thành công');
                return redirect()->route('admin.user.index');
            } else {
                Session::flash('error', 'Thêm người dùng thất bại');
                return redirect()->route('admin.user.create');
            }
        } else {
            return view('admin.user.create', compact('title'));
        }
    }

    public function updateAccount(UserRequest $request, $id)
    {
        $title = 'Cập nhật tài khoản';
        if ($id) {
            $user = User::find($id);
            if ($request->isMethod('post')) {
                $update = User::where('id', $id)->update($request->except('_token'));
                if ($update) {
                    return redirect()->route('admin.user.account.update', $id)->with('success', 'Cập nhật tài khoản thành công');
                } else {
                    return redirect()->route('admin.user.account.update', $id)->with('error', 'Cập nhật tài khoản thất bại');
                }
            } else {
                return view('admin.user.update_account', compact('title', 'user'));
            }
        } else {
            return redirect()->route('admin.user.index');
        }
    }

    public function updateProfile(UserRequest $request, $id)
    {
        $title = 'Cập nhật thông tin';
        if ($id) {
            $user = User::find($id);
            $categories = DB::table('categories')->get();
            if ($request->isMethod('post')) {
                $data = $request->all();
                $data = $request->except('_token');
                if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                    $data['avatar'] = uploadFile('uploads/avatar', $request->file('avatar'));
                } else {
                    $data['avatar'] = $user->avatar;
                }
                $update = User::where('id', $id)->update($data);
                if ($update) {
                    return redirect()->route('admin.user.profile.update', $id)->with('success', 'Cập nhật thông tin thành công');
                } else {
                    return redirect()->route('admin.user.profile.update', $id)->with('error', 'Cập nhật thông tin thất bại');
                }
            } else {
                return view('admin.user.update_profile', compact('title', 'user'));
            }
        } else {
            return redirect()->route('admin.user.index');
        }
    }

    public function changePassword(UserRequest $request, $id)
    {
        $title = 'Đổi mật khẩu';
        if ($id) {
            $user = User::find($id);
            if ($request->isMethod('post')) {
                $data = $request->all();
                $data = $request->except('_token');
                if (!Hash::check($data['password'], $user->password)) {
                    return redirect()->route('admin.user.change-password', $id)->with('error', 'Mật khẩu hiện tại không đúng');
                } else if (Hash::check($data['new_password'], $user->password)) {
                    return redirect()->route('admin.user.change-password', $id)->with('error', 'Mật khẩu mới không được trùng với mật khẩu cũ');
                }
                $data['password'] = Hash::make($data['new_password']);
                $update = User::where('id', $id)->update(['password' => $data['password']]);
                return redirect()->route('admin.user.change-password', $id)->with('success', 'Đổi mật khẩu thành công');
            } else {
                return view('admin.user.change_password', compact('title', 'user'));
            }
        } else {
            return redirect()->route('admin.user.index');
        }
    }

    public function deleteUser($id)
    {
        if ($id) {
            $deleted = User::where('id', $id)->delete();
            if ($deleted) {
                return response()->json(['message' => 'Xóa thành công'], 200);
            } else {
                return response()->json(['message' => 'Xóa thất bại'], 500);
            }
        }
    }

    public function forceDeleteUser($id)
    {
        if ($id) {
            $avatar = User::onlyTrashed()->where('id', $id)->pluck('avatar')->first();
            if ($avatar) {
                unlink(public_path('storage/' . $avatar));
            }
            $deleted = User::onlyTrashed()->where('id', $id)->forceDelete();
            if ($deleted) {
                return response()->json(['message' => 'Xóa thành công'], 200);
            } else {
                return response()->json(['message' => 'Xóa thất bại'], 500);
            }
        }
    }

    public function restoreUser($id)
    {
        if ($id) {
            $restore = User::onlyTrashed()->where('id', $id)->restore();
            if ($restore) {
                return response()->json(['message' => 'Khôi phục thành công'], 200);
            } else {
                return response()->json(['message' => 'Khôi phục thất bại'], 500);
            }
        }
    }

    public function listDeletedUser()
    {
        $title = 'Danh sách người dùng đã xóa';
        $users = User::onlyTrashed()->paginate(10);
        return view('admin.user.list_deleted', compact('title', 'users'));
    }
}
