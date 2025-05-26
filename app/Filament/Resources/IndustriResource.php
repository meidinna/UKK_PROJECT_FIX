<?php

namespace App\Filament\Resources;

use App\Models\Industri;
use App\Filament\Resources\IndustriResource\Pages;
use App\Filament\Resources\IndustriResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Notifications\Notification; // Tambahkan ini

class IndustriResource extends Resource
{
    protected static ?string $model = Industri::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('gambar')
                    ->label('Logo Industri')
                    ->image()
                    ->directory('industri')
                    ->columnspan(2)
                    ->required(),

                Forms\Components\TextInput::make('nama')
                    ->label('Nama')
                    ->placeholder('Nama Industri')
                    ->columnspan(2)
                    ->required(),

                Forms\Components\TextInput::make('bidang_usaha')
                    ->label('Bidang Usaha')
                    ->placeholder('Bidang Usaha')
                    ->required(),

                Forms\Components\TextInput::make('website')
                    ->label('Website')
                    ->placeholder('Website Industri')
                    ->url()
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->placeholder('Email Industri')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'unique' => 'Email ini sudah dimiliki pengguna lain',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('kontak')
                    ->label('Kontak')
                    ->placeholder('Kontak Industri')
                    ->required(),

                Forms\Components\TextInput::make('alamat')
                    ->label('Alamat')
                    ->placeholder('Alamat Industri')
                    ->columnspan(2)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->getStateUsing(fn ($record) => Industri::orderBy('id')->pluck('id')
                    ->search($record->id) + 1),

                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Logo'),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('bidang_usaha')
                    ->label('Bidang Usaha')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('website')
                    ->label('Website')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

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
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\Action::make('delete')
                        ->label('Hapus')
                        ->requiresConfirmation()
                        ->icon('heroicon-o-trash')
                        ->color('danger')
                        ->action(fn ($record) => static::deleteIndustri($record)),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->action(function (Illuminate\Support\Collection $records) {
                        foreach ($records as $record) {
                            static::deleteIndustri($record);
                        }
                    }),
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
            'index' => Pages\ListIndustris::route('/'),
            'create' => Pages\CreateIndustri::route('/create'),
            'view' => Pages\ViewIndustri::route('/{record}'),
            'edit' => Pages\EditIndustri::route('/{record}/edit'),
        ];
    }

    protected static function deleteIndustri($record)
    {
        if ($record->pkls()->exists()) {
            Notification::make()
                ->title('Gagal menghapus!')
                ->body('Industri ini masih digunakan dalam PKL. Hapus PKL terkait terlebih dahulu.')
                ->danger()
                ->send();
            return;
        }

        $record->delete();

        Notification::make()
            ->title('Industri dihapus!')
            ->body('Industri berhasil dihapus.')
            ->success()
            ->send();
    }
}
