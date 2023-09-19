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
                @if(Session::has('warning'))
                <div class="flex bg-yellow-100 rounded-lg p-4 mb-4 text-sm text-yellow-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">Cảnh báo !</span> {{ Session::get('warning') }}
                    </div>
                </div>
                @endif

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
                <form action="{{ route('admin.user.change-password',['id'=>$user->id]) }}" method="post" class="w-full h-full">
                    @csrf
                    <h1 class="my-4 text-xl font-semibold text-gray-700">Thay đổi mật khẩu
                    </h1>
                    <div class="grid grid-cols-1 gap-5 form-control">
                        <div class="form-group">
                            <label for="password" class="block text-sm font-medium text-gray-500 ">Mật khẩu hiện tại
                            </label>
                            <div class="relative flex items-center mt-2">
                                <span class="absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                </span>
                                <input type="password" placeholder="Mật khẩu ..." name="password" class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border @if(session('error'))border-red-500 @else border-gray-200  @endif rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5   focus:border-indigo-400 focus:ring-indborder-indigo-300 focus:outline-none focus:ring focus:ring-opacity-40" value="{{ old('password') }}">
                            </div>
                            <span class="mt-2 text-xs text-red-500">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="block text-sm font-medium text-gray-500 ">Mật khẩu mới
                            </label>
                            <div class="relative flex items-center mt-2">
                                <span class="absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>

                                </span>
                                <input type="password" placeholder="Mật khẩu mới..." name="new_password" class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5   focus:border-indigo-400 focus:ring-indborder-indigo-300 focus:outline-none focus:ring focus:ring-opacity-40" value="{{ old('new_password') }}">
                            </div>
                            <span class="mt-2 text-xs text-red-500">
                                @error('new_password')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="block text-sm font-medium text-gray-500 ">Xác
                                nhận
                                mật khẩu
                            </label>
                            <div class="relative flex items-center mt-2">
                                <span class="absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>

                                </span>
                                <input type="password" placeholder="Nhập lại mật khẩu..." name="confirm_password" class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5   focus:border-indigo-400 focus:ring-indborder-indigo-300 focus:outline-none focus:ring focus:ring-opacity-40" value="{{ old('confirm_password') }}">
                            </div>
                            <span class="mt-2 text-xs text-red-500">
                                @error('confirm_password')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="flex justify-center gap-2 my-5 btn-group">
                            <button type="reset" style="background-color: #ff0000" class="w-32 px-4 py-2 font-medium text-white transition-all duration-300 rounded-xl hover:bg-red-500">
                                Hủy
                            </button>
                            <button name="btn-save" class="w-32 px-4 py-2 font-medium text-white transition-all duration-300 bg-green-600 rounded-xl hover:bg-green-500">
                                Lưu
                            </button>
                        </div>
                    </div>
                </form>
            </section>
        </article>
    </section>
</main>
@endsection
