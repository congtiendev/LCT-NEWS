@extends('admin.layouts.master')
@section('content')
<main class="w-full h-screen overflow-y-auto rounded-2xl hidden__scrollbar">
    <section class="flex w-full h-screen gap-1">
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


        <article class="w-full h-full px-4 py-3 bg-white shadow-xs sm:px-5 sm:py-3">
            <!-- Breadcrumb Start -->
            <div class="flex flex-col gap-3 my-6 sm:flex-row ">
                <nav>
                    <ol class="flex items-center gap-2 text-sm">
                        <li>
                            <a class="font-medium" href="{{ route('admin.user.index') }}">Quản lý bài viết</a>
                        </li>
                        <li class="text-primary">/ {{ $post->title }}</li>
                    </ol>
                </nav>
            </div>
            <!-- Breadcrumb End -->

            <section class="w-full h-full ">
                <h1 class="text-3xl font-bold text-gray-800">{{ $post->title }}</h1>

                <div class="flex items-center gap-2 p-2 mt-3 author-info">
                    <div class="object-cover w-12 h-12 overflow-hidden rounded-full avatar">
                        <img src="{{ $post->avatar ? Storage::url($post->avatar) : Storage::url('uploads/avatar/default.png') }}" alt="{{ $post->fullname }}">

                    </div>
                    <div class="flex flex-col author-name">
                        <a href="#" class="text-sm text-gray-700">Được đăng bởi
                            <span class="text-sm font-medium text-gray-700 hover:text-indigo-500 hover:underline">{{ $post->fullname }}</span>
                        </a>
                        <span class="text-xs text-gray-500">
                            @if($post->post_update_date != null)
                            Cập nhật lần cuối vào {{ date('h:i d/m/Y', strtotime($post->post_update_date)) }}
                            @else
                            Đăng lúc {{ date('h:i d/m/Y', strtotime($post->post_create_date)) }}
                            @endif
                        </span>
                    </div>
                </div>
                <div class="my-3 description">
                    <p class="text-gray-900 font-sunbee">
                        {!! $post->description !!}
                    </p>
                </div>

                <div class="content__post">
                    {!! $post->content !!}
                </div>
            </section>
        </article>
    </section>
</main>
@endsection
