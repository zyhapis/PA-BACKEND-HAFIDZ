<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFKategoriController extends Controller
{
    public function downloadpdfkategori()
    {
        $kategori = Kategori::all();

        $data = [
            'date' => date('m-d-Y'),
            'kategori' => $kategori
        ];

        $pdf = PDF::loadView('kategoriPDF', $data);

        return $pdf->download('Kategori.pdf');
    }
}
