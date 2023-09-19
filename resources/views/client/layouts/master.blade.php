<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <title>{{ $title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Real Estate Website Landing Page" name="description" />
    <meta content="Real Estate, buy, sell, Rent, tailwind Css" name="keywords" />
    <meta name="author" content="Congtiendev" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    @include('client.layouts.style')
</head>

<body class="dark:bg-slate-900">

    @include('client.layouts.header')
    @yield('content')
    @include('client.layouts.footer')
    @include('client.layouts.component')

    <!-- JAVASCRIPTS -->
    @include('client.layouts.script')
    <!-- JAVASCRIPTS -->
</body>
</html>
