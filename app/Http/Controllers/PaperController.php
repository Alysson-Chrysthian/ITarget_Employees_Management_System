<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    
    public function generatePaperForAllEmployees()
    {
        $pdf = Pdf::loadView('pdfs.employees-paper', [
            'employees' => Employee::all(),
        ]);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOptions([
            'defaultFont' => 'sans-serif',
            'fontHeightRatio' => 0.8,

        ]);

        return $pdf->stream();
    }

}
