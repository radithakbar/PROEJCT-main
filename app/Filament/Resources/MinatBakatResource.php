<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MinatBakatResource\Pages;
use App\Filament\Resources\MinatBakatResource\RelationManagers;
use App\Models\MinatBakat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MinatBakatResource extends Resource
{
    protected static ?string $model = MinatBakat::class;

    public static function getPluralLabel(): string
    {
        return 'Minat Bakat'; 
    }
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              // Input untuk Nama
              Forms\Components\TextInput::make('nama')
              ->label('Nama')
              ->placeholder('Masukkan nama siswa')
              ->required(),

          // Input untuk Kelas
          Forms\Components\TextInput::make('kelas')
              ->label('Kelas')
              ->placeholder('Masukkan kelas siswa')
              ->required(),

          // Input untuk Minat
          Forms\Components\Textarea::make('minat')
              ->label('Minat')
              ->placeholder('Masukkan minat siswa')
              ->required(),

          // Input untuk Bakat
          Forms\Components\Textarea::make('bakat')
              ->label('Bakat')
              ->placeholder('Masukkan bakat siswa')
              ->required(),


          // Input untuk Deskripsi
          Forms\Components\Textarea::make('deskripsi')
              ->label('Deskripsi Minat dan Bakat')
              ->placeholder('Jelaskan tentang minat dan bakat siswa...')
              ->rows(4),
      ]);
    }

    public static function table(Table $table): Table
    {
        return $table
                ->columns([
                    // Kolom untuk Nama
                    Tables\Columns\TextColumn::make('nama')
                        ->label('Nama')
                        ->sortable()
                        ->searchable(),
    
                    // Kolom untuk Kelas
                    Tables\Columns\TextColumn::make('kelas')
                        ->label('Kelas')
                        ->sortable()
                        ->searchable(),

                    // Kolom untuk Minat
                      Tables\Columns\TextColumn::make('minat')
                      ->label('Minat')
                      ->sortable()
                      ->searchable(),

                    // Kolom untuk Bakat
                    Tables\Columns\TextColumn::make('bakat')
                    ->label('Bakat')
                    ->sortable()
                    ->searchable(),

                    // Kolom untuk Deskripsi
                    Tables\Columns\TextColumn::make('deskripsi')
                        ->label('Deskripsi')
                        ->limit(50)  // Membatasi jumlah karakter yang ditampilkan
                        ->sortable()
                        ->searchable(),
                ])
                ->filters([
                    // Filter berdasarkan Kelas
                    Tables\Filters\SelectFilter::make('kelas')
                        ->label('Kelas')
                        ->options([
                            'X' => 'Kelas X',
                            'XI' => 'Kelas XI',
                            'XII' => 'Kelas XII',
                        ])
                        ->default(null),
                ])
                ->actions([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListMinatBakats::route('/'),
            'create' => Pages\CreateMinatBakat::route('/create'),
            'edit' => Pages\EditMinatBakat::route('/{record}/edit'),
        ];
    }
}
