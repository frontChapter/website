<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum AttributeTypeEnum: string implements HasLabel
{
    case Job = 'job';
    case Company = 'company';
    case Bio = 'bio';
    case Link = 'link';
    case Instagram = 'instagram';
    case Linkedin = 'linkedin';
    case Resume = 'resume';

    public function getLabel(): string
    {
        return match ($this) {
            static::Job => __('Job'),
            static::Company => __('Company'),
            static::Bio => __('Bio'),
            static::Link => __('Site'),
            static::Instagram => __('Instagram'),
            static::Linkedin => __('Linkedin'),
            static::Resume => __('Resume'),
        };
    }

    public function inputType(): string
    {
        return match ($this) {
            static::Job => 'input.text',
            static::Company => 'input.text',
            static::Bio => 'textarea',
            static::Link => 'input.url',
            static::Instagram => 'input.url',
            static::Linkedin => 'input.url',
            static::Resume => 'input.url',
        };
    }

    public function iconName(): string
    {
        return match ($this) {
            static::Job => 'heroicon-o-briefcase',
            static::Company => 'heroicon-o-building-office-2',
            static::Bio => 'heroicon-o-identification',
            static::Link => 'heroicon-o-link',
            static::Instagram => 'heroicon-o-at-symbol',
            static::Linkedin => 'heroicon-o-at-symbol',
            static::Resume => 'heroicon-o-document-text',
        };
    }

    public function htmlValue(string $value): string
    {
        return match ($this) {
            static::Job => "<p class='overflow-hidden text-ellipsis'>$value</p>",
            static::Company => "<p class='overflow-hidden text-ellipsis'>$value</p>",
            static::Bio => "<p class='overflow-hidden text-ellipsis'>$value</p>",
            static::Link => "<a class='overflow-hidden text-ellipsis text-primary-500 hover:text-primary-600' href='$value'>$value</a>",
            static::Instagram => "<a class='overflow-hidden text-ellipsis text-primary-500 hover:text-primary-600' href='$value'>$value</a>",
            static::Linkedin => "<a class='overflow-hidden text-ellipsis text-primary-500 hover:text-primary-600' href='$value'>$value</a>",
            static::Resume => "<a class='overflow-hidden text-ellipsis text-primary-500 hover:text-primary-600' href='$value'>$value</a>",
        };
    }
}
