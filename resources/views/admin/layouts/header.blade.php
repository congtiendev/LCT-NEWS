 <header class="sticky top-0 flex w-full bg-white z-999 drop-shadow-1">
     <div class="flex items-center justify-between flex-grow px-4 py-4 shadow-2 md:px-6 2xl:px-11">
         <div class="flex items-center gap-2 sm:gap-4 lg:hidden">
             <!------------------------- Hamburger Toggle BTN---------------- -->
             <button class="z-99999 block border rounded-md border-stroke bg-white p-1.5 shadow-sm lg:hidden" @click.stop="sidebarToggle = !sidebarToggle">
                 <span class="relative block h-5.5 w-5.5 cursor-pointer">
                     <span class="absolute right-0 w-full h-full du-block">
                         <span class="relative top-0 left-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-[0] duration-200 ease-in-out" :class="{ '!w-full delay-300': !sidebarToggle }"></span>
                         <span class="relative top-0 left-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-150 duration-200 ease-in-out" :class="{ '!w-full delay-400': !sidebarToggle }"></span>
                         <span class="relative top-0 left-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-200 duration-200 ease-in-out" :class="{ '!w-full delay-500': !sidebarToggle }"></span>
                     </span>
                     <span class="absolute right-0 w-full h-full rotate-45 du-block">
                         <span class="absolute left-2.5 top-0 block h-full w-0.5 rounded-sm bg-black delay-300 duration-200 ease-in-out" :class="{ '!h-0 delay-[0]': !sidebarToggle }"></span>
                         <span class="delay-400 absolute left-0 top-2.5 block h-0.5 w-full rounded-sm bg-black duration-200 ease-in-out" :class="{ '!h-0 dealy-200': !sidebarToggle }"></span>
                     </span>
                 </span>
             </button>
             <!-- ------------------Logo------------------- -->
             <a class="flex-shrink-0 block lg:hidden" href="index.html">
                 <img class="h-10" src="{{ asset('images/logo/logo.png') }}" alt="Logo" />
             </a>
         </div>
         <div class="hidden sm:block">
             <!-- -------------------Search------------------- -->
             <form action="" method="POST">
                 <section class="relative">
                     <button class="absolute left-0 -translate-y-1/2 top-1/2">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:fill-primary">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                         </svg>
                     </button>
                     <input type="text" name="keyword" placeholder="Nhập nội dung..." class="w-full pr-4 bg-transparent pl-9 focus:outline-none" />
                 </section>
             </form>
         </div>

         <section class="flex items-center gap-3 2xsm:gap-7">
             <ul class="flex items-center gap-2 2xsm:gap-4">
                 <li>
                     <!--------------- Dark Mode Toggler---------------- -->
                     <label :class="darkMode ? 'bg-primary' : 'bg-stroke'" class="relative m-0 block h-7.5 w-14 rounded-full">
                         <input type="checkbox" :value="darkMode" @change="darkMode = !darkMode" class="absolute top-0 z-50 w-full h-full m-0 opacity-0 cursor-pointer" />
                         <span :class="darkMode && '!right-1 !translate-x-full'" class="absolute flex items-center justify-center w-6 h-6 duration-75 ease-linear translate-x-0 -translate-y-1/2 bg-white rounded-full top-1/2 left-1 shadow-switcher">
                             <span class="dark:hidden">
                                 <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M7.99992 12.6666C10.5772 12.6666 12.6666 10.5772 12.6666 7.99992C12.6666 5.42259 10.5772 3.33325 7.99992 3.33325C5.42259 3.33325 3.33325 5.42259 3.33325 7.99992C3.33325 10.5772 5.42259 12.6666 7.99992 12.6666Z" fill="#969AA1" />
                                     <path d="M8.00008 15.3067C7.63341 15.3067 7.33342 15.0334 7.33342 14.6667V14.6134C7.33342 14.2467 7.63341 13.9467 8.00008 13.9467C8.36675 13.9467 8.66675 14.2467 8.66675 14.6134C8.66675 14.9801 8.36675 15.3067 8.00008 15.3067ZM12.7601 13.4267C12.5867 13.4267 12.4201 13.3601 12.2867 13.2334L12.2001 13.1467C11.9401 12.8867 11.9401 12.4667 12.2001 12.2067C12.4601 11.9467 12.8801 11.9467 13.1401 12.2067L13.2267 12.2934C13.4867 12.5534 13.4867 12.9734 13.2267 13.2334C13.1001 13.3601 12.9334 13.4267 12.7601 13.4267ZM3.24008 13.4267C3.06675 13.4267 2.90008 13.3601 2.76675 13.2334C2.50675 12.9734 2.50675 12.5534 2.76675 12.2934L2.85342 12.2067C3.11342 11.9467 3.53341 11.9467 3.79341 12.2067C4.05341 12.4667 4.05341 12.8867 3.79341 13.1467L3.70675 13.2334C3.58008 13.3601 3.40675 13.4267 3.24008 13.4267ZM14.6667 8.66675H14.6134C14.2467 8.66675 13.9467 8.36675 13.9467 8.00008C13.9467 7.63341 14.2467 7.33342 14.6134 7.33342C14.9801 7.33342 15.3067 7.63341 15.3067 8.00008C15.3067 8.36675 15.0334 8.66675 14.6667 8.66675ZM1.38675 8.66675H1.33341C0.966748 8.66675 0.666748 8.36675 0.666748 8.00008C0.666748 7.63341 0.966748 7.33342 1.33341 7.33342C1.70008 7.33342 2.02675 7.63341 2.02675 8.00008C2.02675 8.36675 1.75341 8.66675 1.38675 8.66675ZM12.6734 3.99341C12.5001 3.99341 12.3334 3.92675 12.2001 3.80008C11.9401 3.54008 11.9401 3.12008 12.2001 2.86008L12.2867 2.77341C12.5467 2.51341 12.9667 2.51341 13.2267 2.77341C13.4867 3.03341 13.4867 3.45341 13.2267 3.71341L13.1401 3.80008C13.0134 3.92675 12.8467 3.99341 12.6734 3.99341ZM3.32675 3.99341C3.15341 3.99341 2.98675 3.92675 2.85342 3.80008L2.76675 3.70675C2.50675 3.44675 2.50675 3.02675 2.76675 2.76675C3.02675 2.50675 3.44675 2.50675 3.70675 2.76675L3.79341 2.85342C4.05341 3.11342 4.05341 3.53341 3.79341 3.79341C3.66675 3.92675 3.49341 3.99341 3.32675 3.99341ZM8.00008 2.02675C7.63341 2.02675 7.33342 1.75341 7.33342 1.38675V1.33341C7.33342 0.966748 7.63341 0.666748 8.00008 0.666748C8.36675 0.666748 8.66675 0.966748 8.66675 1.33341C8.66675 1.70008 8.36675 2.02675 8.00008 2.02675Z" fill="#969AA1" />
                                 </svg>
                             </span>
                             <span class="hidden">
                                 <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M14.3533 10.62C14.2466 10.44 13.9466 10.16 13.1999 10.2933C12.7866 10.3667 12.3666 10.4 11.9466 10.38C10.3933 10.3133 8.98659 9.6 8.00659 8.5C7.13993 7.53333 6.60659 6.27333 6.59993 4.91333C6.59993 4.15333 6.74659 3.42 7.04659 2.72666C7.33993 2.05333 7.13326 1.7 6.98659 1.55333C6.83326 1.4 6.47326 1.18666 5.76659 1.48C3.03993 2.62666 1.35326 5.36 1.55326 8.28666C1.75326 11.04 3.68659 13.3933 6.24659 14.28C6.85993 14.4933 7.50659 14.62 8.17326 14.6467C8.27993 14.6533 8.38659 14.66 8.49326 14.66C10.7266 14.66 12.8199 13.6067 14.1399 11.8133C14.5866 11.1933 14.4666 10.8 14.3533 10.62Z" fill="#969AA1" />
                                 </svg>
                             </span>
                         </span>
                     </label>
                     <!-- Dark Mode Toggler -->
                 </li>
                 <!----------------- Notification Menu Area--------------- -->
                 <li class="relative" x-data="{ dropdownOpen: false, notifying: true }">
                     <a class="relative flex h-8.5 w-8.5 items-center justify-center rounded-full border-[0.5px] border-stroke bg-gray hover:text-primary" href="#" @click.prevent="dropdownOpen = ! dropdownOpen; notifying = false">
                         <span :class="!notifying && 'hidden'" class="absolute -top-0.5 right-0 z-1 h-2 w-2 rounded-full bg-meta-1">
                             <span class="absolute inline-flex w-full h-full rounded-full opacity-75 -z-1 animate-ping bg-meta-1"></span>
                         </span>

                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 duration-300 ease-in-out">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                         </svg>
                     </a>

                     <!-- Dropdown notification -->
                     <section x-show="dropdownOpen" class="absolute rounded-lg -right-27 mt-2.5 flex h-fit max-h-64 w-75 flex-col border border-stroke bg-gray-50 shadow-default sm:right-0 sm:w-80">
                         <div class="px-4.5 py-3">
                             <h5 class="text-sm font-medium text-gray-900">
                                 Thông báo
                             </h5>
                         </div>
                         <!-- ------------------------------------List notification--------------------------------- -->
                         <ul class="flex flex-col overflow-y-auto max-h-72 hidden__scrollbar">
                             <li class="relative">
                                 <a class="flex items-center gap-2.5 border-t border-stroke px-4.5 py-3 hover:bg-gray-2" href="#">
                                     <img class="object-cover object-center w-10 h-10 rounded-full" src="" alt="" />
                                     <div class="notification__content">
                                         <h3 class="text-sm text-black">
                                             <span class="font-medium">Nguyễn Văn A</span> đã
                                             đăng bài viết mới
                                         </h3>
                                         <p class="text-xs text-gray-400">1 phút trước</p>
                                     </div>
                                 </a>
                                 <!-- ----------------options notification------------ -->
                                 <section class="absolute right-0 dropdown dropdown-left top-1 options__notification-btn">
                                     <label tabindex="0" class=""><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                             <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                         </svg></label>
                                     <ul tabindex="0" class="flex flex-col w-40 gap-2 px-3 py-2 text-xs font-medium text-gray-700 rounded-lg shadow dropdown-content bg-gray-50 whitespace-nowrap">
                                         <!-- --------------------dropdown options notification------------ -->
                                         <li class="flex items-center justify-between">
                                             <a>Đánh dấu là đã xem</a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                 <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                             </svg>
                                         </li>
                                         <!-- ---------------------------------------------------- -->
                                         <li class="flex items-center justify-between">
                                             <a>Gỡ thông báo này</a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                 <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                             </svg>
                                         </li>
                                     </ul>
                                 </section>
                                 <!-- -------------------------------------------------------- -->
                             </li>
                             <!-- ------------------------------------ -->
                         </ul>
                     </section>
                     <!-- Dropdown End -->
                 </li>

                 <!-- ------------------------------------------Message------------------------------------------ -->
                 <li class="relative" x-data="{ dropdownOpen: false, notifying: true }">
                     <a class="relative flex h-8.5 w-8.5 items-center justify-center rounded-full border-[0.5px] border-stroke bg-gray hover:text-primary" href="#" @click.prevent="dropdownOpen = ! dropdownOpen; notifying = false">
                         <span :class="!notifying && 'hidden'" class="absolute -top-0.5 -right-0.5 z-1 h-2 w-2 rounded-full bg-meta-1">
                             <span class="absolute inline-flex w-full h-full rounded-full opacity-75 -z-1 animate-ping bg-meta-1"></span>
                         </span>
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 duration-300 ease-in-out">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                         </svg>
                     </a>

                     <!-- ----------------------------Dropdown message------------- -->
                     <section x-show="dropdownOpen" class="absolute -right-16 mt-2.5 flex max-h-72 w-75 flex-col rounded-lg border border-stroke bg-white shadow-default sm:right-0 sm:w-80">
                         <div class="px-4.5 py-3">
                             <h5 class="text-sm font-medium text-gray-900">
                                 Tin nhắn
                             </h5>
                         </div>

                         <ul class="flex flex-col overflow-y-auto max-h-64 hidden__scrollbar">
                             <li class="relative">
                                 <a class="flex items-center gap-4.5 border-t border-stroke px-4.5 py-3 hover:bg-gray-2" href="messages.html">
                                     <div class="relative w-12 h-12 rounded-full">
                                         <img class="w-full h-full rounded-full avatar" src="" alt="User" />
                                         <span class="absolute bottom-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full status right-1"></span>
                                     </div>
                                     <div class="messages__content">
                                         <h6 class="text-sm font-medium text-black fullname">
                                             Lê Công Tiến
                                         </h6>
                                         <div class="flex items-center justify-between whitespace-nowrap">
                                             <p class="w-2/3 overflow-hidden text-xs font-light truncate">
                                                 Làm nháy không anh? :))
                                             </p>
                                             <span class="text-xs text-gray-400">2 phút trước</span>
                                         </div>
                                     </div>
                                 </a>
                                 <!-- ----------------options notification------------ -->
                                 <section class="absolute right-0 dropdown dropdown-left top-1 options__notification-btn">
                                     <label tabindex="0" class=""><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                             <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                         </svg></label>
                                     <ul tabindex="0" class="z-50 flex flex-col w-40 gap-2 px-3 py-2 text-xs font-medium text-gray-600 rounded-lg shadow dropdown-content bg-gray-50 whitespace-nowrap">
                                         <!-- --------------------dropdown options notification------------ -->
                                         <li class="flex items-center justify-between">
                                             <a>Đánh dấu là đã xem</a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                 <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                             </svg>
                                         </li>
                                         <!-- ---------------------------------------------------- -->
                                         <li class="flex items-center justify-between">
                                             <a>Gỡ đoạn chat này</a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                 <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                             </svg>
                                         </li>
                                         <!-- ---------------------------------------------------- -->
                                         <li class="flex items-center justify-between">
                                             <a>Báo cáo</a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                 <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                             </svg>
                                         </li>
                                     </ul>
                                 </section>
                                 <!-- -------------------------------------------------------- -->
                             </li>
                         </ul>
                     </section>
                 </li>
             </ul>

             <!-- ------------------------------User profile----------------------------- -->
             <section class="relative" x-data="{ dropdownOpen: false }">
                 <a class="flex items-center gap-4" href="#" @click.prevent="dropdownOpen = ! dropdownOpen">
                     <section class="hidden text-right lg:block">
                         <span class="block text-sm font-medium text-black fullname">
                             {{ Auth::user()->fullname }}
                         </span>
                         <span class="block text-xs font-medium username">
                             {{ Auth::user()->username }}
                         </span>
                     </section>

                     <div class="w-12 h-12 rounded-full avatar">
                         <img class="w-full h-full rounded-full avatar" src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : Storage::url('uploads/avatar/default.png') }}" alt="avatar" />

                     </div>

                     <svg :class="dropdownOpen && 'rotate-180'" class="hidden fill-current sm:block" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd" clip-rule="evenodd" d="M0.410765 0.910734C0.736202 0.585297 1.26384 0.585297 1.58928 0.910734L6.00002 5.32148L10.4108 0.910734C10.7362 0.585297 11.2638 0.585297 11.5893 0.910734C11.9147 1.23617 11.9147 1.76381 11.5893 2.08924L6.58928 7.08924C6.26384 7.41468 5.7362 7.41468 5.41077 7.08924L0.410765 2.08924C0.0853277 1.76381 0.0853277 1.23617 0.410765 0.910734Z" fill="" />
                     </svg>
                 </a>

                 <!-- ------------------------------Dropdown user profile------------------------ -->
                 <section x-show="dropdownOpen" class="absolute right-0 mt-4 flex whitespace-nowrap text=gray-900 flex-col rounded-lg border border-stroke bg-white shadow-default">
                     <ul class="flex flex-col gap-3 p-5 text-sm text-gray-700 border-b border-stroke">
                         <li>
                             <a href="{{ route('admin.user.profile',['id' =>Auth::user()->id]) }}" class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                     <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                 </svg>
                                 Trang cá nhân
                             </a>
                         </li>
                         <li>
                             <a href="{{ route('admin.user.account.update',['id' =>Auth::user()->id]) }}" class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                     <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
                                     <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                 </svg>
                                 Cài đặt tài khoản
                             </a>
                         </li>
                         <li>
                             <a href="{{ route('logout') }}" class="flex items-center gap-4 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">
                                 <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M15.5375 0.618744H11.6531C10.7594 0.618744 10.0031 1.37499 10.0031 2.26874V4.64062C10.0031 5.05312 10.3469 5.39687 10.7594 5.39687C11.1719 5.39687 11.55 5.05312 11.55 4.64062V2.23437C11.55 2.16562 11.5844 2.13124 11.6531 2.13124H15.5375C16.3625 2.13124 17.0156 2.78437 17.0156 3.60937V18.3562C17.0156 19.1812 16.3625 19.8344 15.5375 19.8344H11.6531C11.5844 19.8344 11.55 19.8 11.55 19.7312V17.3594C11.55 16.9469 11.2062 16.6031 10.7594 16.6031C10.3125 16.6031 10.0031 16.9469 10.0031 17.3594V19.7312C10.0031 20.625 10.7594 21.3812 11.6531 21.3812H15.5375C17.2219 21.3812 18.5625 20.0062 18.5625 18.3562V3.64374C18.5625 1.95937 17.1875 0.618744 15.5375 0.618744Z" fill="" />
                                     <path d="M6.05001 11.7563H12.2031C12.6156 11.7563 12.9594 11.4125 12.9594 11C12.9594 10.5875 12.6156 10.2438 12.2031 10.2438H6.08439L8.21564 8.07813C8.52501 7.76875 8.52501 7.2875 8.21564 6.97812C7.90626 6.66875 7.42501 6.66875 7.11564 6.97812L3.67814 10.4844C3.36876 10.7938 3.36876 11.275 3.67814 11.5844L7.11564 15.0906C7.25314 15.2281 7.45939 15.3312 7.66564 15.3312C7.87189 15.3312 8.04376 15.2625 8.21564 15.125C8.52501 14.8156 8.52501 14.3344 8.21564 14.025L6.05001 11.7563Z" fill="" />
                                 </svg>
                                 Đăng xuất
                             </a>
                         </li>
                     </ul>

                 </section>
                 <!-- Dropdown End -->
             </section>
             <!-- User Area -->
         </section>
     </div>
 </header>
