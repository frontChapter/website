<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GiftResource\Pages;
use App\Models\Gift;
use Ariaieboy\FilamentJalaliDatetime\JalaliDateTimeColumn;
use Ariaieboy\FilamentJalaliDatetimepicker\Forms\Components\JalaliDatePicker;
use Ariaieboy\FilamentJalaliDatetimepicker\Forms\Components\JalaliDateTimePicker;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GiftResource extends Resource
{
    protected static ?string $model = Gift::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    public static function getModelLabel(): string
    {
        return __('Gift');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Gifts');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->required()
                    ->translateLabel()
                    ->relationship(name: 'user', titleAttribute: 'name')
                    ->searchable(['name', 'email']),
                Forms\Components\TextInput::make('title')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->translateLabel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->datalist([
                        'Liara',
                        'Pachim',
                        'Rocket',
                    ])
                    ->placeholder('Liara, Pachim, Rocket Or others...')
                    ->translateLabel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('value')
                    ->required()
                    ->translateLabel()
                    ->label('Discount amount')
                    ->maxLength(255),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->label('Discount code')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),
                JalaliDateTimePicker::make('expired_at')
                    ->required()
                    ->translateLabel()
                    ->required(),
                Forms\Components\TextInput::make('link')
                    ->nullable()
                    ->translateLabel()
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
                Tables\Columns\TextColumn::make('title')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('link')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                JalaliDateTimeColumn::make('expired_at')
                    ->sortable()
                    ->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                JalaliDateTimeColumn::make('created_at')
                    ->sortable()
                    ->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                JalaliDateTimeColumn::make('updated_at')
                    ->sortable()
                    ->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGifts::route('/'),
            'create' => Pages\CreateGift::route('/create'),
            'view' => Pages\ViewGift::route('/{record}'),
            'edit' => Pages\EditGift::route('/{record}/edit'),
        ];
    }
}
