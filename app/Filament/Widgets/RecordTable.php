<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\Summarizers\Count;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecordTable extends TableWidget
{
    protected static bool $isLazy = false;

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
