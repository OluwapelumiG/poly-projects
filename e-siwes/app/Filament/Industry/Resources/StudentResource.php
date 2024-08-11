<?php

namespace App\Filament\Industry\Resources;

use App\Filament\Industry\Resources\StudentResource\Pages;
use App\Filament\Industry\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\Action;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             //
    //         ]);
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('matric_no')->sortable()->searchable(),
                TextColumn::make('reviews.review_note')->label('Review'),
                // TextColumn::make('industry.name')->label('Industry')->sortable()->searchable(),
            ])
            ->filters([])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Action::make('review')
                    ->label('Review')
                    ->form([
                        TextInput::make('review_note')
                            ->label('Review Note')
                            ->required(),
                    ])
                    ->action(function ($record, $data) {
                        $record->reviews()->create([
                            'review_note' => $data['review_note'],
                        ]);
                    }),
            ]);
        // ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            // RelationManagers\ReviewsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            // 'create' => Pages\CreateStudent::route('/create'),
            // 'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
