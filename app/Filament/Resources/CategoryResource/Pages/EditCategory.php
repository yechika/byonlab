<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Kembali')
                ->color('secondary')
                ->url(route('filament.admin.resources.categories.index'))
                ->icon('heroicon-o-arrow-left'),
            Actions\DeleteAction::make(),
        ];
    }
}