<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    @yield('title')
    <link rel="stylesheet" href="<?= asset('css/tailwind.css') ?>">
    @yield('css')
</head>

<body class="font-sans">
    @yield('sidebar')
    <div class="sm:ml-64">
        @yield('topbar')
        <div class="p-3">
            @yield('content')
        </div>
    </div>
    @yield('footer')
    @yield('script')
</body>

</html>