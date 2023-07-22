@extends('admin.layouts.master')
@section('content')
<main class="w-full h-full overflow-y-auto rounded-2xl hidden__scrollbar">
    <section class="flex w-full h-screen gap-1">
        <aside class="hidden h-full bg-white shadow-xs md:block whitespace-nowrap" aria-label="Sidebar">
            <div class="overflow-y-auto bg-white shadow-xs">
                <ul class="flex flex-col gap-1 p-3 list-sidebar">
                    <li class="flex items-center gap-1 p-2 bg-gray-100 rounded-md">
                        <a href="{{ route('admin.user.profile.update',['id'=>$user->id]) }}" class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="p-1 text-gray-600 bg-gray-200 rounded-full w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <span class="text-sm font-medium text-gray-700">Thông tin cá
                                nhân</span>
                        </a>
                    </li>
                    <li class="flex items-center gap-1 p-2 rounded-md">
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
        <article class="w-full h-full p-3 bg-white shadow-xs">
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
                <form action="{{ route('admin.user.profile.update',['id'=>$user->id]) }}" method="post" enctype="multipart/form-data" class="w-full h-full">
                    @csrf
                    <!-- Breadcrumb Start -->
                    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <h1 class="my-4 text-xl font-semibold text-gray-700">Thông tin
                            cá nhân
                        </h1>
                        <nav>
                            <ol class="flex items-center gap-2 text-sm">
                                <li>
                                    <a class="font-medium" href="{{ route('admin.user.index') }}">Quản lý người dùng</a>
                                </li>
                                <li class="text-primary">/ Thông tin</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Breadcrumb End -->

                    <div class="flex flex-col items-center justify-center gap-2 mb-5">
                        <div class="relative object-cover avatar-box w-24 h-24">
                            <img id="avatar" class="object-cover rounded-full w-24 h-24" src="{{ $user->avatar ? Storage::url($user->avatar) : Storage::url('uploads/avatar/default.png') }}" alt="" class="rounded-full w-14 h-14">
                            <label class="absolute right-0 cursor-pointer bottom-0">
                                <img src="{{ asset('images/icons/camera-icon.png') }}" alt="" class="w-7 h-7">
                                <input id="avatar-upload" name="avatar" type="file" class="hidden" accept="image/*">
                            </label>
                            <span class="text-xs text-red-500">
                                @error('avatar')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="flex flex-col text-center">
                            <h2 class="font-semibold text-lg text-gray-700 title__setting--user">
                                {{ $user->fullname }}
                            </h2>
                            <span class="text-sm font-medium text-indigo-500 sm:text-sm">{{ $user->username }}</span>
                        </div>
                    </div>


                    <div class="grid grid-cols-1 gap-5 form-control sm:grid-cols-2">
                        <div class="form-group">
                            <label for="fullname" class="block text-sm font-medium text-gray-500 ">Họ và
                                tên
                            </label>
                            <div class="relative flex items-center mt-2">
                                <span class="absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>

                                </span>
                                <input type="text" placeholder="Họ và tên..." name="fullname" class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5   focus:border-indigo-400 focus:ring-indborder-indigo-300 focus:outline-none focus:ring focus:ring-opacity-40" value="{{ old('fullname') ? old('fullname') : $user->fullname }}" />
                            </div>
                            <span class="text-xs text-red-500">
                                @error('fullname')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="email" class="block text-sm font-medium text-gray-500 ">Ngày
                                sinh
                            </label>
                            <div class="relative flex items-center mt-2">
                                <span class="absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>
                                </span>
                                <input type="date" name="birthday" class="block w-full py-2 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 focus:border-indigo-400 focus:ring-indborder-indigo-300 focus:outline-none focus:ring focus:ring-opacity-40" value="{{ old('birthday') ? old('birthday') : $user->birthday }}">
                            </div>
                            <span class="text-xs text-red-500">
                                @error('birthday')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="block text-sm font-medium text-gray-500 ">Giới tính
                            </label>
                            <div class="relative flex items-center mt-2">
                                <span class="absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                    </svg>

                                </span>
                                <select name="gender" class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5   focus:border-indigo-400 focus:ring-indborder-indigo-300 focus:outline-none focus:ring focus:ring-opacity-40">
                                    <option @if($user->gender == 1) selected @endif value="1">Nam
                                    </option>
                                    <option @if($user->gender == 0) selected @endif value="0">Nữ
                                    </option>
                                    <option @if($user->gender == 2) selected @endif value="2">Khác</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="block text-sm font-medium text-gray-500 ">Địa chỉ
                            </label>
                            <div class="relative flex items-center mt-2">
                                <span class="absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                </span>
                                <input type="text" placeholder="Địa chỉ..." name="address" class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5   focus:border-indigo-400 focus:ring-indborder-indigo-300 focus:outline-none focus:ring focus:ring-opacity-40" value="{{ old('address') ? old('address') : $user->address }}">
                            </div>
                            <span class="text-xs text-red-500">
                                @error('address')
                                {{ $message }}
                                @enderror
                            </span>
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
