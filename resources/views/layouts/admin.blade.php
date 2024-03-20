<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    @yield('title')
    <link rel="stylesheet" href="<?= asset('css/tailwind.css') ?>">
    <script src="https://kit.fontawesome.com/fc1ab6b05a.js" crossorigin="anonymous"></script>
    @yield('css')
</head>

<body class="font-sans">
    <div class="relative flex flex-row h-screen" style="overflow-y: hidden;">
        @yield('sidebar')
        <div class="flex-1">
            <div class="relative">
                @yield('topbar')
            </div>
            <div class="relative" style="overflow-y: scroll;">
                @yield('content')
            </div>
        </div>
        @yield('footer')
    </div>
    @yield('script')
</body>

</html>