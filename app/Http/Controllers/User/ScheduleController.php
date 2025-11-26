<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SearchLog;
use App\Services\ConflictChecker;
use App\Services\TimetableParser;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function store(Request $request, TimetableParser $parser, ConflictChecker $conflictChecker): View
    {
        $data = $request->validate([
            'units' => ['required', 'string'],
        ]);

        $units = collect(preg_split('/\r\n|\r|\n/', $data['units']))
            ->filter()
            ->values();

        $results = $parser->extractForUnits($units->all());
        $results = $conflictChecker->markConflicts($results);

        SearchLog::create([
            'user_id' => $request->user()?->id,
            'units' => $units->values()->all(),
            'results' => $results,
            'has_conflict' => collect($results)->contains(fn ($item) => $item['conflict'] ?? false),
        ]);

        return view('user.results', [
            'results' => $results,
        ]);
    }
}
