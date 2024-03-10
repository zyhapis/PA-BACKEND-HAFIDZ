<?php

namespace App\Filament\Resources\InventarisResource\Pages;

use App\Filament\Resources\InventarisResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;

class ListInventaris extends ListRecords
{
    protected static string $resource = InventarisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\PdfAction::make('Export Pdf')
                ->icon('fas-file-pdf')
                ->color('danger')
                ->url(fn () => route('pdf.inventaris'))
                ->openUrlInNewTab(),

            ExportAction::make()
                ->label('Export Excel')
                ->color('success')
                ->icon('fas-file-excel')
                ->exports([
                    ExcelExport::make()->withColumns([
                        Column::make('id')->heading('No'),
                        Column::make('nama_barang')->heading('Nama Barang'),
                        Column::make('kategori.nama')->heading('Kategori Barang'),
                        Column::make('jumlah')->heading('Jumlah Barang'),
                        Column::make('harga')->heading('Harga Barang'),
                        Column::make('kondisi')->heading('Kondisi Barang'),
                    ]),
                ]),


            Actions\CreateAction::make()
                ->label('Buat Inventaris')
                ->color('warning')
                ->icon('fas-plus'),
        ];
    }
}
