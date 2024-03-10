<?php

namespace App\Filament\Resources;

use Filament\Tables;
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
use App\Filament\Resources\InventarisResource\Pages;

class InventarisResource extends Resource
{
    protected static ?string $model = Inventaris::class;

    protected static ?string $navigationIcon = 'fas-boxes-stacked';

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
                            ->label('Kategori')
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
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('nama_barang')
                    ->label('Nama')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('kategori.nama')
                    ->label('Kategori')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('jumlah')
                    ->label('Jumlah')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault:true)
                    ->sortable(),

                TextColumn::make('harga')
                    ->label('Harga')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault:true)
                    ->sortable(),
                
                TextColumn::make('kondisi')
                    ->label('Kondisi')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault:true)
                    ->sortable(),
            ])

            ->filters([
                SelectFilter::make('kategori_id')
                ->options(Kategori::all()->pluck('nama', 'id'))
                ->searchable()
                ->label('Kategori')
                ->multiple(),
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
