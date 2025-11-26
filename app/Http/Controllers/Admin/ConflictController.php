<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SearchLog;
use Illuminate\Contracts\View\View;

class ConflictController extends Controller
{
    public function index(): View
    {
        return view('admin.conflicts.index', [
            'conflicts' => SearchLog::where('has_conflict', true)->latest()->get(),
        ]);
    }
}
