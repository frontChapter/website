<?php

namespace App\Filament\Resources;

use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource\RelationManager\RoleRelationManager;
use App\Enums\SexEnum;
use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Ariaieboy\FilamentJalaliDatetime\JalaliDateTimeColumn;
use Ariaieboy\FilamentJalaliDatetimepicker\Forms\Components\JalaliDatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return __('User');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Users');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(['md' => 2])
                    ->schema([
                        TextInput::make('first_name')
                            ->required()
                            ->maxLength(255)
                            ->lazy()
                            ->translateLabel(),
                        TextInput::make('last_name')
                            ->required()
                            ->maxLength(255)
                            ->lazy()
                            ->translateLabel(),
                        TextInput::make('email')
                            ->required()
                            ->maxLength(255)
                            ->lazy()
                            ->columnSpan(2)
                            ->translateLabel(),
                        TextInput::make('username')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2)
                            ->lazy()
                            ->translateLabel(),
                        JalaliDatePicker::make('birth_date')
                            ->columnSpan(2)
                            ->lazy()
                            ->translateLabel(),
                        Select::make('sex')
                            ->translateLabel()
                            ->options(SexEnum::class)
                            ->columnSpan(2)
                            ->enum(SexEnum::class)
                            ->default(SexEnum::Unknown)
                            ->native(false),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('last_name')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('age')
                    ->translateLabel()
                    ->sortable(['birth_date'])
                    ->searchable(),
                TextColumn::make('sex')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                JalaliDateTimeColumn::make('email_verified_at')->dateTime()
                    ->translateLabel()
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Action::make('View')
                    ->translateLabel()
                    ->icon('heroicon-o-eye')
                    ->url(fn(User $record): string => route('profile', $record->username))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RoleRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            // 'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
