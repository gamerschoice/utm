<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LinkResource\Pages;
use App\Filament\Resources\LinkResource\RelationManagers;
use App\Models\Link;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LinkResource extends Resource
{
    protected static ?string $model = Link::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('destination')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('utm_source')
                    ->maxLength(255),
                Forms\Components\TextInput::make('utm_medium')
                    ->maxLength(255),
                Forms\Components\TextInput::make('utm_campaign')
                    ->maxLength(255),
                Forms\Components\TextInput::make('utm_term')
                    ->maxLength(255),
                Forms\Components\TextInput::make('utm_content')
                    ->maxLength(255),
                Forms\Components\TextInput::make('utm_source_platform')
                    ->maxLength(255),
                Forms\Components\TextInput::make('utm_creative_format')
                    ->maxLength(255),
                Forms\Components\TextInput::make('utm_marketing_tactic')
                    ->maxLength(255),
                Forms\Components\Textarea::make('notes'),
                Forms\Components\TextInput::make('shortlink')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('domain_id')
                    ->relationship('domain', 'id')
                    ->required(),
                Forms\Components\TextInput::make('health_status_code'),
                Forms\Components\DateTimePicker::make('health_checked_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('destination'),
                Tables\Columns\TextColumn::make('utm_source'),
                Tables\Columns\TextColumn::make('utm_medium'),
                Tables\Columns\TextColumn::make('utm_campaign'),
                Tables\Columns\TextColumn::make('utm_term'),
                Tables\Columns\TextColumn::make('utm_content'),
                Tables\Columns\TextColumn::make('utm_source_platform'),
                Tables\Columns\TextColumn::make('utm_creative_format'),
                Tables\Columns\TextColumn::make('utm_marketing_tactic'),
                Tables\Columns\TextColumn::make('notes'),
                Tables\Columns\TextColumn::make('shortlink'),
                Tables\Columns\TextColumn::make('domain.id'),
                Tables\Columns\TextColumn::make('health_status_code'),
                Tables\Columns\TextColumn::make('health_checked_at')
                    ->dateTime(),
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
            'index' => Pages\ListLinks::route('/'),
            'create' => Pages\CreateLink::route('/create'),
            'edit' => Pages\EditLink::route('/{record}/edit'),
        ];
    }    
}
