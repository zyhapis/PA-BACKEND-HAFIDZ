<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFGedungController extends Controller
{
    public function downloadpdfgedung()
    {
        $gedung = Gedung::all();

        $data = [
            'date' => date('m-d-Y'),
            'gedung' => $gedung
        ];

        $pdf = PDF::loadView('gedungPDF', $data);

        return $pdf->download('Gedung.pdf');
    }
}
