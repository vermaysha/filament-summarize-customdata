<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\Summarizers\Count;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class Manage extends Page implements HasTable, HasSchemas
{
    use InteractsWithTable;
    use InteractsWithSchemas;

    protected string $view = 'filament.pages.manage';

    public function table(Table $table): Table
    {
        return $table
            ->records(fn(): array => [
                1 => [
                    'title' => 'First item',
                    'slug' => 'first-item',
                    'is_featured' => true,
                ],
                2 => [
                    'title' => 'Second item',
                    'slug' => 'second-item',
                    'is_featured' => false,
                ],
                3 => [
                    'title' => 'Third item',
                    'slug' => 'third-item',
                    'is_featured' => true,
                ],
            ])
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('slug'),
                IconColumn::make('is_featured')
                    ->boolean()
                    ->summarize(Count::make()),
            ]);
    }


}
