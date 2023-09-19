<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>"HTTP 401 Unauthorized</title>
    <link rel="icon" href="{{ asset('images/logo/logo.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bangers&family=Dongle:wght@300;400;700&family=Inconsolata:wght@300;400&family=Inter&family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Lobster&family=Luxurious+Roman&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mouse+Memoirs&family=Neonderthaw&family=Nunito:wght@200;300&family=Open+Sans:wght@300&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,900;1,400;1,500;1,600;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}" />

</head>

<body>
    <div class="w-full h-screen flex flex-col items-center justify-center font-jetbrains-mono">
        <div class="flex flex-col items-center justify-center relative">
            <img src="{{ asset('images//flying-bees.gif')}}" alt="bee" class="w-96 top-0 object-cover absolute">
            <img src="{{ asset('images/background/login.png') }}" alt="unauthorized" class="w-96">
            <p class="text-xl sm:text-3xl md:text-4xl  dark:text-white  my-5 text-center">Không có quyền truy cập</p>
            <p class="md:text-lg lg:text-xl sm:text-base text-sm dark:text-white text-center ">
                Vui lòng sử dụng tài khoản có quyền truy cập để tiếp tục !
            </p>
            <a href="{{ route('back') }}" class="flex items-center space-x-2 bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 mt-12 rounded transition duration-150" title="Return Home">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                </svg>
                <span>Quay lại</span>
            </a>
        </div>
    </div>
</body>

</html>
