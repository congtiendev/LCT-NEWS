@extends('auth.master')
@section('content')
<main class="items-center justify-center gap-20 pt-5 bg-gray-100 md:flex">
    <section class="items-center hidden md:flex">
        <div style="
              background-image: url('../../images/illustration/iphone6.png');
            " class="w-[290px] h-[590px] bg-no-repeat bg-cover relative">
            <div class="absolute overflow-hidden top-[9%] bottom-[11%] left-[6%] right-[6%]">
                <img class="object-cover w-full h-full" src="" alt="" />
            </div>
        </div>
    </section>

    <div class="">
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

        <div class="flex flex-col items-center justify-center">
            <div class="flex flex-col items-center py-8 mb-3 bg-white border border-gray-300 w-80">
                <img id="logo" class="w-44" src="../../images/logo/logo.png" alt="" />
                <button class="flex gap-1 my-4">
                    <img class="w-5 mr-1 rounded" src="../../images/logo/facebook.png" alt="" />
                    <span class="text-xs font-semibold text-blue-900">Đăng nhập bằng Facebook</span>
                </button>
                <div class="flex w-64 space-x-2 justify-evenly">
                    <span class="relative flex-grow h-px bg-gray-300 top-2"></span>
                    <span class="flex-none text-xs font-semibold text-gray-400 uppercase">Hoặc</span>
                    <span class="relative flex-grow h-px bg-gray-300 top-2"></span>
                </div>
                <form id="login__form" method="post" action="{{ route('register') }}" class="flex flex-col w-64 mt-4">
                    @csrf
                    @error('email')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    <input autofocus class="w-full px-2 py-2 mb-2 text-xs bg-gray-100 border border-gray-300 rounded focus:outline-none focus:border-gray-400 active:outline-none" name="email" placeholder="Email" type="email" value="{{ old('email') }}" />

                    @error('username')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    <input autofocus class="w-full px-2 py-2 mb-2 text-xs bg-gray-100 border border-gray-300 rounded focus:outline-none focus:border-gray-400 active:outline-none" name="username" placeholder="Tên người dùng" type="text" value="{{old('username')}}" />

                    @error('fullname')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    <input autofocus class="w-full px-2 py-2 mb-2 text-xs bg-gray-100 border border-gray-300 rounded focus:outline-none focus:border-gray-400 active:outline-none" name="fullname" placeholder="Họ và tên" type="text" value="{{old('fullname')}}" />

                    @error('password')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    <input autofocus class="w-full px-2 py-2 mb-2 text-xs bg-gray-100 border border-gray-300 rounded focus:outline-none focus:border-gray-400 active:outline-none" id="password" name="password" placeholder="Mật khẩu" type="password" />

                    @error('confirm_password')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    <input autofocus class="w-full px-2 py-2 mb-2 text-xs bg-gray-100 border border-gray-300 rounded focus:outline-none focus:border-gray-400 active:outline-none" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu" type="password" />

                    <div class="py-2 terms_and_policies">
                        <p class="text-xs text-gray-400">
                            Bằng cách đăng ký, bạn đồng ý với
                            <a href="#" class="text-blue-500">Điều khoản</a>,
                            <a href="#" class="text-blue-500">Chính sách dữ liệu</a> và
                            <a href="#" class="text-blue-500">Chính sách cookie</a> của
                            chúng tôi.
                        </p>
                    </div>
                    <button type="submit" class="py-1 text-sm font-medium text-center text-white bg-blue-300 rounded">
                        Đăng ký
                    </button>
                </form>
            </div>
            <div class="py-4 text-center bg-white border border-gray-300 w-80">
                <span class="text-sm">Bạn đã có tài khoản?</span>
                <a href="{{ route('login') }}" class="text-sm font-semibold text-blue-500">Đăng nhập</a>
            </div>
        </div>
    </div>
</main>
<footer class="bg-gray-100">
    <div class="max-w-2xl py-5 mx-auto text-gray-900 md:py-10 ">
        <div class="text-center">
            <span class="text-xs">Tải ứng dụng.</span>
            <div class="flex justify-center mt-3 space-x-2">
                <img class="w-32" src="https://raw.githubusercontent.com/azateser/tailwindCSS_uiPack/main/src/assets/instagram-login/apple.png" alt="" />
                <img class="w-32" src="https://raw.githubusercontent.com/azateser/tailwindCSS_uiPack/main/src/assets/instagram-login/google.png" alt="" />
            </div>
        </div>
        <div class="flex flex-col items-center pt-5 text-xs text-gray-500 md:flex-row md:justify-between">
            <p class="order-2 mt-5 md:order-1 md:mt-0">
                &copy; CongTienDev, 2023
            </p>
            <div class="order-1 md:order-2">
                <a class="px-2">Giới thiệu</a>
                <a class="px-2 border-l">Trợ giúp</a>
                <a class="px-2 border-l">Điều khoản & chính sách</a>
            </div>
        </div>
    </div>
</footer>

@endsection
