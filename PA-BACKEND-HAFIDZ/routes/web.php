<?php

use App\Livewire\ShowHome;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFGedungController;
use App\Http\Controllers\PDFKategoriController;
use App\Http\Controllers\PDFInventarisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', ShowHome::class)->name('home');

Route::get('downloadKategori', [PDFKategoriController::class, 'downloadpdfkategori'])->name('pdf.kategori');

Route::get('downloadInventaris', [PDFInventarisController::class, 'downloadpdfinventaris'])->name('pdf.inventaris');

Route::get('downloadGedung', [PDFGedungController::class, 'downloadpdfgedung'])->name('pdf.gedung');
