@extends('auth.master')
@section('content')
<main class="items-center justify-center gap-20 pt-5 bg-gray-100 md:flex">
    <div class="items-center hidden md:flex">
        <div style="
              background-image: url('../../images/illustration/iphone6.png');
            " class="w-[290px] h-[590px] bg-no-repeat bg-cover relative">
            <div class="absolute overflow-hidden top-[9%] bottom-[11%] left-[6%] right-[6%]">
                <img class="object-cover w-full h-full" src="" alt="" />
            </div>
        </div>
    </div>

    <div class="">
        <div class="flex flex-col items-center justify-center">
            @if(Session::has('success'))
            <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                <svg class="inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">Thành công!</span> {{ Session::get('success') }}
                </div>
            </div>
            @endif

            @if(Session::has('error'))
            <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                <svg class="inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">Lỗi !</span> {{ Session::get('error') }}
                </div>
            </div>
            @endif

            @if(Session::has('warning'))
            <div class="flex p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg" role="alert">
                <svg class="inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">Cảnh báo !</span> {{ Session::get('warning') }}
                </div>
            </div>
            @endif


            <div class="flex flex-col items-center py-8 mb-3 bg-white border border-gray-300 w-80">
                <img id="logo" class="w-44" src="{{ asset('images/logo/logo.png') }}" alt="" />
                <form id="login__form" method="post" action="{{ route('login') }}" class="flex flex-col w-64 mt-8">
                    @csrf
                    <span class="account__error text-xs text-red-500 my-0.5">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </span>
                    <input autofocus class="w-full px-2 py-2 mb-2 text-xs bg-gray-100 border border-gray-300 rounded focus:outline-none focus:border-gray-400 active:outline-none" name="email" placeholder="Email..." type="text" value="{{ old('email') }}" />
                    <span class="password__error text-xs text-red-500 my-0.5">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </span>
                    <input autofocus class="w-full px-2 py-2 mb-2 text-xs bg-gray-100 border border-gray-300 rounded focus:outline-none focus:border-gray-400 active:outline-none" id="password" name="password" placeholder="Mật khẩu" type="password" />
                    <label class="flex items-center gap-2 pb-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="checkbox w-[17px] h-[17px] rounded-sm checkbox-warning" />
                        <span class="text-xs">Nhớ tài khoản</span>
                    </label>
                    <button type="submit" class="py-1 text-sm font-medium text-center text-white bg-blue-300 rounded">
                        Đăng nhập
                    </button>
                </form>
                <div class="flex w-64 mt-4 space-x-2 justify-evenly">
                    <span class="relative flex-grow h-px bg-gray-300 top-2"></span>
                    <span class="flex-none text-xs font-semibold text-gray-400 uppercase">Hoặc</span>
                    <span class="relative flex-grow h-px bg-gray-300 top-2"></span>
                </div>
                <button class="flex items-center mt-4">
                    <img class="w-5 mr-1 rounded" src="" alt="" />
                    <span class="text-xs font-semibold text-blue-900">Đăng nhập bằng Facebook</span>
                </button>
                <a class="mt-4 -mb-4 text-xs text-blue-900 cursor-pointer">Quên mật khẩu?</a>
            </div>
            <div class="py-4 text-center bg-white border border-gray-300 w-80">
                <span class="text-sm">Bạn không có tài khoản?</span>
                <a href="{{ route('register') }}" class="text-sm font-semibold text-blue-500">Đăng ký</a>
            </div>
            <div class="mt-3 text-center">
                <span class="text-xs">Tải ứng dụng.</span>
                <div class="flex mt-3 space-x-2">
                    <img class="w-32" src="https://raw.githubusercontent.com/azateser/tailwindCSS_uiPack/main/src/assets/instagram-login/apple.png" alt="" />
                    <img class="w-32" src="https://raw.githubusercontent.com/azateser/tailwindCSS_uiPack/main/src/assets/instagram-login/google.png" alt="" />
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
