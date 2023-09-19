@extends('client.layouts.master')
@section('content')
<!-- Start -->
<section class="relative md:py-24 py-16">
    <div class="container">
        <h1 class="text-4xl font-bold text-gray-800">{{ $post->title }}</h1>

        <div class="flex items-center gap-2 p-2 mt-3 author-info ">
            <div class="object-cover overflow-hidden rounded-full avatar ">
                <img src="{{ $post->avatar ? Storage::url($post->avatar) : Storage::url('uploads/avatar/default.png') }}" alt="{{ $post->author_name }}">
            </div>
            <div class="flex flex-col author-name">
                <a href="#" class="text-sm text-gray-700">Được đăng bởi
                    <span class="text-sm font-medium  hover:text-indigo-500 hover:underline">{{ $post->author_name }}</span>
                </a>
                <span class="text-xs text-gray-500">
                    @if($post->post_updated_date != null)
                    Cập nhật lần cuối vào {{ date('h:i d/m/Y', strtotime($post->post_updated_date)) }}
                    @else
                    Đăng lúc {{ date('h:i d/m/Y', strtotime($post->post_created_date)) }}
                    @endif
                </span>
            </div>
        </div>
        <div class="my-3 description">
            <p class="content__post text-gray-900 font-sunbee">
                {!! $post->description !!}
            </p>
        </div>

        <div class="grid lg:grid-cols-12 md:grid-cols-2 grid-cols-1 gap-[30px]">
            <div class="lg:col-span-8 md:order-1 order-2">
                <div class="content__post relative overflow-hidden rounded-xl shadow dark:shadow-gray-800 ">
                    {!!$post->content!!}
                </div>

                <div class="p-5 rounded-md shadow dark:shadow-gray-800 mt-8">
                    <h5 class="font-medium text-lg">Bình luận</h5>
                    @if(count($comments) > 0)
                    <div id="list__comment-{{ $post->post_id }}" class=" flex flex-col">
                        @foreach($comments as $comment)
                        <div id="comment-{{ $comment->comment_id }}" class="flex items-center  gap-2 p-3 mt-3 border rounded-md hover:bg-gray-200">
                            <div class="object-cover overflow-hidden rounded-full avatar ">
                                <img src="{{ $comment->avatar ? Storage::url($comment->avatar) : Storage::url('uploads/avatar/default.png') }}" alt="{{ $comment->fullname }}">
                            </div>
                            <div class="flex flex-col author-name">
                                <div class="text-xs text-gray-700 flex items-center">
                                    <a href="#" class="text-sm font-medium  hover:text-indigo-500 hover:underline">{{ $comment->fullname }}</a>
                                    <span>
                                        {{ date('h:i d/m/Y', strtotime($comment->comment_created_date)) }}
                                    </span>
                                </div>
                                <p class="text-xs text-gray-500">
                                    {{ $comment->content}}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    @if(Auth::check())
                    <form action="{{ route('comment.new') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="grid grid-cols-1">
                            <div class="mb-5">
                                <div class="text-left">
                                    <label for="comments" class="flex items-center  font-semibold">
                                        <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : Storage::url('uploads/avatar/default.png') }}" class="avatar rounded-full shadow dark:shadow-gray-800" alt="">
                                        Nhập bình luận của bạn:</label>
                                    <div class="form-icon relative mt-2">
                                        <textarea name="content" id="comment__content-{{ $post->post_id }}" class="form-input ps-5 h-28" placeholder="Nhập bình luận..." required></textarea>
                                        @error('content')
                                        <span style="color:red" class="test-xs ">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button data-post-id="{{ $post->post_id }}" data-user-id="{{ Auth::user()->id }}" type="submit" class="btn new__comment-btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md w-full">Gửi bình luận</button>
                    </form>
                    @else
                    <h2 class="text-center mt-3">Bạn cần <a href="{{ route('login') }}" style="color:rgb(95, 95, 244)">Đăng nhập</a> để bình luận </h2>
                    @endif
                </div>
            </div>
            <!--end col-->

            <div class="lg:col-span-3 md:order-2 order-1">
                <div class="sticky top-20">
                    <form>
                        <div>
                            <label for="searchname" class="font-medium text-lg">Tìm kiếm</label>
                            <div class="relative mt-2">
                                <i class="uil uil-search text-lg absolute top-[8px] start-3"></i>
                                <input name="keyword" id="searchname" type="text" class="form-input border border-slate-100 dark:border-slate-800 ps-10" placeholder="Tìm kiếm...">
                            </div>
                        </div>
                    </form>

                    <h5 class="font-medium text-lg mt-[30px]">Tin tức gần đây</h5>
                    @foreach ($posts_recent as $recent)
                    <div class="flex items-center mt-4">
                        <img src="{{ Storage::url($recent->thumbnail)}}" class="h-8 rounded-md shadow dark:shadow-gray-800" alt="">

                        <div class="ms-3">
                            <a href="{{ route('post.detail',['slug'=>$recent->slug]) }}" class="text-sm font-medium hover:text-green-600 limited__content-2">
                                {{ $recent->title }}
                            </a>
                            <p class="text-xs text-slate-400">
                                {{ date('h:i d/m/Y', strtotime($recent->created_at)) }}
                            </p>
                        </div>

                        <hr class="my-3">
                    </div>
                    @endforeach

                </div>
            </div>
            <!--end col-->
        </div>
        <!--end grid-->
    </div>
    <!--end container-->
</section>
<!--end section-->
<!-- End -->
@endsection
