@extends('admin.layouts.master')
@section('content')
<main class="w-full px-3 mx-auto sm:px-5">
    <div class="bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="py-6 px-4 md:px-6 xl:px-7.5 flex items-center justify-between">
            <h4 class="text-xl font-bold text-black dark:text-white">Quản lý banner</h4>
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

        <div class="grid grid-cols-6 border-t border-stroke py-4.5 px-4 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
            <div class="flex items-center col-span-1">
                <p class="font-medium">Ảnh</p>
            </div>
            <div class="items-center hidden col-span-3 sm:flex">
                <p class="font-medium">Sologan</p>
            </div>
            <div class="flex items-center col-span-2">
                <p class="font-medium">Link</p>
            </div>
            <div class="flex items-center col-span-1">
                <p class="font-medium">Trạng thái</p>
            </div>
            <div class="flex items-center col-span-1">
                <p class="font-medium">Thao tác</p>
            </div>
        </div>

        @foreach($banners as $banner)
        <div id="banner-{{ $banner->id }}" class="grid grid-cols-6 border-t border-stroke py-4.5 px-4 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
            <div class="flex items-center col-span-1 my-3 text-center">
                <div class="object-cover h-auto rounded-md w-28">
                    <img src="{{ Storage::url($banner->image) }}" alt="{{ $banner->slogan }}" />
                </div>
            </div>
            <div class="items-center hidden px-2 col-span-3 sm:flex">
                <p class="text-sm font-medium text-black dark:text-white">{{ $banner->slogan }}</p>
            </div>
            <div class="flex items-center col-span-2 ">
                <a href=" {{ $banner->link }}" class="text-sm font-medium text-blue-500 hover:underline">
                    Truy cập
                </a>
            </div>
            <div id="status-{{ $banner->id }}" class="flex items-center col-span-1">
                @if($banner->status == 1)
                <div class="active-{{ $banner->id }} gap-2 text-xs text-white badge badge-success">
                    Đã bật
                </div>
                @else
                <div class="deactive-{{ $banner->id }} gap-2 text-xs text-white badge badge-error">
                    Đã tắt
                </div>
                @endif
            </div>
            <div class="flex items-center col-span-1">
                <div class="z-50 dropdown dropdown-left dropdown-end whitespace-nowrap">
                    <button tabindex="0" class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                        </svg>
                    </button>
                    <ul tabindex="0" class="z-50 bg-white shadow dropdown-content rounded-xl">
                        <div class="p-2 text-sm text-gray-500 bg-white border border-gray-100 w-fit rounded-xl">
                            <ul class="space-y-1">
                                <li>
                                    <a href="{{ route('admin.banner.update',['id' =>$banner->id]) }}" class="flex items-center gap-3 p-1 rounded-md hover:bg-gray-100 text-[#000000]">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-black">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                        Chỉnh sửa banner
                                    </a>
                                </li>
                                @if($banner->status == 0)
                                <li>
                                    <form action="{{ route('admin.banner.active') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button data-id="{{ $banner->id }}" type="submit" class="flex items-center gap-3 p-1 text-blue-500 rounded-md hover:bg-blue-100 hover:text-white active__banner-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>
                                            Bật banner
                                        </button>
                                    </form>
                                </li>
                                @else
                                <li>
                                    <form action="{{ route('admin.banner.deactive') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button data-id="{{ $banner->id }}" type="submit" class="flex items-center gap-3 p-1 text-red-500 rounded-md hover:bg-red-100 hover:text-white deactive__banner-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Tắt banner
                                        </button>
                                    </form>
                                </li>
                                @endif

                                <li>
                                    <hr class="my-2 -mx-2 border-gray-300" />
                                </li>
                                <li>
                                    <form action="{{ route('admin.banner.delete',['id' =>$banner->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button data-id="{{$banner->id  }}" type="submit" class="flex items-center gap-3 p-1 text-red-500 rounded-md hover:bg-red-100 hover:text-white delete__banner-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                            Xóa banner
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</main>
@endsection
