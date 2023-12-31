<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css" rel="stylesheet">
    @vite('resources/sass/app.scss')
    <title>{{@config('app_name')}}</title>
</head>
<body>
    @yield('content')
    @vite('resources/js/app.js')
</body>
</html>
