<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | {{ config('app.name', 'Timetable System') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/admin-dashboard.js'])
</head>

<body class="antialiased">
    <div id="admin-dashboard"
        data-total-users="{{ $totalUsers }}"
        data-total-searches="{{ $totalSearches }}"
        data-active-timetable="{{ $activeTimetable->semester ?? '' }}"
        data-conflicts-detected="{{ $conflictsDetected }}">
    </div>
</body>

</html>
