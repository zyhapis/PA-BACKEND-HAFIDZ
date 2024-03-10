<?php

namespace App\Filament\Resources\KategoriResource\Pages;

use App\Filament\Resources\KategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;

class ListKategoris extends ListRecords
{
    protected static string $resource = KategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\PdfAction::make('Export Pdf')
                ->icon('fas-file-pdf')
                ->color('danger')
                ->url(fn () => route('pdf.kategori'))
                ->openUrlInNewTab(),

            ExportAction::make()
                ->label('Export Excel')
                ->color('success')
                ->icon('fas-file-excel')
                ->exports([
                    ExcelExport::make()->withColumns([
                        Column::make('id')->heading('No'),
                        Column::make('nama')->heading('Nama Barang'),
                    ]),
                ]),

            Actions\CreateAction::make()
                ->label('Buat Kategori')
                ->color('warning')
                ->icon('fas-plus'),
        ];
    }
}
