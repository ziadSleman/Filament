<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Productss;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Closure;

class ProductResource extends Resource
{
    protected static ?string $model = Productss::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
                return $form
                ->schema([
                    Forms\Components\Card::make()
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(2048)
                                ->reactive()
                                ->afterStateUpdated(function (Closure $set, $state) {
                                    $set('slug', Str::slug($state));
                                }),
                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->maxLength(2048),
                                Forms\Components\TextInput::make('price')
                                ->required()
                                ->numeric(),
                                Forms\Components\TextInput::make('quantity')
                                ->required()
                                ->numeric(),
                            Forms\Components\RichEditor::make('description'),
                                Forms\Components\FileUpload::make('image_url')
                                ->label(false)                        
                                ->image()
                                ->imageCropAspectRatio(null),
                            Forms\Components\DateTimePicker::make('published_at'),
                        ])->columnSpan(8),
                        Forms\Components\Card::make()
                        ->schema([
                            Forms\Components\Select::make('categories')
                                ->multiple()
                                ->relationship('categories', 'name'),
                                Forms\Components\Toggle::make('is_visible')
                                ->required(),
                                Forms\Components\Toggle::make('is_featured')
                                ->required(),
                        ])->columnSpan(4)
                ])->columns(12);
    }
    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\ImageColumn::make('image_url')
                ->label('Image'),
            Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),
            Tables\Columns\IconColumn::make('is_visible')
                ->label('Visibility')
                ->sortable()
                ->toggleable()
                ->boolean(),
            Tables\Columns\TextColumn::make('price')
                ->sortable(),
            Tables\Columns\TextColumn::make('quantity')
                ->sortable(),
            Tables\Columns\TextColumn::make('published_at')
                ->sortable()
                ->date(),
            
        ])
        ->filters([
            Tables\Filters\TernaryFilter::make('is_visible')
                ->label('Visibility')
                ->trueLabel('Only visible products')
                ->falseLabel('Only hidden products')
                ->boolean(),
        ])
        ->actions([
            Tables\Actions\ActionGroup::make([
            Tables\Actions\EditAction::make()->iconButton()
            // ])
        ])
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }    
}
