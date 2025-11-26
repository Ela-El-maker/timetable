<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Timetable System') }}</title>
</head>
<body>
    <nav>
        <a href="{{ route('units.form') }}">Units</a>
        <a href="{{ route('admin.dashboard') }}">Admin</a>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
