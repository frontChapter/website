<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\DetachBulkAction;
use Filament\Tables\Table;

class RoleRelationManager extends RelationManager
{
    protected static string $relationship = 'Role';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.name'))
                    ->required(),

                Select::make('guard_name')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.guard_name'))
                    ->options(config('filament-spatie-roles-permissions.guard_names'))
                    ->default(config('filament-spatie-roles-permissions.default_guard_name'))
                    ->required(),

                Select::make('permissions')
                    ->columnSpanFull()
                    ->multiple()
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.permissions'))
                    ->relationship(
                        name: 'permissions',
                        modifyQueryUsing: fn(Builder $query) => $query->orderBy('name')->orderBy('name'),
                    )
                    ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->name} ({$record->guard_name})")
                    ->searchable(['name', 'guard_name']) // searchable on both name and guard_name
                    ->preload(config('filament-spatie-roles-permissions.preload_permissions')),

                Select::make(config('permission.column_names.team_foreign_key', 'team_id'))
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.team'))
                    ->hidden(fn() => !config('permission.teams', false) || Filament::hasTenancy())
                    ->options(
                        fn() => config('filament-spatie-roles-permissions.team_model', App\Models\Team::class)::pluck('name', 'id')
                    )
                    ->dehydrated(fn($state) => (int) $state <= 0)
                    ->placeholder(__('filament-spatie-roles-permissions::filament-spatie.select-team'))
                    ->hint(__('filament-spatie-roles-permissions::filament-spatie.select-team-hint')),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('guard')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    DetachBulkAction::make(),
                ]),
            ]);
    }

    public function isReadOnly(): bool
    {
        return false;
    }
}
