<?php

namespace App\Enums;

enum SexEnum: string
{
    case Unknown = 'unknown';
    case Woman = 'woman';
    case Man = 'man';
    case Other = 'other';

    public function label(): string
    {
        return match ($this) {
            static::Unknown => __('Unknown'),
            static::Woman => __('Woman'),
            static::Man => __('Man'),
            static::Other => __('Other'),
        };
    }
}
