@extends('admin.layouts.master')
@section('content')
<main class="w-full h-screen overflow-y-auto rounded-2xl hidden__scrollbar">
    <section class="flex w-full h-screen gap-1">
        <article class="w-full h-full px-4 py-3 bg-white shadow-xs sm:px-5 sm:py-3">
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

            <!-- Breadcrumb Start -->
            <div class="flex flex-col gap-3 my-6 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="font-bold text-black text-title-md2">
                    Tạo bài viết
                </h2>

                <nav>
                    <ol class="flex items-center gap-2 text-sm">
                        <li>
                            <a class="font-medium" href="{{ route('admin.user.index') }}">Quản lý bài viết</a>
                        </li>
                        <li class="text-primary">/ Tạo bài viết</li>
                    </ol>
                </nav>
            </div>
            <!-- Breadcrumb End -->

            <section class="w-full h-full setting-user-info">
                <form method="post" action="{{ route('admin.post.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">
                        <div class="w-full">
                            <div class="mb-5.5">
                                <label class="block mb-3 text-sm font-medium text-black">Tiêu đề bài viết</label>
                                <input class="w-full p-3 font-medium text-black border rounded border-stroke bg-gray focus:border-primary focus-visible:outline-none" type="text" name="title" placeholder="Nhập tiêu đề..." value="{{ old('title') }}" />
                                @error('title')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-5.5">
                                <label class="block mb-3 text-sm font-medium text-black">Mô tả</label>
                                <textarea class="w-full p-3 font-medium text-black border rounded resize-none border-stroke bg-gray focus:border-primary focus-visible:outline-none" name="description" rows="6" placeholder="Nhập mô tả...">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">
                                <div class="w-full sm:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-black">Danh mục bài viết</label>
                                    <select class="w-full p-3 font-medium text-black border rounded border-stroke bg-gray focus:border-primary focus-visible:outline-none" name="category_id">
                                        <option value="">Chọn danh mục</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="w-full sm:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-black" for="thumbnail">Ảnh đại diện bài viết</label>
                                    <input id="thumbnail-upload" type="file" name="thumbnail" class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-medium outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:py-3 file:px-5 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter" />
                                    <img src="{{ asset('images/background/default-thumbnail.png') }}" alt="thumbnail" class="w-auto h-16 mt-2 rounded-md" id="thumbnail" />
                                    @error('thumbnail')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>

                    <label>
                        <textarea id="content__post" name="content" class="" placeholder="Nội dung bài viết...">{{ old('content') }}</textarea>
                        @error('content')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="flex items-center justify-center gap-3 mt-3 form-group">
                        <button type="reset" class="btn btn-secondary">Nhập lại</button>
                        <button type="submit" class="btn btn-primary">Đăng bài viết</button>
                    </div>
                </form>
            </section>
        </article>
    </section>
</main>
@endsection
