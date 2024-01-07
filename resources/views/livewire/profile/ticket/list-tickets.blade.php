<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('My tickets') }}
    </h2>
</x-slot>

<div class="container mx-auto my-8">
    <div class="flex flex-col gap-y-4">
        @forelse ($tickets as $ticket)
        <div class="col-span-12">
            <x-card>
                <div class="flex gap-4">
                    <x-heroicon-o-ticket class="w-8 h-8 my-auto" />
                    <div class="-my-5 border border-2 border-gray-100 border-dashed border-left"></div>
                    <div class="grid items-center w-full grid-cols-12 lg:gap-6">
                        <h2 class="h-8 col-span-12 text-lg font-semibold md:col-span-3">
                            {{ $ticket->ticket_title }}
                        </h2>
                        <div class="grid items-center grid-cols-12 col-span-12 gap-4 md:col-span-9">
                            <div class="flex flex-col col-span-12 gap-1 md:col-span-5 lg:col-span-4">
                                <div class="flex md:flex-col lg:gap-2 lg:flex-row">
                                    <p class="text-sm text-gray-500">{{ __('Name') }}:</p>
                                    <p class="text-sm text-gray-800">{{ $ticket->data->data->first_name . ' ' . $ticket->data->data->last_name }}</p>
                                </div>
                                <div class="flex md:flex-col lg:gap-2 lg:flex-row">
                                    <p class="text-sm text-gray-500">{{ __('Email') }}:</p>
                                    <p class="text-sm text-gray-800">{{ $ticket->data->data->email }}</p>
                                </div>
                            </div>

                            <div class="flex flex-col col-span-12 gap-1 md:col-span-4">
                                <div class="flex md:flex-col lg:gap-2 lg:flex-row">
                                    <p class="text-sm text-gray-500">{{ __('Ticket price') }}:</p>
                                    <p class="text-sm text-gray-800">{{ number_format($ticket->ticket_price) }} {{ __('Toman') }}</p>
                                </div>
                                <div class="flex md:flex-col lg:gap-2 lg:flex-row">
                                    <p class="text-sm text-gray-500">{{ __('Paid price') }}:</p>
                                    <p class="text-sm text-gray-800">{{ number_format($ticket->order_price) }} {{ __('Toman') }}</p>
                                </div>
                            </div>

                            @if(!empty($ticket->discount_code))
                            <div class="flex flex-col col-span-3 col-span-12 gap-1 lg:col-span-4">
                                <div class="flex md:flex-col lg:gap-2 lg:flex-row">
                                    <p class="text-sm text-gray-500">{{ __('Discount code') }}:</p>
                                    <p class="text-sm text-gray-800">{{ $ticket->discount_code }}</p>
                                </div>
                                @if($ticket->discount_price != 0)
                                <div class="flex md:flex-col lg:gap-2 lg:flex-row">
                                    <p class="text-sm text-gray-500">{{ __('Discount price') }}:</p>
                                    <p class="text-sm text-gray-800">{{ $ticket->discount_price }} {{ __('Toman') }}</p>
                                </div>
                                @endif
                                @if($ticket->discount_percentage != 0)
                                <div class="flex md:flex-col lg:gap-2 lg:flex-row">
                                    <p class="text-sm text-gray-500">{{ __('Discount percentage') }}:</p>
                                    <p class="text-sm text-gray-800">%{{ $ticket->discount_percentage }}</p>
                                </div>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </x-card>
        </div>
        @empty
            <x-empty-state :description="__('There are no tickets.')">
                <x-slot name="icon">
                    <x-heroicon-s-ticket class="w-24 h-24 mx-auto" />
                </x-slot>
            </x-empty-state>
        @endforelse
    </div>
</div>
