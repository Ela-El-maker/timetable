<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SearchLog;
use App\Models\Timetable;
use App\Models\User;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalSearches' => SearchLog::count(),
            'activeTimetable' => Timetable::where('active', true)->first(),
            'conflictsDetected' => SearchLog::where('has_conflict', true)->count(),
        ]);
    }
}
