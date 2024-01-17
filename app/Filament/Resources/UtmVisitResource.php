<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UtmVisitResource\Pages;
use App\Models\UtmVisit;
use Ariaieboy\FilamentJalaliDatetime\JalaliDateTimeColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UtmVisitResource extends Resource
{
    protected static ?string $model = UtmVisit::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';

    public static function getNavigationGroup(): ?string
    {
        return __('Campaigns');
    }

    public static function getModelLabel(): string
    {
        return __('Utm Visit');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Utm Visits');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('utm_campaign')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('utm_medium')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('utm_source')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('utm_term')
                    ->translateLabel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('utm_content')
                    ->translateLabel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('referer')
                    ->translateLabel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('user_ip_address')
                    ->label('Ip address')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
            //
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUtmVisits::route('/'),
            // 'create' => Pages\CreateUtmVisit::route('/create'),
            // 'edit' => Pages\EditUtmVisit::route('/{record}/edit'),
        ];
    }
}
