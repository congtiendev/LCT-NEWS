@extends('admin.layouts.master')
@section('content')
<main class="w-full h-full overflow-y-auto rounded-2xl hidden__scrollbar">
    <section class="flex w-full h-screen gap-1">
        <aside class="hidden h-full bg-white shadow-xs md:block whitespace-nowrap" aria-label="Sidebar">
            <div class="overflow-y-auto bg-white shadow-xs">
                <ul class="flex flex-col gap-1 p-3 list-sidebar">
                    <li class="flex items-center gap-1 p-2 rounded-md">
                        <a href="{{ route('admin.user.profile.update',['id'=>$user->id]) }}" class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="p-1 text-gray-600 bg-gray-200 rounded-full w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <span class="text-sm font-medium text-gray-700">Thông tin cá
                                nhân</span>
                        </a>
                    </li>
                    <li class="flex items-center gap-1 p-2 bg-gray-100 rounded-md">
                        <a href="{{ route('admin.user.account.update',['id'=>$user->id]) }}" class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="p-0.5 text-gray-500 bg-gray-200 rounded-full w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>

                            <span class="text-sm font-medium text-gray-700">Thông tin tài khoản</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <article class="w-full h-full px-4 py-3 bg-white shadow-xs sm:px-5 sm:py-3">
            <section class="w-full h-full setting-user-info">
                @if(Session::has('success'))
                <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">Thành công!</span> {{ Session::get('success') }}
                    </div>
                </div>
                @endif

                @if(Session::has('error'))
                <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">Lỗi !</span> {{ Session::get('error') }}
                    </div>
                </div>
                @endif


                <form action="" method="post" class="w-full h-full">
                    @csrf
                    <!-- Breadcrumb Start -->
                    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <h1 class="my-4 text-xl font-semibold text-gray-700">Thông tin
                            tài khoản
                        </h1>
                        <nav>
                            <ol class="flex items-center gap-2 text-sm">
                                <li>
                                    <a class="font-medium" href="{{ route('admin.user.index') }}">Quản lý người dùng</a>
                                </li>
                                <li class="text-primary">/ Tài khoản</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Breadcrumb End -->
                    <div class="grid grid-cols-1 gap-5 form-control sm:grid-cols-2">
                        <div class="form-group">
                            <label for="first_name" class="block text-sm font-medium text-gray-500 ">Họ và tên
                            </label>
                            <div class="relative flex items-center mt-2">
                                <span class="absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>

                                </span>
                                <input type="text" placeholder="Họ và tên..." name="fullname" class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5   focus:border-indigo-400 focus:ring-indborder-indigo-300 focus:outline-none focus:ring focus:ring-opacity-40" value="{{ old('fullname') ? old('fullname') : $user->fullname }}">
                            </div>
                            <span class="mt-2 text-xs text-red-500">
                                @error('fullname')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="username" class="block text-sm font-medium text-gray-500 ">Tên đăng nhập
                            </label>
                            <div class="relative flex items-center mt-2">
                                <span class="absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>

                                </span>
                                <input type="text" placeholder="Username..." name="username" class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5   focus:border-indigo-400 focus:ring-indborder-indigo-300 focus:outline-none focus:ring focus:ring-opacity-40" value="{{ old('username') ? old('username') : $user->username}}">
                            </div>
                            <span class="mt-2 text-xs text-red-500">
                                @error('username')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="email" class="block text-sm font-medium text-gray-500 ">Email
                            </label>
                            <div class="relative flex items-center mt-2">
                                <span class="absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-3 text-gray-400">
                                        <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                                    </svg>
                                </span>
                                <input type="email" placeholder="Email..." name="email" class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5   focus:border-indigo-400 focus:ring-indborder-indigo-300 focus:outline-none focus:ring focus:ring-opacity-40" value="{{ old('email') ? old('email') : $user->email}}">
                            </div>
                            <span class="mt-2 text-xs text-red-500">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="phone_number" class="block text-sm font-medium text-gray-500 ">Số
                                điện thoại
                            </label>
                            <div class="relative flex items-center mt-2">
                                <span class="absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                    </svg>

                                </span>
                                <input type="number" min="0" placeholder="Số điện thoại..." name="phone" class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5   focus:border-indigo-400 focus:ring-indborder-indigo-300 focus:outline-none focus:ring focus:ring-opacity-40" value="{{ old('phone') ? old('phone') : $user->phone}}">
                            </div>
                            <span class="mt-2 text-xs text-red-500">
                                @error('phone')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="role" class="block text-sm font-medium text-gray-500 ">Vai trò
                            </label>
                            <div class="relative flex items-center mt-2">
                                <span class="absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                    </svg>

                                </span>
                                <select name="role" class="block w-full py-3 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 focus:border-indigo-400 focus:ring-indborder-indigo-300 focus:outline-none focus:ring focus:ring-opacity-40">
                                    <option @if($user->role == 0) selected @endif value="0">Người dùng
                                    </option>
                                    <option @if($user->role == 1) selected @endif value="1">Admin
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-500">
                                Mật khẩu
                            </label>
                            <a href="{{ route('admin.user.change-password',['id'=>$user->id]) }}" class="btn btn-outline btn-info">Đổi
                                mật
                                khẩu</a>
                        </div>
                    </div>
                    <div class="flex justify-center gap-2 my-5 btn-group">
                        <button type="reset" style="background-color: #ff0000" class="w-32 px-4 py-2 font-medium text-white transition-all duration-300 rounded-xl hover:bg-red-500">
                            Hủy
                        </button>
                        <button class="w-32 px-4 py-2 font-medium text-white transition-all duration-300 bg-green-600 rounded-xl hover:bg-green-500">
                            Lưu
                        </button>
                    </div>
                </form>
            </section>
        </article>
    </section>
</main>
@endsection
