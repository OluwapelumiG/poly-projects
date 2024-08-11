<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.name')->label('Student'),
                TextColumn::make('review_note')->label('Review Note'),
                TextColumn::make('remark')->label('Status'),
            ])
            ->actions([
                Action::make('approve')
                    ->label('Approve')
                    ->requiresConfirmation()
                    ->color('success')
                    ->action(function (Review $record) {
                        $record->update(['remark' => 'Approved']);
                    }),
                Action::make('disapprove')
                    ->label('Disapprove')
                    ->requiresConfirmation()
                    ->color('danger')
                    ->action(function (Review $record) {
                        $record->update(['remark' => 'Disapproved']);
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
