<?php

namespace App\Filament\Resources;

use App\Models\Siswa;
use App\models\industri;
use App\Models\Guru;
use App\Filament\Resources\PklResource\Pages;
use App\Filament\Resources\PklResource\RelationManagers;
use App\Models\Pkl;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PklResource extends Resource
{
    protected static ?string $model = Pkl::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //siswa_id
                Forms\Components\Select::make('siswa_id')
                    ->label('Nama Siswa')
                    ->relationship('siswa', 'nama')
                    ->native(false)
                    ->columnSpan(2)
                    ->required(),

                // industri_id
                Forms\components\select::make('industri_id')
                    ->label('Nama Industri')
                    ->relationship('industri', 'nama')
                    ->native(false)
                    ->required(),

                // guru_id
                Forms\Components\Select::make('guru_id')
                    ->label('Nama Guru pendamping')
                    ->relationship('guru', 'nama')
                    ->native(false)
                    ->required(),

                // mulai
                Forms\components\DatePicker::make('mulai')
                    ->label('Tanggal Mulai')
                    ->maxDate(now()->addYears(5))
                    ->required(),

                // selesai
                Forms\Components\DatePicker::make('selesai')
                        ->label('Tanggal Selesai')
                        ->maxDate(now()->addYears(5))
                        ->after('mulai')
                        ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //id menjadin nomor urut berdasar id terkecil hingga terbesar
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->getStateUsing(fn ($record) => pkl::orderBy('id')->pluck('id')
                    ->search($record->id) +1),

                // nama siswa
                Tables\Columns\TextColumn::make('siswa.nama')
                    ->label('Nama Siswa')
                    ->searchable(),

                // nama industri
                Tables\Columns\TextColumn::make('industri.nama')
                    ->label('Nama Industri')
                    ->searchable(),

                // nama guru
                Tables\Columns\TextColumn::make('guru.nama')
                    ->label('Nama Guru')
                    ->searchable(),

                // mulai
                Tables\Columns\TextColumn::make('mulai')
                    ->label('Mulai')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('d M Y')),
                
                // selesai
                Tables\Columns\TextColumn::make('selesai')
                    ->label('Selesai')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('d M Y')),
                
                // durasi
                Tables\Columns\TextColumn::make('durasi')
                    ->label('Durasi')
                    ->getStateUsing(fn ($record) =>
                    \Carbon\Carbon::parse($record->mulai)->diffInDays(\Carbon\Carbon::parse($record->selesai))
            ),

            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\ActionGroup::make([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                ]),
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
            'index' => Pages\ListPkls::route('/'),
            'create' => Pages\CreatePkl::route('/create'),
            'view' => Pages\ViewPkl::route('/{record}'),
            'edit' => Pages\EditPkl::route('/{record}/edit'),
        ];
    }
}
