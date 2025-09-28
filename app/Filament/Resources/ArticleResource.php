<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Artikel';

    protected static ?string $modelLabel = 'Artikel';

    protected static ?string $pluralModelLabel = 'Artikel';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Artikel')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null
                            ),
                        
                        Forms\Components\TextInput::make('slug')
                            ->label('URL (Auto-Generated)')
                            ->required()
                            ->maxLength(255)
                            ->unique(Article::class, 'slug', ignoreRecord: true)
                            ->helperText('URL unik untuk artikel (otomatis dari judul)'),
                        
                        Forms\Components\Textarea::make('excerpt')
                            ->label('Ringkasan')
                            ->maxLength(500)
                            ->helperText('Deskripsi singkat artikel (opsional, akan dibuat otomatis dari konten jika kosong)'),
                        
                        Forms\Components\RichEditor::make('content')
                            ->label('Konten')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('image_url')
                            ->label('Gambar Artikel')
                            ->image()
                            ->multiple()
                            ->directory('articles')
                            ->maxFiles(5)
                            ->reorderable()
                            ->appendFiles()
                            ->imageEditor()
                            ->helperText('Upload hingga 5 gambar untuk artikel'),
                    ]),

                Forms\Components\Section::make('Publikasi')
                    ->schema([
                        Forms\Components\Toggle::make('is_published')
                            ->label('Dipublikasikan')
                            ->default(false),
                        
                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Tanggal Publikasi')
                            ->default(now())
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('SEO')
                    ->schema([
                        Forms\Components\TextInput::make('meta_title')
                            ->label('Judul SEO')
                            ->maxLength(60)
                            ->helperText('Judul SEO (maksimal 60 karakter)'),
                        
                        Forms\Components\Textarea::make('meta_description')
                            ->label('Deskripsi SEO')
                            ->maxLength(160)
                            ->helperText('Deskripsi SEO (maksimal 160 karakter)'),
                    ])->columns(1)->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Gambar')
                    ->circular()
                    ->stacked()
                    ->limit(1),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Dipublikasikan')
                    ->boolean()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal Publikasi')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status Publikasi'),
                
                Tables\Filters\Filter::make('published_at')
                    ->label('Tanggal Publikasi')
                    ->form([
                        Forms\Components\DatePicker::make('published_from')
                            ->label('Dipublikasikan dari'),
                        Forms\Components\DatePicker::make('published_until')
                            ->label('Dipublikasikan sampai'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '>=', $date),
                            )
                            ->when(
                                $data['published_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat'),
                Tables\Actions\EditAction::make()
                    ->label('Edit'),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus Terpilih'),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
