<?php

namespace App\Services;

use Illuminate\Support\Collection;

class ConflictChecker
{
    public function markConflicts(array $results): array
    {
        $collection = collect($results);
        $conflictedTimes = $this->identifyConflicts($collection);

        return $collection
            ->map(function ($item) use ($conflictedTimes) {
                $key = $item['date'].$item['time'];
                $item['conflict'] = $conflictedTimes->contains($key);

                return $item;
            })
            ->all();
    }

    private function identifyConflicts(Collection $collection): Collection
    {
        return $collection
            ->groupBy(fn ($item) => $item['date'].$item['time'])
            ->filter(fn ($group) => $group->count() > 1)
            ->keys();
    }
}
