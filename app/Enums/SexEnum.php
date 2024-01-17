<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum SexEnum: string implements HasLabel
{
    case Unknown = 'unknown';
    case Woman = 'woman';
    case Man = 'man';
    case Other = 'other';

    public function getLabel(): ?string
    {
        return match ($this) {
            static::Unknown => __('Unknown'),
            static::Woman => __('Woman'),
            static::Man => __('Man'),
            static::Other => __('Other'),
        };
    }
}
