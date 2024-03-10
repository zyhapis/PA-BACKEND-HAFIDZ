<?php

namespace App\Filament\Resources\GedungResource\Pages;

use App\Filament\Resources\GedungResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;

class ListGedungs extends ListRecords
{
    protected static string $resource = GedungResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\PdfAction::make('Export Pdf')
                ->icon('fas-file-pdf')
                ->color('danger')
                ->url(fn () => route('pdf.gedung'))
                ->openUrlInNewTab(),

            ExportAction::make()
                ->label('Export Excel')
                ->color('success')
                ->icon('fas-file-excel')
                ->exports([
                    ExcelExport::make()->withColumns([
                        Column::make('id')->heading('No'),
                        Column::make('nama')->heading('Nama Gedung'),
                        Column::make('jumlah')->heading('Jumlah Gedung'),
                        Column::make('inventaris.nama_barang')->heading('Nama Barang'),
                        Column::make('kategori.nama')->heading('Kategori Barang'),
                    ]),
                ]),

            Actions\CreateAction::make()
                ->label('Buat Gedung')
                ->color('warning')
                ->icon('fas-plus'),
        ];
    }
}
