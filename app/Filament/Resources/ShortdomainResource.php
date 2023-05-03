<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShortDomainResource\Pages;
use App\Filament\Resources\ShortDomainResource\RelationManagers;
use App\Models\ShortDomain;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShortDomainResource extends Resource
{
    protected static ?string $model = ShortDomain::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('domain_id')
                    ->relationship('domain', 'id')
                    ->required(),
                Forms\Components\TextInput::make('host')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cf_host_identifier')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cf_route_identifier')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('domain.id'),
                Tables\Columns\TextColumn::make('host'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('cf_host_identifier'),
                Tables\Columns\TextColumn::make('cf_route_identifier'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListShortDomains::route('/'),
            'create' => Pages\CreateShortDomain::route('/create'),
            'edit' => Pages\EditShortDomain::route('/{record}/edit'),
        ];
    }    
}
