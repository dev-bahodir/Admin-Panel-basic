<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
<div class="container">
    <h2 class="mb-4">Admin Panel</h2>

    <nav class="mb-4">
        <a href="{{ route('admin.dashboard') }}" class="me-3">Dashboard</a>
        <a href="{{ route('admin.menu.index') }}" class="me-3">Menus</a>
        <a href="{{ route('admin.news.index') }}">News</a>
    </nav>

    @yield('content')
</div>
</body>
</html>
