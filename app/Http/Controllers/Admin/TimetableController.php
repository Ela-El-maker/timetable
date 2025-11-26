<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timetable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TimetableController extends Controller
{
    public function index(): View
    {
        return view('admin.timetables.index', [
            'timetables' => Timetable::latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'file' => ['required', 'file'],
            'semester' => ['nullable', 'string', 'max:255'],
        ]);

        $path = $data['file']->store('timetables');

        Timetable::create([
            'file_path' => $path,
            'semester' => $data['semester'] ?? null,
            'active' => ! Timetable::exists(),
            'uploaded_by' => $request->user()?->id,
        ]);

        return back()->with('status', 'Timetable uploaded successfully.');
    }

    public function activate(Timetable $timetable): RedirectResponse
    {
        Timetable::query()->update(['active' => false]);
        $timetable->update(['active' => true]);

        return back()->with('status', 'Timetable activated.');
    }

    public function destroy(Timetable $timetable): RedirectResponse
    {
        Storage::delete($timetable->file_path);
        $timetable->delete();

        return back()->with('status', 'Timetable deleted.');
    }
}
