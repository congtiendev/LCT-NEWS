@extends('admin.layouts.master')
@section('content')
<!-- ===== Main Content Start ===== -->
<main>
    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="flex flex-col gap-3 mb-6 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-bold text-black text-title-md2 dark:text-white">
                Quản lý bài viết
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="index.html">Dashboard /</a>
                    </li>
                    <li class="font-medium text-primary"> Quản lý bài viết
                    </li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->
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

        <div class="flex flex-col gap-5 md:gap-7 2xl:gap-10">
            <!-- ====== Data Table Two Start -->
            <div class="bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="max-w-full overflow-x-auto data-table-common data-table-two">
                    <table class="table w-full table-auto" id="dataTableTwo">
                        <thead>
                            <tr>
                                <th>
                                    <div class="flex items-center justify-between gap-1.5">
                                        <p>Người đăng</p>
                                        <div class="inline-flex flex-col space-y-[2px]">
                                            <span class="inline-block">
                                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 0L0 5H10L5 0Z" fill="" />
                                                </svg>
                                            </span>
                                            <span class="inline-block">
                                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z" fill="" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center justify-between gap-1.5">
                                        <p>Tiêu đề</p>
                                        <div class="inline-flex flex-col space-y-[2px]">
                                            <span class="inline-block">
                                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 0L0 5H10L5 0Z" fill="" />
                                                </svg>
                                            </span>
                                            <span class="inline-block">
                                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z" fill="" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center justify-between gap-1.5">
                                        <p>Danh mục</p>
                                        <div class="inline-flex flex-col space-y-[2px]">
                                            <span class="inline-block">
                                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 0L0 5H10L5 0Z" fill="" />
                                                </svg>
                                            </span>
                                            <span class="inline-block">
                                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z" fill="" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center justify-between gap-1.5">
                                        <p>Lượt xem</p>
                                        <div class="inline-flex flex-col space-y-[2px]">
                                            <span class="inline-block">
                                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 0L0 5H10L5 0Z" fill="" />
                                                </svg>
                                            </span>
                                            <span class="inline-block">
                                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z" fill="" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <th data-type="date" data-format="YYYY/DD/MM">
                                    <div class="flex items-center justify-between gap-1.5">
                                        <p>Ngày đăng</p>
                                        <div class="inline-flex flex-col space-y-[2px]">
                                            <span class="inline-block">
                                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 0L0 5H10L5 0Z" fill="" />
                                                </svg>
                                            </span>
                                            <span class="inline-block">
                                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z" fill="" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center justify-between gap-1.5">
                                        <p>Trạng thái</p>
                                        <div class="inline-flex flex-col space-y-[2px]">
                                            <span class="inline-block">
                                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 0L0 5H10L5 0Z" fill="" />
                                                </svg>
                                            </span>
                                            <span class="inline-block">
                                                <svg class="fill-current" width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 5L10 0L-4.37114e-07 8.74228e-07L5 5Z" fill="" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center justify-between gap-1.5">
                                        <p>Thao tác</p>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center text-black">
                            @foreach ($posts as $post)
                            <tr class="post-{{ $post->post_id }}">
                                <td>{{ $post->author_name }}</td>
                                <td>
                                    <p class="overflow-hidden truncate" style="max-width: 200px;">
                                        {{ $post->title }}
                                    </p>
                                </td>
                                <td>{{ $post->category_name }}</td>
                                <td>{{ $post->view }}</td>
                                <td>{{ date('h:i d/m/Y', strtotime($post->post_date)) }}</td>
                                <td>
                                    <div class="status-{{ $post->post_id }}">

                                        @if ($post->status == 1)
                                        <a data-id="{{ $post->post_id }}" id="reject-{{ $post->post_id }}" href="{{ route('admin.post.reject') }}" class="inline-flex px-3 py-1 text-xs font-medium rounded-full reject__post-btn bg-success bg-opacity-10 text-success">
                                            Đã duyệt
                                        </a>
                                        @elseif ($post->status == 0)

                                        <a data-id="{{ $post->post_id }}" href="{{ route('admin.post.accept') }}" class="accept-{{ $post->post_id }} inline-flex px-3 py-1 text-xs font-medium rounded-full accept__post-btn bg-warning bg-opacity-10 text-warning">
                                            Chờ duyệt
                                        </a>
                                        @else
                                        <a data-id="{{ $post->post_id }}" href="{{ route('admin.post.accept') }}" class="accept-{{ $post->post_id }} inline-flex px-3 py-1 text-xs font-medium rounded-full accept__post-btn bg-danger bg-opacity-10 text-danger">
                                            Đã từ chối
                                        </a>
                                        @endif
                                    </div>
                                </td>
                                <td>
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
                                                        <a href="{{ route('admin.post.detail',['slug' =>$post->slug]) }}" class="flex items-center gap-3 p-1 rounded-md hover:bg-gray-100 text-[#000000]">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-black">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                                            </svg>
                                                            Xem chi tiết
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="{{ route('admin.post.update',['id' =>$post->post_id]) }}" class="flex items-center gap-3 p-1 rounded-md hover:bg-gray-100 text-[#000000]">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-black">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                            </svg>
                                                            Chỉnh sửa bài viết
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <form action="{{ route('admin.post.accept') }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button data-id="{{ $post->post_id }}" type="submit" class="flex items-center gap-3 p-1 text-blue-500 rounded-md hover:bg-blue-100 hover:text-white accept__post-btn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                                                </svg>
                                                                Duyệt bài viết
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('admin.post.reject') }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button data-id="{{ $post->post_id }}" type="submit" class="flex items-center gap-3 p-1 text-red-500 rounded-md hover:bg-red-100 hover:text-white reject__post-btn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                                </svg>
                                                                Từ chối
                                                            </button>
                                                        </form>
                                                    </li>

                                                    <li>
                                                        <hr class="my-2 -mx-2 border-gray-300" />
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('admin.post.delete',['id' =>$post->post_id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button data-id="{{ $post->post_id }}" type="submit" class="flex items-center gap-3 p-1 text-red-500 rounded-md hover:bg-red-100 hover:text-white delete__post-btn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg>
                                                                Xóa bài viết
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- ====== Data Table Two End -->
        </div>
    </div>
</main>
<!-- ===== Main Content End ===== -->

@endsection
