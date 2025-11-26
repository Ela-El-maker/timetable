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

        <div style="float: right;">
            @auth
                <span>{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
