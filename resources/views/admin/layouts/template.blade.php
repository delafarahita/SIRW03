<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-6pzKh/12G/XBvkQfAbAoxSi6oGtmUsLM6Erc/HybXbpY05+gVZTmekz/G06ymLi" crossorigin="anonymous">
    <title>Admin Page</title>
</head>

<body>

    @include('admin.layouts.sidebar')

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6LwpTUzaNwGYeVjWQ7a/sWp8jZqw1v4+a2rk3Ym2xW3KtM2J+Q+27v6Ww95GJ85Czr29U" crossorigin="anonymous">
    </script>
</body>

</html>
