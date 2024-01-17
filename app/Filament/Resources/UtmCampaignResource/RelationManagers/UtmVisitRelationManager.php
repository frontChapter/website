<?php

namespace App\Filament\Resources\UtmCampaignResource\RelationManagers;

use Ariaieboy\FilamentJalaliDatetime\JalaliDateTimeColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UtmVisitRelationManager extends RelationManager
{
    protected static string $relationship = 'UtmVisits';

    public static function getModelLabel(): string
    {
        return __('Utm Visits');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Utm Visit');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('utm_campaign')
                    ->required()
                    ->translateLabel()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('utm_campaign')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('utm_campaign')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('utm_medium')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('utm_source')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('utm_term')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('utm_content')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('referer')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_ip_address')
                    ->label('Ip address')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                JalaliDateTimeColumn::make('created_at')
                    ->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                JalaliDateTimeColumn::make('updated_at')
                    ->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('user')
                    ->translateLabel()
                    ->relationship('user', 'first_name', fn(Builder $query) => $query->selectRaw("users.id, CONCAT(users.first_name , ' ' , users.last_name) as first_name"))
                    ->searchable()
                    ->preload(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->translateLabel(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function isReadOnly(): bool
    {
        return true;
    }

}
