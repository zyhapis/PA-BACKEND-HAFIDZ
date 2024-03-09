<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Inventaris;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\InventarisResource\Pages;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class InventarisResource extends Resource
{
    protected static ?string $model = Inventaris::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Inventaris';

    protected static ?string $navigationGroup = 'Inventaris Barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_barang')
                    ->label('Nama Barang')
                    ->placeholder('Masukkan Nama Barang')
                    ->rules(['max:50', 'string'])
                    ->required(),
                Select::make('kategori_id')
                    ->label('Kategori')
                    ->required()
                    ->relationship('kategori', 'nama')
                    ->createOptionForm([
                        TextInput::make('nama')
                            ->required()
                    ]),

                TextInput::make('jumlah')
                    ->label('Jumlah Barang')
                    ->placeholder('Masukkan Jumlah Barang')
                    ->rules(['integer'])
                    ->required(),
                TextInput::make('harga')
                    ->label('Harga Barang')
                    ->placeholder('Masukkan Harga Barang')
                    ->required(),
                TextInput::make('kondisi')
                    ->label('Kondisi Barang')
                    ->placeholder('Masukkan Kondisi Barang')
                    ->rules(['max:20', 'string'])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('No')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nama_barang')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kategori.nama')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),
            ])

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInventaris::route('/'),
            'create' => Pages\CreateInventaris::route('/create'),
            'edit' => Pages\EditInventaris::route('/{record}/edit'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('nama_barang')
                    ->label('Nama Barang'),
                Infolists\Components\TextEntry::make('kategori.nama')
                    ->label('Kategori Barang'),
                Infolists\Components\TextEntry::make('jumlah')
                    ->label('Jumlah Barang'),
                Infolists\Components\TextEntry::make('harga')
                    ->label('Harga Barang'),
                Infolists\Components\TextEntry::make('kondisi')
                    ->label('Kondisi Barang'),
            ]);
    }
}
