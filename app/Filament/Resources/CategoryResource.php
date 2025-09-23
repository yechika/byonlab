<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Kategori';

    protected static ?string $pluralLabel = 'Kategori';

    protected static ?string $label = 'Kategori';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Kategori')
                    ->required()
                    ->maxLength(255)
                    ->unique(Category::class, 'name', ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Kategori')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('subcategories_count')
                    ->label('Jumlah Sub Kategori')
                    ->counts('subcategories')
                    ->sortable(),
                
                TextColumn::make('products_count')
                    ->label('Jumlah Produk')
                    ->getStateUsing(function (Category $record) {
                        return $record->subcategories()->withCount('products')->get()->sum('products_count') + 
                               $record->products()->count();
                    })
                    ->sortable(),
                
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('view_products')
                    ->label('Lihat Produk')
                    ->icon('heroicon-o-eye')
                    ->url(fn (Category $record): string => route('filament.admin.resources.products.index', ['tableFilters[category_id][value]' => $record->id]))
                    ->openUrlInNewTab(),
                
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function (Category $record) {
                        // Check if category has products or subcategories
                        $productCount = $record->subcategories()->withCount('products')->get()->sum('products_count') + 
                                       $record->products()->count();
                        $subcategoryCount = $record->subcategories()->count();
                        
                        if ($productCount > 0 || $subcategoryCount > 0) {
                            throw new \Exception('Tidak dapat menghapus kategori yang masih memiliki produk atau sub kategori. Silakan hapus terlebih dahulu produk dan sub kategori yang terkait.');
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function ($records) {
                            foreach ($records as $record) {
                                $productCount = $record->subcategories()->withCount('products')->get()->sum('products_count') + 
                                               $record->products()->count();
                                $subcategoryCount = $record->subcategories()->count();
                                
                                if ($productCount > 0 || $subcategoryCount > 0) {
                                    throw new \Exception("Tidak dapat menghapus kategori '{$record->name}' yang masih memiliki produk atau sub kategori.");
                                }
                            }
                        }),
                ]),
            ])
            ->defaultSort('name', 'asc');
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}