<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SponsorResource\Pages;
use App\Models\Sponsor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class SponsorResource extends Resource
{
    protected static ?string $model = Sponsor::class;

    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $navigationLabel = 'Partner';
    protected static ?string $pluralModelLabel = 'Partner';
    protected static ?string $modelLabel = 'Partner';
    protected static ?string $slug = 'partners';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    FileUpload::make('image_url')
                        ->label('Logo')
                        ->image()
                        ->directory('sponsors')
                        ->disk('public')
                        ->visibility('public')
                        ->imageEditor()
                        ->imageEditorAspectRatios([
                            '16:9',
                            '4:3',
                            '1:1',
                        ])
                        ->maxSize(2048) // 2MB (sesuai dengan upload_max_filesize PHP)
                        ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml'])
                        ->required()
                        ->helperText('Format yang didukung: JPEG, PNG, GIF, WebP, SVG. Maksimal 2MB.'),
                TextInput::make('alt')->label('Alt Text')->maxLength(255),
                Toggle::make('is_active')->label('Active')->default(true),
                TextInput::make('sort_order')->label('Sort Order')->numeric()->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')->label('Logo')->disk('public')->rounded(),
                TextColumn::make('alt')->label('Alt Text')->limit(30),
                BooleanColumn::make('is_active')->label('Active'),
                TextColumn::make('sort_order')->label('Sort Order'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order')
            ->emptyStateHeading('Belum ada partner')
            ->emptyStateDescription('Klik tombol "Tambah Partner" untuk menambahkan partner pertama.')
            ->emptyStateIcon('heroicon-o-building-office');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSponsors::route('/'),
            'create' => Pages\CreateSponsor::route('/create'),
            'edit' => Pages\EditSponsor::route('/{record}/edit'),
        ];
    }
}
