<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SearchLog;
use Illuminate\Contracts\View\View;

class ReportsController extends Controller
{
    public function index(): View
    {
        $searches = SearchLog::latest()->get();

        return view('admin.reports.index', [
            'searches' => $searches,
            'usageCount' => $searches->count(),
        ]);
    }
}
