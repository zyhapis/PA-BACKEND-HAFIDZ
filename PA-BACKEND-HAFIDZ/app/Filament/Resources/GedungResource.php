<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Gedung;
use Filament\Infolists;
use App\Models\Kategori;
use Filament\Forms\Form;
use App\Models\Inventaris;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\GedungResource\Pages;

class GedungResource extends Resource
{
    protected static ?string $model = Gedung::class;

    protected static ?string $navigationIcon = 'fas-building-flag';

    protected static ?string $navigationGroup = 'Inventaris Barang';

    protected static ?string $navigationLabel = 'Gedung';

    public static function form(Form $form): Form
    {
        // Retrieve unique kategori_ids from the inventaris table
        $kategoriIds = Inventaris::pluck('kategori_id')->unique();

        // Retrieve category names from the kategoris table based on unique kategori_ids
        $kategoriOptions = Kategori::whereIn('id', $kategoriIds)->pluck('nama', 'id')->toArray();

        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Nama Gedung')
                    ->rules(['max:45', 'string'])
                    ->required(),

                TextInput::make('jumlah')
                    ->label('Jumlah Barang')
                    ->rules(['max:45', 'string'])
                    ->required(),

                Select::make('inventaris_id')
                    ->label('Nama Barang')
                    ->relationship('inventaris', 'nama_barang')
                    ->required()
                    ->searchable()
                    ->preload(),

                Select::make('inventaris_kategori_id')
                    ->label('Kategori Barang')
                    ->options($kategoriOptions)
                    ->required()
                    ->searchable()
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('No')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('nama')
                    ->label('Nama Gedung')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('inventaris.nama_barang')
                    ->label('Nama Barang')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jumlah')
                    ->label('Jumlah Barang')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('inventaris.kategori.nama')
                    ->label('Kategori Barang')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault:true)
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('inventaris_kategori_id')
                ->options(Kategori::all()->pluck('nama', 'id'))
                ->searchable()
                ->label('Kategori')
                ->multiple(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListGedungs::route('/'),
            'create' => Pages\CreateGedung::route('/create'),
            'edit' => Pages\EditGedung::route('/{record}/edit'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('nama')
                    ->label('Nama Gedung'),
                Infolists\Components\TextEntry::make('jumlah')
                    ->label('Jumlah Barang'),
                Infolists\Components\TextEntry::make('inventaris.nama_barang')
                    ->label('Nama Barang'),
                Infolists\Components\TextEntry::make('kategori.nama')
                    ->label('Kategori Barang')
            ]);
    }
}
