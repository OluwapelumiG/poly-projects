<?php

namespace App\Filament\General\Resources;

use App\Filament\General\Resources\PaymentResource\Pages;
use App\Filament\General\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Payable;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query()->where('user_id', Auth::id());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('user_id')
                    ->default(fn () => Auth::id()),
                Select::make('payable_id')
                    ->label('Payable Item')
                    ->options(Payable::all()->pluck('item', 'id'))
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('amount', Payable::find($state)?->price)),
                TextInput::make('amount')
                    ->numeric()
                    ->readOnly()
                    ->label('Amount'),
                TextInput::make('card_no')
                    ->label('Card Number')
                    ->id('card_no') // Add ID for jQuery inputmask
                    ->numeric()
                    ->required(),
                TextInput::make('expiry')
                    ->label('Expiry Date')
                    ->id('expiry') // Add ID for jQuery inputmask
                    ->required(),
                TextInput::make('cvv')
                    ->label('CVV')
                    ->id('cvv') // Add ID for jQuery inputmask
                    ->numeric()
                    ->required(),
                TextInput::make('passcode')
                    ->label('Passcode')
                    ->id('passcode') // Add ID for jQuery inputmask
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('User Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('payable.item')
                    ->label('Payment Item')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('amount')
                    ->label('Amount')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime(),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
