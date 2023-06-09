<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>   @yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="{{ asset('adminassets/./css/style.css') }}" rel="stylesheet">
    @yield('style')

</head>

<body class="h-100">
   @yield('content')

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('adminassets/./vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('adminassets/./js/quixnav-init.js') }}"></script>
    <!--endRemoveIf(production)-->
    @yield('scripts')
</body>

</html>
