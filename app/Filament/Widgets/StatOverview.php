<?php

namespace App\Filament\Widgets;

use App\Models\Ticket;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(
                __('All Users'),
                __(':number people', ['number' => number_format(User::count())])
            )
                ->icon('heroicon-o-users')
                ->chartColor('primary')
                ->chart(User::selectRaw('DATE(created_at) as date, COUNT(*) as count')->groupBy('date')->limit(5)->pluck('count')->toArray())
                ->color('primary'),

            Stat::make(
                __('Sale Tickets'),
                __(':number Tickets', ['number' => number_format(Ticket::count())])
            )
                ->icon('heroicon-o-ticket')
                ->chartColor('primary')
                ->chart(Ticket::selectRaw('DATE(created_at) as date, COUNT(*) as count')->groupBy('date')->limit(5)->pluck('count')->toArray())
                ->color('primary'),

            Stat::make(
                __('Sale :title', ['title' => 'بلیت زود هنگام همایش']),
                __(':number Tickets', [
                    'number' => number_format(Ticket::whereJsonContains('data->data->ticket_id', '275704')->count()),
                ])
            )
                ->icon('heroicon-o-receipt-percent')
                ->chartColor('primary')
                ->chart(Ticket::selectRaw('DATE(created_at) as date, COUNT(*) as count')->groupBy('date')->whereJsonContains('data->data->ticket_id', '275704')->limit(5)->pluck('count')->toArray())
                ->color('primary'),
        ];
    }
}
