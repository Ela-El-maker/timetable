<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Contracts\View\View;

class UnitInputController extends Controller
{
    public function __invoke(): View
    {
        return view('user.units', [
            'suggestions' => Unit::orderBy('code')->pluck('code'),
        ]);
    }
}
