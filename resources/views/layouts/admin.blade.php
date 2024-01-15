<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= asset('css/tailwind.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/flowbite.css') ?>">

    @yield('tiny-mde')
</head>

<body class="font-sans">

    @yield('sidebar')

    @yield('navbar')

    <div class="p-4 sm:ml-64">
        
        @yield('topbar')

        @yield('content')

    </div>

    @yield('footer')

</body>

</html>