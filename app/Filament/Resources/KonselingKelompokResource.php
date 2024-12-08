<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KonselingKelompokResource\Pages;
use App\Filament\Resources\KonselingKelompokResource\RelationManagers;
use App\Models\KonselingKelompok;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KonselingKelompokResource extends Resource
{
    protected static ?string $model = KonselingKelompok::class;

    public static function getPluralLabel(): string
    {
        return 'Konseling Kelompok'; 
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('guru_bk_id')
                ->relationship('guruBk', 'nama')
                ->options([
                    'Pak Yono' => 'Pak Yono',
                    'Bu Yuni' => 'Bu Yuni',
                ])
                ->required(),
                Forms\Components\TextInput::make('nama_kelompok')->required(),
                Forms\Components\TextInput::make('kelas')->required(),
                Forms\Components\Select::make('jurusan')
                ->options([
                    'RPL' => 'RPL',
                    'TKJ' => 'TKJ',
                    'MM' => 'MM',
                    'BC' => 'BC',
                ])
                ->required(),
                Forms\Components\KeyValue::make('anggota_kelompok')
                ->keyLabel('Nama')
                ->valueLabel('Keterangan')->required(),
            Forms\Components\DatePicker::make('tanggal')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('guruBk.nama')
                ->label('Guru BK')
                ->colors([
                    'success' => 'Pak Yono',
                    'primary' => 'Bu Yuni',
                ])
                ->sortable(),

                Tables\Columns\TextColumn::make('nama_kelompok')
                ->label('Nama Kelompok')
                ->searchable()
                ->sortable(),

                Tables\Columns\TextColumn::make('kelas')
                ->label('Kelas')
                ->searchable()
                ->sortable(),

                Tables\Columns\BadgeColumn::make('jurusan')
                ->label('Jurusan')
                ->colors([
                    'success' => 'RPL',
                    'primary' => 'TKJ',
                    'warning' => 'MM',
                    'danger' => 'BC',
                ])
                ->sortable(),

                Tables\Columns\TextColumn::make('anggota_kelompok')
                ->label('Anggota Kelompok'),

                Tables\Columns\TextColumn::make('tanggal')
                ->label('Tanggal')
                ->date('D-M-Y') // Format tanggal
                ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListKonselingKelompoks::route('/'),
            'create' => Pages\CreateKonselingKelompok::route('/create'),
            'edit' => Pages\EditKonselingKelompok::route('/{record}/edit'),
        ];
    }
}
