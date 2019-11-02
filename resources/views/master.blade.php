<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'Project ArqHub'}}</title>
    <link rel="stylesheet" href="/css/app.css">
    @stack('style')
</head>
<style>
    html, body {
        min-height: 100vh;
        padding-bottom: 80px;
    }
</style>
<body>
    @yield('content')

    <script src="/js/app.js"></script>
    @stack('script')
</body>
</html>
