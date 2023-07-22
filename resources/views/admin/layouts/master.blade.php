<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('images/logo/logo.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bangers&family=Dongle:wght@300;400;700&family=Inconsolata:wght@300;400&family=Inter&family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Lobster&family=Luxurious+Roman&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mouse+Memoirs&family=Neonderthaw&family=Nunito:wght@200;300&family=Open+Sans:wght@300&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,900;1,400;1,500;1,600;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}" />
    <script src="https://cdn.tiny.cloud/1/nfspfiqg68gvchcx3d0u31hnatu1j7z64qtj0e7c8kqh6gs7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body x-data="{ page: 'signin', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="
          darkMode = JSON.parse(localStorage.getItem('darkMode'));
          $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">

    <div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => {setTimeout(() => loaded = false, 500)})" class="glassmorphism__dark fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center">
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent"></div>
    </div>

    <div class="flex h-screen overflow-hidden font-sunbee">
        <!-- --------------------------Sidebar--------------------------- -->
        @include('admin.layouts.sidebar')
        <!-- -------------------------------------Content------------------------------- -->
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            <!-- ---------------------------------Header------------------------------- -->
            @include('admin.layouts.header')
            <!-- ---------------------------------Main------------------------------- -->
            @yield('content')
        </div>
    </div>
    <script defer src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/upload_file/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/upload_file/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('js/upload_file/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script defer src="{{ asset('js/bundle.js') }}"></script>
    <script defer src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script defer src="{{ asset('js/swiper.min.js') }}"></script>
    <script defer src="{{ asset('js/admin.js') }}"></script>
    <script defer src="{{ asset('js/app.js') }}"></script>
</body>

</html>
