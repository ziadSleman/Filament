<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Filament\Forms\Set;
class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('number')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('notes')
                ->maxLength(2048),
                Forms\Components\TextInput::make('shipping_price')
                ->maxLength(2048)
                ->numeric(),
                Forms\Components\TextInput::make('total_price')
                ->maxLength(2048)
                ->numeric(),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    { 
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number'),
                Tables\Columns\TextColumn::make('notes'),
                Tables\Columns\TextColumn::make('shipping_price'),
                Tables\Columns\TextColumn::make('total_price')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->date()
                    ->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }    
}
