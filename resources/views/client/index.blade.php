   @extends('client.layouts.master')
   @section('content')
   <!-- Start Hero -->
   <div class="swiper bannerSwiper">
       <div class="swiper-wrapper">
           @foreach ($banners as $banner)
           <section style="background-image: url('{{ Storage::url($banner->image )}}')" class="relative table w-full py-32 bg-center bg-no-repeat bg-cover swiper-slide lg:py-36">

               <div class="absolute inset-0 bg-black opacity-80"></div>
               <div class="container">
                   <div class="grid grid-cols-1 mt-10 text-center">
                       <a href="{{ $banner->link }}" class="text-3xl font-medium leading-normal text-white md:text-4xl md:leading-normal">
                           {{ $banner->slogan }}
                       </a>
                   </div>
                   <!--end grid-->
               </div>
               <!--end container-->
           </section>
           <!--end section-->
           @endforeach
       </div>
   </div>
   <div class="relative">
       <div class="overflow-hidden text-white shape z-1 dark:text-slate-900">
           <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
           </svg>
       </div>
   </div>
   <!-- End Hero -->


   <!-- Start -->
   <section class="relative pb-16 md:pb-24">

       <div class="container mt-16 lg:mt-24">
           <div class="grid grid-cols-1 pb-8 text-center">
               <h3 class="mb-4 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">
                   Tin tức & Sự kiện
               </h3>

               <p class="max-w-xl mx-auto text-slate-400">
                   Cung cấp thông tin mới nhất về thị trường bất động sản, các dự án mới, các chính sách mới nhất của chính phủ về bất động sản.
               </p>
           </div>
           <!--end grid-->

           <!--start content-->

           <!------------------list post----------------->
           <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">
               @foreach($posts as $post)
               <!--start content-->
               <div class="group relative h-fit hover:-mt-[5px] overflow-hidden bg-white dark:bg-slate-900 rounded-xl shadow dark:shadow-gray-700 transition-all duration-500">
                   <div class="relative overflow-hidden">
                       <img src="{{ Storage::url($post->thumbnail)}}" class="" alt="">
                       <div class="absolute end-4 top-4">
                           <span class="bg-green-600 text-white text-[14px] px-2.5 py-1 font-medium rounded-full h-5">
                               {{ $post->category_name }}
                           </span>
                       </div>
                   </div>

                   <div class="relative p-6">
                       <div class="">
                           <div class="flex justify-between mb-4">
                               <span class="text-sm text-slate-400"><i class="uil uil-calendar-alt text-slate-900 dark:text-white me-2"></i>{{ date('h:i d/m/Y', strtotime($post->post_date)) }}</span>
                               <span class="text-sm text-slate-400 ms-3"><i class="uil uil-clock text-slate-900 dark:text-white me-2"></i>{{ date('h:i', strtotime($post->post_date)) }}</span>
                           </div>

                           <a href="{{ route('post.detail',['slug'=>$post->slug]) }}" class="text-xl font-medium duration-500 ease-in-out title hover:underline hover:text-green-600">{{ $post->title }}</a>

                           <div class="mt-3">
                               <a href="{{ route('post.detail',['slug'=>$post->slug]) }}" class="duration-500 ease-in-out btn btn-link hover:text-green-600 after:bg-green-600">Xem thêm <i class="uil uil-arrow-right"></i></a>
                           </div>
                       </div>
                   </div>
               </div>
               <!--end content-->
               @endforeach
           </div>
           <!--end grid-->

       </div>

       <div class="container mt-16 lg:mt-24">
           <div class="grid grid-cols-1 pb-8 text-center">
               <h3 class="mb-4 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">
                   Dự án nổi bật
               </h3>

               <p class="max-w-xl mx-auto text-slate-400">
                   Chúng tôi tự hào là đơn vị tiên phong trong lĩnh vực phân phối các dự án bất động sản tại Việt Nam.
               </p>
           </div>
           <!--end grid-->

           <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
               <!--property content-->
               <div class="overflow-hidden duration-500 ease-in-out bg-white shadow group rounded-xl dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700">
                   <div class="relative">
                       <img src="images/property/1.jpg" alt="">

                       <div class="absolute top-4 end-4">
                           <a href="javascript:void(0)" class="bg-white rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-700 text-slate-100 dark:text-slate-700 focus:text-red-600 dark:focus:text-red-600 hover:text-red-600 dark:hover:text-red-600"><i class="mdi mdi-heart mdi-18px"></i></a>
                       </div>
                   </div>

                   <div class="p-6">
                       <div class="pb-6">
                           <a href="property-detail.html" class="text-lg font-medium duration-500 ease-in-out hover:text-green-600">10765
                               Hillshire Ave, Baton Rouge, LA 70810, USA</a>
                       </div>

                       <ul class="flex items-center py-6 list-none border-y border-slate-100 dark:border-gray-800">
                           <li class="flex items-center me-4">
                               <i class="text-2xl text-green-600 uil uil-compress-arrows me-2"></i>
                               <span>8000sqf</span>
                           </li>

                           <li class="flex items-center me-4">
                               <i class="text-2xl text-green-600 uil uil-bed-double me-2"></i>
                               <span>4 Beds</span>
                           </li>

                           <li class="flex items-center">
                               <i class="text-2xl text-green-600 uil uil-bath me-2"></i>
                               <span>4 Baths</span>
                           </li>
                       </ul>

                       <ul class="flex items-center justify-between pt-6 list-none">
                           <li>
                               <span class="text-slate-400">Price</span>
                               <p class="text-lg font-medium">$5000</p>
                           </li>

                           <li>
                               <span class="text-slate-400">Rating</span>
                               <ul class="text-lg font-medium list-none text-amber-400">
                                   <li class="inline"><i class="mdi mdi-star"></i></li>
                                   <li class="inline"><i class="mdi mdi-star"></i></li>
                                   <li class="inline"><i class="mdi mdi-star"></i></li>
                                   <li class="inline"><i class="mdi mdi-star"></i></li>
                                   <li class="inline"><i class="mdi mdi-star"></i></li>
                                   <li class="inline text-black dark:text-white">5.0(30)</li>
                               </ul>
                           </li>
                       </ul>
                   </div>
               </div>
               <!--end property content-->
           </div>
           <!--end grid-->
       </div>
       <!--end container-->

       <div class="container mt-16 lg:mt-24">
           <div class="grid grid-cols-1 pb-8 text-center">
               <h3 class="mb-4 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">Khách hàng của chúng tôi nói gì ?</h3>

               <p class="max-w-xl mx-auto text-slate-400">LCT-NEWS là trang web bất động sản hàng đầu tại Việt Nam - Nơi tốt nhất dành cho những người đang tìm kiếm bất động sản để ở hoặc đầu tư. Chúng tôi cung cấp dữ liệu tin rao lớn với đa dạng loại hình bất động sản giúp bạn có những lựa chọn phù hợp với nhu cầu của mình.</p>

           </div>
           <!--end grid-->

           <!-----------------------list review-------------------------->
           <div class="relative flex justify-center mt-16">
               <div class="relative w-full lg:w-1/3 md:w-1/2">
                   <div class="absolute -top-20 md:-start-24 -start-0">
                       <i class="mdi mdi-format-quote-open text-9xl opacity-5"></i>
                   </div>

                   <div class="absolute bottom-28 md:-end-24 -end-0">
                       <i class="mdi mdi-format-quote-close text-9xl opacity-5"></i>
                   </div>

                   <div class="tiny-single-item">
                       <!----------------------- review content-------------------------->

                       <div class="swiper bannerSwiper">
                           <div class="swiper-wrapper">
                               @foreach ($comments as $comment)
                               <div class="tiny-slide swiper-slide">
                                   <div class="text-center">
                                       <p class="text-xl italic text-slate-400"> "
                                           {{$comment->content}}"
                                       </p>

                                       <div class="mt-5 text-center">
                                           <ul class="mb-2 text-xl font-medium list-none text-amber-400">
                                               <li class="inline"><i class="mdi mdi-star"></i></li>
                                               <li class="inline"><i class="mdi mdi-star"></i></li>
                                               <li class="inline"><i class="mdi mdi-star"></i></li>
                                               <li class="inline"><i class="mdi mdi-star"></i></li>
                                               <li class="inline"><i class="mdi mdi-star"></i></li>
                                           </ul>

                                           <img src="{{ $comment->user_avatar ? Storage::url($comment->user_avatar) : Storage::url('uploads/avatar/default.png') }}" class="mx-auto rounded-full shadow-md h-14 w-14 dark:shadow-gray-700" alt="">

                                           <h6 class="mt-2 fw-semibold">{{ $comment->user_name }}</h6>
                                       </div>
                                   </div>
                               </div>
                               <!-----------------------end review content-------------------------->
                               @endforeach
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-----------------------end list reviews----------------------->
       </div>
       <!--end container-->

       <div class="container mt-16 lg:mt-24">
           <div class="grid grid-cols-1 text-center">
               <h3 class="mb-6 text-2xl font-medium leading-normal text-black md:text-3xl md:leading-normal dark:text-white">
                   Liên hệ với chúng tôi</h3>
               <div class="mt-6">
                   <a href="contact.html" class="text-white bg-green-600 rounded-md btn hover:bg-green-700"><i class="align-middle uil uil-phone me-2"></i>Liên hệ ngay</a>
               </div>
           </div>
           <!--end grid-->
       </div>
       <!--end container-->
   </section>
   <!--end section-->

   @endsection
