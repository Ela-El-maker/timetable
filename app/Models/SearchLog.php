<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SearchLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'units',
        'results',
        'has_conflict',
    ];

    protected $casts = [
        'units' => 'array',
        'results' => 'array',
        'has_conflict' => 'bool',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
