<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFInventarisController extends Controller
{
    public function downloadpdfinventaris()
    {
        $inventaris = Inventaris::all();

        $data = [
            'date' => date('m-d-Y'),
            'inventaris' => $inventaris
        ];

        $pdf = PDF::loadView('inventarisPDF', $data);

        return $pdf->download('Inventaris.pdf');
    }
}
