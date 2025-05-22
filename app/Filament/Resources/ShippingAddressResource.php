<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShippingAddressResource\Pages;
use App\Models\ShippingAddress;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ShippingAddressResource extends Resource
{
    protected static ?string $model = ShippingAddress::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->required()
                ->label('User'),
            Forms\Components\TextInput::make('recipient_name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('address_line1')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('address_line2')
                ->nullable()
                ->maxLength(255),
            Forms\Components\TextInput::make('city')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('postal_code')
                ->required()
                ->maxLength(20),
            Forms\Components\TextInput::make('country')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('phone_number')
                ->required()
                ->maxLength(20),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->sortable(),
            Tables\Columns\TextColumn::make('user.name')->label('User')->sortable(),
            Tables\Columns\TextColumn::make('recipient_name')->sortable(),
            Tables\Columns\TextColumn::make('city')->sortable(),
            Tables\Columns\TextColumn::make('postal_code')->sortable(),
            Tables\Columns\TextColumn::make('country')->sortable(),
            Tables\Columns\TextColumn::make('phone_number')->sortable(),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShippingAddresses::route('/'),
            'create' => Pages\CreateShippingAddress::route('/create'),
            'edit' => Pages\EditShippingAddress::route('/{record}/edit'),
        ];
    }
}
