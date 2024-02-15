<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum FestivalSiteStatus: string implements HasLabel {
    case PENDING = 'pending';
    case PUBLISHED = 'published';
    case BANNED = 'banned';

    public function getLabel(): string
    {
        return match ($this) {
            static::PENDING => __('pending'),
            static::PUBLISHED => __('published'),
            static::BANNED => __('banned'),
        };
    }

    public function iconName(): string
    {
        return match ($this) {
            static::PENDING => 'heroicon-o-briefcase',
            static::PUBLISHED => 'heroicon-o-briefcase',
            static::BANNED => 'heroicon-o-briefcase',
        };
    }
}
