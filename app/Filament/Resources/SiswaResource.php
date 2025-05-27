<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    public static function form(Form $form): Form
    {

        return $form	        
            ->schema([
		        // foto
		        Forms\Components\FileUpload::make('gambar')
					->label('Foto Siswa')
					->image()
					->directory('siswa')
					->visibility('public') // <--- penting
					->columnSpan(2),

				// nama
				Forms\Components\TextInput::make('nama')
					->label('Nama')
					->placeholder('Nama Siswa')
					->required(),

				// nis
				Forms\Components\TextInput::make('nis')
					->label('NIS')
					->placeholder('NIS Siswa')
					->validationMessages([ // pesan error yang akan tampil jika user memasukkan nisyang sudah digunakan
						'unique' => 'NISini sudah dimiliki pengguna lain',
					])
					->required(),

				// gender
				Forms\Components\Select::make('gender')
					->label('Jenis Kelamin')
					->options([ // pilihan untuk dropdown
						'L' => 'Laki-Laki',
						'P' => 'Perempuan',
					])
					->native(false) // menonaktifkan tampilan dropdown bawaan browser
					->required(),

				// rombel
				Forms\Components\Select::make('rombel')
					->label('Rombongan Belajar')
					->options([ // pilihan untuk dropdown
						'sijaA' => 'SIJA A',
						'sijaB' => 'SIJA B',
					])
					->native(false) // menonaktifkan tampilan dropdown bawaan browser
					->required(),

				// email
				Forms\Components\TextInput::make('email')
					->label('Email')
					->placeholder('Email Siswa')
					->email()
					->unique(ignoreRecord: true)
					->validationMessages([ // pesan erro yang akan tampil jika user memasukkan email yang sudah digunakan
						'unique' => 'Email sudah dimiliki pengguna lain',
					])
					->required(),

				// kontak
				Forms\Components\TextInput::make('kontak')
					->label('Kontak')
					->placeholder('Kontak Siswa')
					->required(),

				// alamat
				Forms\Components\TextInput::make('alamat')
					->label('Alamat')
					->placeholder('Alamat Siswa')
					->columnspan(2)
					->required(),
					]);
			}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // id sebagai no urut
                Tables\Columns\TextColumn::make('id')
                	->label('ID')
                	->getStateUsing(fn ($record) => siswa::orderBy('id')->pluck('id')
                	->search($record->id) + 1),

                // gambar
                Tables\Columns\ImageColumn::make('gambar')
				    ->label('Foto Siswa')
    				->disk('public')
    				->visibility('public'),

                // nama
                Tables\Columns\TextColumn::make('nama')
                	->label('Nama')
                	->searchable()  
                	->sortable(),

                // gender
                Tables\Columns\TextColumn::make('gender')
                	->label('Jenis Kelamin')
                	->searchable()
                	->sortable(),

                // rombel
                Tables\Columns\TextColumn::make('rombel')
                	->label('Rombel')
					->formatStateUsing(fn ($state) => [ //ubah tampilan supaya yang tampil di tabel itu Laki, bukan L doang
                  		'sijaA' => 'SIJA A', 
                   		'sijaB' => 'SIJA B',
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

                // status pkl
                Tables\Columns\BadgeColumn::make('status_pkl')
	                ->label('Status PKL')
	                ->formatStateUsing(fn ($state) => $state ? 'Aktif' : 'Tidak Aktif')
	                ->color(fn ($state) =>$state ? 'success' : 'danger'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('gender')
                	->label('Gender')
                	->options([ // pilihannya
	                	'Laki-Laki' => 'Laki-Laki',
	                	'Perempuan' => 'Perempuan',
	                ]),
                Tables\Filters\SelectFilter::make('rombel')
	                ->label('Rombongan Belajar')
	                ->options([ // pilihan untuk dropdown
			        	'SIJA A' => 'SIJA A',
        				'SIJA B' => 'SIJA B'
                    ]),
                Tables\Filters\TernaryFilter::make('status_lapor_pkl')
	                ->trueLabel('Aktif')
                    ->falseLabel('Nonaktif'),
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'view' => Pages\ViewSiswa::route('/{record}'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
