<?php

namespace App\Filament\Resources;

use App\Models\Guru;
use App\Filament\Resources\GuruResource\Pages;
use App\Filament\Resources\GuruResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // nama
                Forms\Components\TextInput::make('nama')
                    ->label('Nama')
                    ->placeholder('Nama Guru')
                    ->required(),

                // nip
                Forms\Components\TextInput::make('nip')
                    ->label('NIP')
                    ->placeholder('NIP Guru')
                    ->unique(ignoreRecord:  true)
                    ->validationMessages([// pesan error yg tampil kalo user masuk dgn nip yg udah dipake
                        'unique' => 'NIP ini sudah dimiliki pengguna lain',
                    ])
                    ->required(),

                // gender
                Forms\Components\Select::make('gender') //menghasilkan dropdown utk milih data berdasar field gender
                    ->label('Jenis Kelamin')
                    ->options([ // pilihan utk droptownnya
                        'Laki-Laki' => 'Laki-Laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->native(false) //nonaktifkan tampilan dropdown bawaan browser
                    ->columnspan(2)
                    ->required(),

                // email
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->placeholder('Email Guru')
                    ->email() //mengatur input type="email dan validasi email otomatis
                    ->unique(ignoreRecord: true)
                    ->validationMessages([ // pesan error yg akan tampil jika user memasukan email yg sudah digunakan
                        'unique' => 'Email ini sudah dimiliki pengguna lain', 
                    ])
                    ->required(),
                
                // kontak
                Forms\Components\TextInput::make('kontak')
                    ->label('Kontak')
                    ->placeholder('Kontak Guru')
                    ->required(),

                // alamat
                Forms\Components\TextInput::make('alamat')
                    ->label('Alamat')
                    ->placeholder('Alamat Guru')
                    ->columnspan(2)
                    ->required(),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // id jadi no urut
                Tables\Columns\TextColumn::make('id')
	                ->label('ID')
	                ->getStateUsing(fn ($record) => guru::orderBy('id')->pluck('id')
	                ->search($record->id) + 1),

                // nama
                Tables\Columns\TextColumn::make('nama')
	                ->label('Nama')
	                ->searchable()
	                ->sortable(),

                // gender
                Tables\Columns\TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->formatStateUsing(fn ($state) => [ //ubah tampilan supaya yang tampil di tabel itu Laki, bukan L doang
                        'L' => 'Laki-Laki', 
                        'P' => 'Perempuan',
                        ][$state] ?? '-')
                    ->searchable()
                    ->sortable(),

                // email
                Tables\Columns\TextColumn::make('email')
	                ->label('Email')
	                ->searchable()
	                ->sortable(),

                // kontak
                Tables\Columns\TextColumn::make('kontak')
	                ->label('Kontak')
	                ->searchable()
	                ->sortable(),
            ])

            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\ActionGroup::make([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'view' => Pages\ViewGuru::route('/{record}'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
