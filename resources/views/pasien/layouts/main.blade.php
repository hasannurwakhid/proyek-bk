<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="flex">
        @include('pasien.layouts.sidebar')
        @yield('container')
    </div>
</body>

</html>
