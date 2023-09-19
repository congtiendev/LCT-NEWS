@extends('admin.layouts.master')
@section('content')
<main class="w-full px-3 mx-auto sm:px-5">

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


    <!-- Breadcrumb Start -->
    <div class="flex flex-col gap-3 my-6 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="font-bold text-black text-title-md2">
            Quản lý bình luận
        </h2>
    </div>
    <!-- Breadcrumb End -->


    <!-- ====== Table Three Start -->
    <div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left bg-gray-2 dark:bg-meta-4">
                        <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                            Người bình luận
                        </th>
                        <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                            Nội dung
                        </th>
                        <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                            Bài viết
                        </th>
                        <th class="px-4 py-4 font-medium text-black dark:text-white">
                            Ngày bình luận
                        </th>
                        <th class="px-4 py-4 font-medium text-black dark:text-white">
                            Thao tác
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                    <tr>
                        <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                            <a href="{{ route('admin.user.profile',['id'=>$comment->user_id]) }}" class="font-medium text-black dark:text-white">
                                {{ $comment->fullname  }}
                            </a>
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                            <p class="text-black dark:text-white">
                                {{ $comment->content  }}
                            </p>
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                            <a href="{{ route('post.detail',['slug'=>$comment->post_slug]) }}" class="inline-flex px-3 py-1 text-sm font-medium text-center rounded-full bg-success bg-opacity-10 text-success">
                                Xem bài viết
                            </a>
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                            <p class="text-black dark:text-white">
                                {{ date('d-m-Y', strtotime($comment->created_at))  }}
                            </p>
                        </td>

                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                            <div class="flex items-center space-x-3.5">
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
                                                    <form action="{{ route('admin.comment.delete',['id' =>$comment->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-id="{{$comment->id  }}" type="submit" class="flex items-center gap-3 p-1 text-red-500 rounded-md hover:bg-red-100 hover:text-white delete__comment-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                            </svg>
                                                            Xóa comment
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ====== Table Three End -->

</main>
@endsection
