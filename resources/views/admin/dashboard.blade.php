@extends('layouts.app')

@section('content')
    <h1>Admin Dashboard</h1>
    <ul>
        <li>Total Users: {{ $totalUsers }}</li>
        <li>Total Searches: {{ $totalSearches }}</li>
        <li>Active Timetable: {{ $activeTimetable->semester ?? 'None' }}</li>
        <li>Conflicts Detected: {{ $conflictsDetected }}</li>
    </ul>
@endsection
