<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Column;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Modal;
use Filament\Forms\Components\TextInput;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('industry_id')
                    ->relationship('industry', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('matric_no')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('industry.name')
                    ->label('Industry'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('matric_no'),
                // Tables\Columns\TextColumn::make('reviews.review_note'),
            ])
            ->filters([])
            ->actions([
                // Action::make('review')
                //     ->label('Review')
                //     // ->modal('reviewModal')
                //     ->form([
                //         TextInput::make('reviews.review_note')->label('Review Note')->disabled(true),
                //         // TextInput::make('remark')->label('Remark')->default('Pending')->disabled(true),
                //     ])
                //     ->action(function ($record, $data) {
                //         // Perform action when the review modal is opened
                //         $record->reviews()->create([
                //             'remark' => "Approved",
                //         ]);
                //     }),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
