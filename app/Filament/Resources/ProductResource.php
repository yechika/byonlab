<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)
                    ->schema([

                        TextInput::make('name')
                            ->label('Nama Produk')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('price')
                            ->label('Harga')
                            ->numeric()
                            ->required(),

                        TextInput::make('stock')
                            ->label('Stok')
                            ->numeric()
                            ->required(),

                        Select::make('category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->required()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->label('Nama Kategori')
                                    ->required(),
                            ]),

                        Select::make('subcategory_id')
                            ->label('Sub Kategori')
                            ->relationship('subcategory', 'name')
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                Select::make('category_id')
                                    ->label('Kategori')
                                    ->relationship('category', 'name')
                                    ->required(),
                                TextInput::make('name')
                                    ->label('Nama Sub Kategori')
                                    ->required(),
                            ]),

                        FileUpload::make('image_url')
                            ->label('Gambar Produk')
                            ->image()
                            ->multiple() 
                            ->directory('products/images')
                            ->maxSize(2048),

                        TextInput::make('target_link')
                            ->label('Link Inaproc')
                            ->url()
                            ->maxLength(255),
                    ]),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(5)
                    ->columnSpanFull(),

                Repeater::make('attributes')
                    ->label('Atribut Produk')
                    ->schema([
                        TextInput::make('key')->label('Nama Atribut'),
                        TextInput::make('value')->label('Nilai Atribut'),
                    ])
                    ->defaultItems(1)
                    ->columnSpanFull()
                    ->collapsible(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama Produk'),
                Tables\Columns\TextColumn::make('price')->label('Harga'),
                Tables\Columns\TextColumn::make('stock')->label('Stok'),
                Tables\Columns\TextColumn::make('category.name')->label('Kategori'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
