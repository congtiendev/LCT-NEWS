@extends('admin.layouts.master')
@section('content')
<main class="w-full px-3 mx-auto sm:px-5">
    @if(Session::has('success'))
    <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
        </svg>
        <div>
            <span class="font-medium">Thành công!</span> {{ Session::get('success') }}
        </div>
    </div>
    @endif

    @if(Session::has('error'))
    <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
        </svg>
        <div>
            <span class="font-medium">Lỗi !</span> {{ Session::get('error') }}
        </div>
    </div>
    @endif
        @if(Session::has('warning'))
        <div class="flex bg-yellow-100 rounded-lg p-4 mb-4 text-sm text-yellow-700" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
            </svg>
            <div>
                <span class="font-medium">Cảnh báo !</span> {{ Session::get('warning') }}
            </div>
        </div>
        @endif

    <!-- Breadcrumb Start -->
    <div class="my-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black">
            Quản lý người dùng
        </h2>

        <nav>
            <ol class="flex items-center gap-2 text-sm">
                <li>
                    <a class="font-medium" href="{{ route('admin.user.index') }}">Quản lý người dùng</a>
                </li>
                <li class="text-primary">/ Tài khoản đã xóa</li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb End -->

    <form method="get" action="" class="flex flex-wrap items-center justify-between mt-6">
        <div class="relative flex items-center form-group">
            <button type="submit" class="absolute" name="account">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
            <input type="text" placeholder="Tìm kiếm" name="keyword" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 focus:border-blue-400 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" />
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.user.create') }}" class="flex items-center gap-2 px-3 py-2 text-xs font-medium text-white transition-all duration-300 bg-indigo-600 font-montserrat rounded-xl hover:bg-indigo-500" style="box-shadow: 0 15px 30px -5px rgba(79, 70, 229, 0.6);"><span class="hidden sm:block">Thêm
                    tài khoản</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                </svg>
            </a>
        </div>
    </form>

    <div class="flex flex-col sm:mt-3">
        <div class="w-full overflow-x-auto hidden__scrollbar">
            <div class="inline-block min-w-full pt-2 align-middle">
                <div class="overflow-hidden border border-gray-200 rounded-t-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="text-gray-700 bg-gray-50 whitespace-nowrap">
                            <tr>
                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500">
                                    <div class="flex items-center gap-x-3 focus:outline-none">
                                        <span>Tên</span>
                                        <a href="">
                                            <svg class="h-4 text-indigo-500 hover:text-indigo-900" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                    Email
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                    Số điện thoại
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500 rtl:text-right">
                                    <div class="flex items-center gap-x-3 focus:outline-none">
                                        <a href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 font-bold text-indigo-500 hover:text-indigo-900">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                                            </svg>
                                        </a>
                                        <span>Ngày tạo</span>
                                        <a href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 text-indigo-500 hover:text-indigo-900">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
                                            </svg>
                                        </a>
                                        <input type="hidden" name="list_account">
                                    </div>
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                    Vai trò
                                </th>
                                <th scope="col" class="relative py-3.5 px-4"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if(count($users) == 0)
                            <tr>
                                <td colspan="6" class="text-center py-4 text-sm font-medium text-gray-500">
                                    Không có tài khoản nào bị xóa
                                </td>
                            </tr>
                            @else
                            @foreach ($users as $user)
                            <tr id="user-{{ $user->id }}">
                                <td class="flex items-center gap-2 px-4 py-4 text-sm font-medium whitespace-nowrap">
                                    <div class="w-8 h-8">
                                        <img class="object-cover w-full h-full rounded-full" src="{{ $user->avatar ? Storage::url($user->avatar) : Storage::url('uploads/avatar/default.png') }}" alt="Avatar" loading="lazy" />
                                    </div>
                                    <section>
                                        <h2 class="font-medium text-gray-800">
                                            {{ $user->fullname  }}
                                        </h2>
                                        <p class="text-xs font-normal text-gray-600">
                                            {{ $user->username }}
                                        </p>
                                    </section>
                                </td>

                                <td class="p-4 text-sm whitespace-nowrap">
                                    <p class="text-gray-700">
                                        {{ $user->email }}
                                    </p>
                                </td>

                                <td class="p-4 text-sm max-w-[220px] overflow-hidden truncate whitespace-nowrap">
                                    <p class="text-gray-700">
                                        {{ $user->phone }}
                                    </p>
                                </td>
                                <td class="p-4 text-sm whitespace-nowrap">
                                    <p class="text-gray-900">
                                        {{ $user->created_at }}
                                    </p>
                                </td>
                                <td class="p-4 text-sm font-medium whitespace-nowrap">
                                    <div class="text-sm text-gray-700 font-medium  {{ $user->role == 0 ? 'badge badge-success' : 'badge badge-error' }} ">
                                        {{ $user->role == 0 ? 'Người dùng' : 'Admin' }}
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    @if($user->role == 0)
                                    <div class="z-50 dropdown dropdown-left dropdown-end">
                                        <button tabindex="0" class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg hover:bg-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                            </svg>
                                        </button>
                                        <ul tabindex="0" class="z-50 bg-white shadow dropdown-content rounded-xl">
                                            <div class="p-2 text-sm text-gray-500 bg-white border border-gray-100 w-fit rounded-xl">
                                                <ul class="space-y-1">
                                                    <li>
                                                        <a data-id="{{ $user->id }}" href="{{ route('admin.user.restore',['id' =>$user->id]) }}" class="flex items-center gap-3 p-1 rounded-md hover:bg-gray-100 text-[#000000] restore__user-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-black">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                            </svg>
                                                            Khôi phục tài khoản
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <hr class="my-2 -mx-2 border-gray-300" />
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('admin.user.force-delete',['id' =>$user->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button data-id="{{ $user->id }}" type="submit" class="flex items-center gap-3 p-1 text-red-500 rounded-md hover:bg-red-100 hover:text-white force__delete-user-btn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg>
                                                                Xóa vĩnh viễn
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </ul>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------- Pagination----------------------------------- -->
    <section class="flex items-center justify-center px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-white border border-gray-200 rounded-b-lg">
        <span class="flex col-span-4 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">

                    {{-- Nút Previous --}}
                    @if ($users->currentPage() > 1)
                    <li>
                        <a href="{{ $users->previousPageUrl() }}">
                            <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                                <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </button>
                        </a>
                    </li>
                    @endif

                    {{-- Liên kết trang --}}
                    @for ($i = 1; $i <= $users->lastPage(); $i++)
                        <li>
                            <a href="{{ $users->url($i) }}">
                                <button class="mx-1 px-3 py-1 text-white transition-colors duration-150 bg-indigo-500 border border-r-0 border-indigo-500 rounded-md focus:outline-none focus:shadow-outline-purple {{ $i == $users->currentPage() ? 'bg-indigo-800' : '' }}">
                                    {{ $i }}
                                </button>
                            </a>
                        </li>
                        @endfor

                        {{-- Nút Next --}}
                        @if ($users->hasMorePages())
                        <li>
                            <a href="{{ $users->nextPageUrl() }}">
                                <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </a>
                        </li>
                        @endif
                </ul>
            </nav>
        </span>
    </section>


</main>
@endsection
