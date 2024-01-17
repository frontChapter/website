<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UtmCampaignResource\Pages;
use App\Filament\Resources\UtmCampaignResource\RelationManagers\UtmVisitRelationManager;
use App\Models\UtmCampaign;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UtmCampaignResource extends Resource
{
    protected static ?string $model = UtmCampaign::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    public static function getNavigationGroup(): ?string
    {
        return __('Campaigns');
    }

    public static function getModelLabel(): string
    {
        return __('Utm Campaign');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Utm Campaigns');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->translateLabel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('utm_campaign')
                            ->translateLabel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('title')
                            ->translateLabel()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->translateLabel(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('creator.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('utm_campaign')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            UtmVisitRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUtmCampaigns::route('/'),
            'create' => Pages\CreateUtmCampaign::route('/create'),
            'edit' => Pages\EditUtmCampaign::route('/{record}/edit'),
        ];
    }
}
