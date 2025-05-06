<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('style/main-style.css?v=').time()}}">
    <title>Markishop</title>
</head>
<body>
    @yield('content')
    <footer>
        <p>&copy; 2024 Markishop</p>
        <address>
          <p>123 Market St</p>
          <p>San Francisco, CA 94111</p>
        </address>
    </footer>
</body>
</html>