<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Models\Ticket;
use Ariaieboy\FilamentJalaliDatetime\JalaliDateTimeColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    public static function getModelLabel(): string
    {
        return __('Ticket');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Tickets');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->translateLabel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ticket_title')
                    ->required()
                    ->translateLabel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ticket_price')
                    ->required()
                    ->translateLabel()
                    ->maxLength(255),
                Forms\Components\Textarea::make('ticket_description')
                    ->maxLength(65535)
                    ->translateLabel()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('discount_code')
                    ->translateLabel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('discount_percentage')
                    ->translateLabel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('discount_price')
                    ->translateLabel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('order_price')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('data')
                    ->translateLabel()
                    ->required()
                    ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('price')
                    ->searchable()
                    ->sortable()
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('ticket_title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('ticket_price')
                    ->sortable()
                    ->translateLabel()
                    ->formatStateUsing(fn(string $state): string => number_format($state) . ' ' . __('Toman'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount_code')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn(string $state): string => $state . '%')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount_percentage')
                    ->sortable()
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount_price')
                    ->sortable()
                    ->translateLabel()
                    ->formatStateUsing(fn(string $state): string => number_format($state) . ' ' . __('Toman'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('order_price')
                    ->label('Price')
                    ->sortable()
                    ->translateLabel()
                    ->formatStateUsing(fn(string $state): string => number_format($state) . ' ' . __('Toman'))
                    ->searchable(),
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
                SelectFilter::make('user')
                    ->translateLabel()
                    ->relationship('user', 'first_name', fn (Builder $query) => $query->selectRaw("users.id, email, CONCAT(users.first_name , ' ' , users.last_name) as first_name"))
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTickets::route('/'),
            // 'create' => Pages\CreateTicket::route('/create'),
            'edit' => Pages\EditTicket::route('/{record}/edit'),
        ];
    }
}
