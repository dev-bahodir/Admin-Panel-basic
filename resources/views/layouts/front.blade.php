<!DOCTYPE html>
<html>
<head>
    <title>My Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">MySite</a>

        <ul class="navbar-nav">

            @foreach($menus as $menu)
                @include('front.partials.menu_item', ['menu' => $menu])
            @endforeach

        </ul>

    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
