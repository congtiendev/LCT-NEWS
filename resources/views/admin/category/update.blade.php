@extends('admin.layouts.master')
@section('content')
<div class="col-span-5 xl:col-span-2">
    <div class="bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="py-4 border-b border-stroke px-7 dark:border-strokedark flex items-center justify-between">
            <h3 class="font-medium text-black dark:text-white">
                Cập nhật danh mục
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
            <form action="{{ route('admin.category.update',['id'=>$category->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-500 ">Tên danh mục
                    </label>
                    <div class="relative flex items-center mt-2">
                        <span class="absolute">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Tên danh mục.." name="name" class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5   focus:border-indigo-400 focus:ring-indborder-indigo-300 focus:outline-none focus:ring focus:ring-opacity-40" value="{{ $category->name ? $category->name : old('name') }}">
                    </div>
                    <span class="mt-2 text-xs text-red-500">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </span>
                </div>

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
