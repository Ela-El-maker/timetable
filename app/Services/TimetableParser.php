<?php

namespace App\Services;

use App\Models\Timetable;

class TimetableParser
{
    public function extractForUnits(array $units): array
    {
        // Placeholder implementation; the actual parser will process the active timetable file.
        $activeTimetable = Timetable::where('active', true)->first();

        return collect($units)->map(fn ($unit) => [
            'unit' => $unit,
            'date' => null,
            'time' => null,
            'room' => null,
            'campus' => $activeTimetable?->semester,
            'conflict' => false,
        ])->all();
    }
}
