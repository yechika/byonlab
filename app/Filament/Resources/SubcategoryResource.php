<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubcategoryResource\Pages;
use App\Models\Subcategory;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class SubcategoryResource extends Resource
{
    protected static ?string $model = Subcategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    protected static ?string $navigationLabel = 'Sub Kategori';

    protected static ?string $pluralLabel = 'Sub Kategori';

    protected static ?string $label = 'Sub Kategori';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->preload()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nama Kategori')
                            ->required(),
                    ]),

                TextInput::make('name')
                    ->label('Nama Sub Kategori')
                    ->required()
                    ->maxLength(255)
                    ->unique(Subcategory::class, 'name', ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Nama Sub Kategori')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('products_count')
                    ->label('Jumlah Produk')
                    ->counts('products')
                    ->sortable(),
                
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->preload(),
            ])
            ->actions([
                Action::make('view_products')
                    ->label('Lihat Produk')
                    ->icon('heroicon-o-eye')
                    ->url(fn (Subcategory $record): string => route('filament.admin.resources.products.index', ['tableFilters[subcategory_id][value]' => $record->id]))
                    ->openUrlInNewTab(),
                
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function (Subcategory $record) {
                        // Check if subcategory has products
                        $productCount = $record->products()->count();
                        
                        if ($productCount > 0) {
                            throw new \Exception('Tidak dapat menghapus sub kategori yang masih memiliki produk. Silakan hapus terlebih dahulu produk yang terkait.');
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function ($records) {
                            foreach ($records as $record) {
                                $productCount = $record->products()->count();
                                
                                if ($productCount > 0) {
                                    throw new \Exception("Tidak dapat menghapus sub kategori '{$record->name}' yang masih memiliki produk.");
                                }
                            }
                        }),
                ]),
            ])
            ->defaultSort('category.name', 'asc');
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
            'index' => Pages\ListSubcategories::route('/'),
            'create' => Pages\CreateSubcategory::route('/create'),
            'edit' => Pages\EditSubcategory::route('/{record}/edit'),
        ];
    }
}