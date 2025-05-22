<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderOrderResource\Pages;
use App\Models\OrderOrder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderOrderResource extends Resource
{
    protected static ?string $model = OrderOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('order_id')
                ->relationship('order', 'id')
                ->required(),
            Forms\Components\Select::make('product_id')
                ->relationship('product', 'name')
                ->required(),
            Forms\Components\TextInput::make('quantity')
                ->numeric()
                ->required()
                ->minValue(1),
            Forms\Components\TextInput::make('price')
                ->numeric()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->sortable(),
            Tables\Columns\TextColumn::make('order.id')->label('Order ID')->sortable(),
            Tables\Columns\TextColumn::make('product.name')->label('Product')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('quantity')->sortable(),
            Tables\Columns\TextColumn::make('price')->sortable(),
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
            'index' => Pages\ListOrderOrders::route('/'),
            'create' => Pages\CreateOrderOrder::route('/create'),
            'edit' => Pages\EditOrderOrder::route('/{record}/edit'),
        ];
    }
}
