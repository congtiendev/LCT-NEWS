<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\User;


class AuthController extends Controller
{


    public function login(UserRequest $request)
    {
        if (Auth::check()) {
            return redirect()->back()->with('warning', 'Vui lòng đăng xuất để đăng nhập với tài khoản khác');
        }

        if ($request->isMethod('post')) {
            $data = $request->only('email', 'password');
            if (Auth::attempt($data)) {
                return $this->handleSuccessfulLogin($request);
            } else {
                return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng');
            }
        } else {
            return view('auth.login', ['title' => 'Đăng nhập']);
        }
    }

    private function handleSuccessfulLogin($request)
    {
        if ($request->session()->has('previous_page')) {
            $previousPage = $request->session()->pull('previous_page');
            return redirect()->to($previousPage)->with('success', 'Đăng nhập thành công');
        } else {
            $redirectTo = Auth::user()->role == 1 ? route('admin.user.index') : route('home');
            return redirect()->to($redirectTo)->with('success', 'Đăng nhập thành công');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Đăng xuất thành công');
    }

    public function register(UserRequest $request)
    {
        $title = 'Đăng ký';
        if ($request->isMethod('post')) {
            $data = $request->all();
            $data = $request->except('_token');
            dd($data);
            $data['password'] = Hash::make($data['password']);
            $data['email_verified_at'] = Carbon::now('Asia/Ho_Chi_Minh');
            $user = User::create($data);
            if ($user) {
                return redirect()->route('login')->with('success', 'Đăng ký thành công');
            }
            return redirect()->back()->with('error', 'Đăng ký thất bại');
        } else {
            return view('auth.register', compact('title'));
        }
    }

    public function getAuth($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json([
                'status' => 200,
                'data' => $user
            ]);
        }
        return response()->json([
            'status' => 404,
            'message' => 'Không tìm thấy người dùng'
        ]);
    }
}
