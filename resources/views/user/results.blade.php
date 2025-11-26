@extends('layouts.app')

@section('content')
    <h1>Your Exam Schedule</h1>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Unit</th>
                <th>Date</th>
                <th>Time</th>
                <th>Room</th>
                <th>Campus</th>
                <th>Conflict?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result['unit'] }}</td>
                    <td>{{ $result['date'] ?? 'TBD' }}</td>
                    <td>{{ $result['time'] ?? 'TBD' }}</td>
                    <td>{{ $result['room'] ?? 'TBD' }}</td>
                    <td>{{ $result['campus'] ?? 'TBD' }}</td>
                    <td>{{ ($result['conflict'] ?? false) ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
