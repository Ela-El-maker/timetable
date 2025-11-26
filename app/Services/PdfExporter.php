<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Collection;

class PdfExporter
{
    public function export(array $results): string
    {
        $pdf = Pdf::loadView('user.export.pdf', ['results' => new Collection($results)]);

        return $pdf->output();
    }
}
