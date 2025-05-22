<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

   public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\TextInput::make('name')
            ->required()
            ->maxLength(255),

        Forms\Components\Textarea::make('description')
            ->rows(3),

        Forms\Components\TextInput::make('price')
            ->required()
            ->numeric(),

        Forms\Components\TextInput::make('stock')
            ->required()
            ->numeric(),

          Forms\Components\FileUpload::make('image_url')
            ->image()  // Pastikan hanya menerima gambar
            ->directory('product_images') // Simpan gambar di folder public/product_images
            ->required() // Jika ingin gambar wajib di-upload
]);
}


    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->sortable(),
            Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('price')->sortable(),
            Tables\Columns\TextColumn::make('stock')->sortable(),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
           Tables\Columns\ImageColumn::make('image_url')
                ->disk('public') // Gambar disimpan di public/storage
                ->width(100)
                ->height(100),
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
