<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('images/logo/logo.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bangers&family=Dongle:wght@300;400;700&family=Inconsolata:wght@300;400&family=Inter&family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Lobster&family=Luxurious+Roman&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mouse+Memoirs&family=Neonderthaw&family=Nunito:wght@200;300&family=Open+Sans:wght@300&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,900;1,400;1,500;1,600;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
</head>

<body>
    <div class="h-screen mx-auto bg-gray-100">
        @yield('content')
    </div>
    <script defer src="{{ asset('js/sweetalert2.min.js') }}"></script>
</body>

</html>
