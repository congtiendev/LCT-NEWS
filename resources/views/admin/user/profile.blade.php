@extends('admin.layouts.master')
@section('content')
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="mx-auto max-w-242.5">
            <!-- Breadcrumb Start -->
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-title-md2 font-bold text-black">
                    Trang cá nhân
                </h2>

                <nav>
                    <ol class="flex items-center gap-2 text-sm">
                        <li>
                            <a class="font-medium" href="{{ route('admin.user.index') }}">Quản lý người dùng</a>
                        </li>
                        <li class="text-primary">/ Trang cá nhân</li>
                    </ol>
                </nav>
            </div>
            <!-- Breadcrumb End -->

            <!-- ====== Profile Section Start -->
            <div class="overflow-hidden rounded-sm border border-stroke bg-white shadow-default">
                <div class="relative z-20 h-35 md:h-65">
                    <img src="{{ $user->avatar ? Storage::url($user->avatar) : Storage::url('uploads/avatar/default.png') }}" alt="profile cover" class="h-full w-full rounded-tl-sm rounded-tr-sm object-cover object-center blur-sm" />
                </div>
                <div class="p-4 text-center lg:pb-8 xl:pb-11.5">
                    <div class="relative z-30 mx-auto -mt-22 h-30 w-full max-w-30 rounded-full bg-white/20 p-1 backdrop-blur sm:h-44 sm:max-w-44 sm:p-1">
                        <img class="w-full h-full object-cover rounded-full" src="{{ $user->avatar ? Storage::url($user->avatar) : Storage::url('uploads/avatar/default.png') }}" alt="profile" />
                    </div>
                    <div class="mt-4">
                        <h3 class="mb-1.5 text-2xl font-medium text-black">
                            {{ $user->fullname }}
                        </h3>
                        <p class="font-medium text-indigo-500">{{ $user->username }}</p>
                        <div class="p-4 border border-dashed border-gray-100 shadow-md max-w-[300px] mx-auto mt-4 rounded-md">
                            <div class="flex items-center  text-gray-700">
                                <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                                    <path d="M256 32c-88.004 0-160 70.557-160 156.801C96 306.4 256 480 256 480s160-173.6 160-291.199C416 102.557 344.004 32 256 32zm0 212.801c-31.996 0-57.144-24.645-57.144-56 0-31.357 25.147-56 57.144-56s57.144 24.643 57.144 56c0 31.355-25.148 56-57.144 56z" />
                                </svg>
                                <h1 class="px-2 text-sm">{{ $user->address }}</h1>
                            </div>


                            <div class="flex items-center mt-4 text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                                    <path d="M6.75.98l-.884.883a1.25 1.25 0 101.768 0L6.75.98zM13.25.98l-.884.883a1.25 1.25 0 101.768 0L13.25.98zM10 .98l.884.883a1.25 1.25 0 11-1.768 0L10 .98zM7.5 5.75a.75.75 0 00-1.5 0v.464c-1.179.305-2 1.39-2 2.622v.094c.1-.02.202-.038.306-.051A42.869 42.869 0 0110 8.5c1.93 0 3.83.129 5.694.379.104.013.206.03.306.051v-.094c0-1.232-.821-2.317-2-2.622V5.75a.75.75 0 00-1.5 0v.318a45.645 45.645 0 00-1.75-.062V5.75a.75.75 0 00-1.5 0v.256c-.586.01-1.17.03-1.75.062V5.75zM4.505 10.365A41.377 41.377 0 0110 10c1.863 0 3.697.124 5.495.365C16.967 10.562 18 11.838 18 13.28v.693a3.72 3.72 0 01-1.665-.393 5.222 5.222 0 00-4.67 0 3.722 3.722 0 01-3.33 0 5.222 5.222 0 00-4.67 0A3.72 3.72 0 012 13.972v-.693c0-1.441 1.033-2.716 2.505-2.914zM15.665 14.921a5.22 5.22 0 002.335.551V16.5a1.5 1.5 0 01-1.5 1.5h-13A1.5 1.5 0 012 16.5v-1.028c.8 0 1.6-.183 2.335-.551a3.722 3.722 0 013.33 0c1.47.735 3.2.735 4.67 0a3.722 3.722 0 013.33 0z" />
                                </svg>
                                <h1 class="px-2 text-sm">{{ date('d-m-Y', strtotime($user->birthday)) }}</h1>
                            </div>
                            <div class="flex items-center mt-4 text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z" clip-rule="evenodd" />
                                </svg>
                                <a href="tel:{{ $user->phone }}" class="px-2 text-sm hover:underline">{{ $user->phone}}</a>
                            </div>

                            <div class="flex items-center mt-4 text-gray-700">
                                <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                                    <path d="M437.332 80H74.668C51.199 80 32 99.198 32 122.667v266.666C32 412.802 51.199 432 74.668 432h362.664C460.801 432 480 412.802 480 389.333V122.667C480 99.198 460.801 80 437.332 80zM432 170.667L256 288 80 170.667V128l176 117.333L432 128v42.667z" />
                                </svg>
                                <a href="mailto:{{ $user->email }}" class="px-2 text-sm hover:underline">{{ $user->email }}</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- ====== Profile Section End -->
        </div>
    </div>
</main>

@endsection
