<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KonselingIndividuResource\Pages;
use App\Filament\Resources\KonselingIndividuResource\RelationManagers;
use App\Models\KonselingIndividu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KonselingIndividuResource extends Resource
{
    protected static ?string $model = KonselingIndividu::class;

    public static function getPluralLabel(): string
    {
        return 'Konseling Individu'; 
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\Grid::make(2) // Membagi menjadi dua kolom
                        ->schema([
                            Forms\Components\Select::make('guru_bk_id')
                                ->relationship('guruBk', 'nama')
                                ->label('Guru BK')
                                ->options([
                                    'Pak Yono' => 'Pak Yono',
                                    'Bu Yuni' => 'Bu Yuni',
                                ])
                                ->placeholder('Pilih Guru BK')
                                ->required(),
    
                            Forms\Components\TextInput::make('nama_siswa')
                                ->label('Nama Siswa')
                                ->placeholder('Masukkan Nama Siswa')
                                ->required(),
                        ]),
    
                    Forms\Components\Grid::make(3) // Membagi menjadi tiga kolom
                        ->schema([
                            Forms\Components\TextInput::make('kelas')
                                ->label('Kelas')
                                ->placeholder('Masukkan Kelas')
                                ->required(),
    
                            Forms\Components\Select::make('jurusan')
                                ->label('Jurusan')
                                ->options([
                                    'RPL' => 'RPL',
                                    'TKJ' => 'TKJ',
                                    'MM' => 'MM',
                                    'BC' => 'BC',
                                ])
                                ->placeholder('Pilih Jurusan')
                                ->required(),
    
                            Forms\Components\DatePicker::make('tanggal')
                                ->label('Tanggal Konseling')
                                ->required(),
                        ]),
                ])->columnSpan(2), // Menyusun dalam satu card besar
    
                Forms\Components\Card::make([
                    Forms\Components\Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->placeholder('Tulis deskripsi konseling...')
                        ->rows(4),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SelectColumn::make('guruBk.nama')
                ->label('Guru BK')
                ->options([
                    'Pak Yono' => 'Pak Yono',
                    'Bu Yuni' => 'Bu Yuni',
                ])
                ->sortable()
                ->searchable(),

            // Kolom untuk Nama Siswa
            Tables\Columns\TextColumn::make('nama_siswa')
                ->label('Nama Siswa')
                ->sortable()
                ->searchable(),

            // Kolom untuk Kelas
            Tables\Columns\TextColumn::make('kelas')
                ->label('Kelas')
                ->sortable()
                ->searchable(),

            // Kolom untuk Jurusan
            Tables\Columns\SelectColumn::make('jurusan')
                ->label('Jurusan')
                ->options([
                    'RPL' => 'RPL',
                    'TKJ' => 'TKJ',
                    'MM' => 'MM',
                    'BC' => 'BC',
                ])
                ->sortable()
                ->searchable(),

            // Kolom untuk Tanggal Konseling
            Tables\Columns\TextColumn::make('tanggal')
            ->label('Tanggal')
            ->date('D-M-Y') // Format tanggal
            ->sortable(), // Menampilkan tanggal dalam format dd-mm-yyyy

            // Kolom untuk Deskripsi (menggunakan TextareaColumn)
            Tables\Columns\TextColumn::make('deskripsi')
                ->label('Deskripsi')
                ->searchable()
                ->limit(50)  // Menampilkan hanya 50 karakter pertama
                ->sortable(),

            // Kolom untuk Status Urgent (menggunakan Badge)
            
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListKonselingIndividus::route('/'),
            'create' => Pages\CreateKonselingIndividu::route('/create'),
            'edit' => Pages\EditKonselingIndividu::route('/{record}/edit'),
        ];
    }
}
