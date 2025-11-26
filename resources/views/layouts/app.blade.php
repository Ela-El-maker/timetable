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
            @auth('admin')
                <span>{{ auth('admin')->user()->name }} (Admin)</span>
                <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @elseif(auth()->check())
                <span>{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">User Login</a>
                <a href="{{ route('admin.login') }}">Admin Login</a>
            @endauth
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
