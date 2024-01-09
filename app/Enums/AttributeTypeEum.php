<?php

namespace App\Enums;

enum AttributeTypeEum: string
{
    case Link = 'link';
    case Instagram = 'instagram';
    case Linkedin = 'linkedin';
    case Resume = 'resume';
    case Bio = 'bio';
    case Job = 'job';
    case Company = 'company';

    public function label(): string
    {
        return match ($this) {
            static::Link => __('Link'),
            static::Instagram => __('Instagram'),
            static::Linkedin => __('Linkedin'),
            static::Resume => __('Resume'),
            static::Bio => __('Bio'),
            static::Job => __('Job'),
            static::Company => __('Working Company Name'),
        };
    }

    public function inputType(): string
    {
        return match ($this) {
            static::Link => 'input.url',
            static::Instagram => 'input.url',
            static::Linkedin => 'input.url',
            static::Resume => 'input.url',
            static::Bio => 'textarea',
            static::Job => 'input.text',
            static::Company => 'input.text',
        };
    }

    public function iconName(): string
    {
        return match ($this) {
            static::Link => 'heroicon-o-link',
            static::Instagram => 'heroicon-o-at-symbol',
            static::Linkedin => 'heroicon-o-at-symbol',
            static::Resume => 'heroicon-o-document-text',
            static::Bio => 'heroicon-o-identification',
            static::Job => 'heroicon-o-briefcase',
            static::Company => 'heroicon-o-building-office-2',
        };
    }

    public function htmlValue(string $value): string
    {
        return match ($this) {
            static::Link => "<a class='overflow-hidden text-ellipsis text-primary-500 hover:text-primary-600' href='$value'>$value</a>",
            static::Instagram => "<a class='overflow-hidden text-ellipsis text-primary-500 hover:text-primary-600' href='$value'>$value</a>",
            static::Linkedin => "<a class='overflow-hidden text-ellipsis text-primary-500 hover:text-primary-600' href='$value'>$value</a>",
            static::Resume => "<a class='overflow-hidden text-ellipsis text-primary-500 hover:text-primary-600' href='$value'>$value</a>",
            static::Bio => "<p class='overflow-hidden text-ellipsis'>$value</p>",
            static::Job => "<p class='overflow-hidden text-ellipsis'>$value</p>",
            static::Company => "<p class='overflow-hidden text-ellipsis'>$value</p>",
        };
    }
}
