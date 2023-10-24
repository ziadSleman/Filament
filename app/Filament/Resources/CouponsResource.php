<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CouponsResource\Pages;
use App\Filament\Resources\CouponsResource\RelationManagers;
use App\Models\Coupons;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CouponsResource extends Resource
{
    protected static ?string $model = Coupons::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Shop';


    public static function form(Form $form): Form
    {

        return $form
        ->schema([
            Forms\Components\Card::make()
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(2048),
                        Forms\Components\TextInput::make('price')
                        ->required()
                        ->numeric(),
                        Forms\Components\TextInput::make('code')
                        ->required()
                        ->numeric(),
                        Forms\Components\TextInput::make('ammount')
                        ->required()
                        ->numeric(),
                        Forms\Components\TextInput::make( 'ammount_available')
                        ->required()
                        ->numeric(),
                    Forms\Components\DatePicker::make('start_date'),
                    Forms\Components\DatePicker::make('end_date'),
                Forms\Components\Card::make()
                ->schema([
                    Forms\Components\Select::make('products')
                        ->multiple()
                        ->relationship('products', 'name'),
                        Forms\Components\Toggle::make('status')
                        ->required(),
                ])->columnSpan(4),
        ])->columns(2),
        ])->columns(2);

    
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCoupons::route('/'),
            'create' => Pages\CreateCoupons::route('/create'),
            'edit' => Pages\EditCoupons::route('/{record}/edit'),
        ];
    }    
}
