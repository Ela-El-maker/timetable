@extends('layouts.app')

@section('content')
    <h1>Enter Your Units</h1>
    <form action="{{ route('units.extract') }}" method="POST">
        @csrf
        <textarea name="units" rows="8" cols="40" placeholder="ACS 413 A\nPHY 217 A\nMAT 322A"></textarea>
        <button type="submit">Get Schedule</button>
    </form>
@endsection
