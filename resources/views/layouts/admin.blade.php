<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= asset('css/tailwind.css') ?>">
    @yield('tiny-mde')
</head>

<body class="font-sans">

    @yield('sidebar')

    @yield('navbar')

    <div class="sm:ml-64">
        
        @yield('topbar')

        <div class="p-3">
            @yield('content')
        </div>

    </div>
    @yield('footer')
    <script></script>
</body>

</html>