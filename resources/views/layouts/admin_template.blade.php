<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('style/admin-style.css?v=').time()}}">
    <title>Markishop Admin</title>
</head>
<body>
    @yield('content')
    <script src="{{ asset('script/removeSuccessMessage.js?v=').time() }}"></script>
</body>
</html>