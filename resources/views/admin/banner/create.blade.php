@extends('admin.layouts.master')
@section('content')
<div class="col-span-5 xl:col-span-2">
    <div class="bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="py-4 border-b border-stroke px-7 dark:border-strokedark flex items-center justify-between">
            <h3 class="font-medium text-black dark:text-white">
                Thêm banner
            </h3>
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

        </div>
        <div class="p-7">
            <form action="{{ route('admin.banner.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="slogan" class="block text-sm font-medium text-gray-500 ">Slogan
                    </label>
                    <div class="relative flex items-center mt-2">
                        <span class="absolute">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Slogan.." name="slogan" class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5   focus:border-indigo-400 focus:ring-indborder-indigo-300 focus:outline-none focus:ring focus:ring-opacity-40" value="{{ old('slogan')}}">
                    </div>
                    <span class="mt-2 text-xs text-red-500">
                        @error('slogan')
                        {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group my-3">
                    <label for="link" class="block text-sm font-medium text-gray-500 ">Đường link đến trang web
                    </label>
                    <div class="relative flex items-center mt-2">
                        <span class="absolute">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                            </svg>
                        </span>
                        <input type="url" placeholder="Link..." name="link" class="block w-full py-2.5  placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 text-blue-500  focus:border-indigo-400 focus:ring-indborder-indigo-300 focus:outline-none focus:ring focus:ring-opacity-40" value="{{ old('link')}}">
                    </div>
                    <span class="mt-2 text-xs text-red-500">
                        @error('link')
                        {{ $message }}
                        @enderror
                    </span>
                </div>

                <div id="FileUpload" class="relative mb-5.5 block w-full cursor-pointer appearance-none rounded border-2 border-dashed border-primary bg-gray py-4 px-4 dark:bg-meta-4 sm:py-7.5">
                    <input id="banner-upload" type="file" name="image" accept="image/*" class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer" />
                    <div class="flex flex-col items-center justify-center space-y-3">
                        <span class="flex items-center justify-center w-10 h-10 bg-white border rounded-full border-stroke dark:border-strokedark dark:bg-boxdark">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.99967 9.33337C2.36786 9.33337 2.66634 9.63185 2.66634 10V12.6667C2.66634 12.8435 2.73658 13.0131 2.8616 13.1381C2.98663 13.2631 3.1562 13.3334 3.33301 13.3334H12.6663C12.8431 13.3334 13.0127 13.2631 13.1377 13.1381C13.2628 13.0131 13.333 12.8435 13.333 12.6667V10C13.333 9.63185 13.6315 9.33337 13.9997 9.33337C14.3679 9.33337 14.6663 9.63185 14.6663 10V12.6667C14.6663 13.1971 14.4556 13.7058 14.0806 14.0809C13.7055 14.456 13.1968 14.6667 12.6663 14.6667H3.33301C2.80257 14.6667 2.29387 14.456 1.91879 14.0809C1.54372 13.7058 1.33301 13.1971 1.33301 12.6667V10C1.33301 9.63185 1.63148 9.33337 1.99967 9.33337Z" fill="#3C50E0" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5286 1.52864C7.78894 1.26829 8.21106 1.26829 8.4714 1.52864L11.8047 4.86197C12.0651 5.12232 12.0651 5.54443 11.8047 5.80478C11.5444 6.06513 11.1223 6.06513 10.8619 5.80478L8 2.94285L5.13807 5.80478C4.87772 6.06513 4.45561 6.06513 4.19526 5.80478C3.93491 5.54443 3.93491 5.12232 4.19526 4.86197L7.5286 1.52864Z" fill="#3C50E0" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99967 1.33337C8.36786 1.33337 8.66634 1.63185 8.66634 2.00004V10C8.66634 10.3682 8.36786 10.6667 7.99967 10.6667C7.63148 10.6667 7.33301 10.3682 7.33301 10V2.00004C7.33301 1.63185 7.63148 1.33337 7.99967 1.33337Z" fill="#3C50E0" />
                            </svg>
                        </span>
                        <p class="text-sm font-medium">
                            <span class="text-primary">Tải ảnh lên</span>
                            hoặc kéo thả ảnh vào đây
                        </p>
                        <p class="mt-1.5 text-sm font-medium">
                            SVG, PNG, JPG or GIF
                        </p>
                        <p class="text-sm font-medium">
                            tối đa 5MB
                        </p>
                    </div>
                </div>
                <img src="{{ asset('images/background/default-thumbnail.png') }}" alt="banner-image" class="w-auto h-28 mt-2 rounded-md shadow-md" id="banner" />
                @error('image')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
                <div class="flex justify-end gap-4.5">
                    <button class="flex justify-center px-6 py-2 font-medium text-black border rounded border-stroke hover:shadow-1 dark:border-strokedark dark:text-white" type="reset">
                        Hủy
                    </button>
                    <button class="flex justify-center px-6 py-2 font-medium rounded bg-primary text-gray hover:bg-opacity-90" type="submit">
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
