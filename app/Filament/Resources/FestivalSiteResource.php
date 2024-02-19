<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FestivalSiteResource\Pages;
use App\Filament\Resources\FestivalSiteResource\RelationManagers\VotesRelationManager;
use App\Models\FestivalSite;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FestivalSiteResource extends Resource
{
    protected static ?string $model = FestivalSite::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';

    public static function getNavigationGroup(): ?string
    {
        return __('Festival');
    }

    public static function getModelLabel(): string
    {
        return __('Site');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Sites');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user.name')
                    ->required()
                    ->translateLabel()
                    ->relationship(name: 'user', titleAttribute: 'name')
                    ->searchable(),
                Forms\Components\TextInput::make('app_id')
                    ->required()
                    ->translateLabel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->translateLabel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->translateLabel()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable()
                    ->translateLabel()
                    ->sortable(),
                Tables\Columns\TextColumn::make('app_id')
                    ->sortable()
                    ->translateLabel()
                    ->sortable(),
                Tables\Columns\TextColumn::make('url')
                    ->sortable()
                    ->translateLabel()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->translateLabel()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            VotesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFestivalSites::route('/'),
            'create' => Pages\CreateFestivalSite::route('/create'),
            'view' => Pages\ViewFestivalSite::route('/{record}'),
            'edit' => Pages\EditFestivalSite::route('/{record}/edit'),
        ];
    }
}
