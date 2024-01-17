<?php

namespace App\Listeners;

use App\Events\UtmCampaignVisited;
use App\Models\UtmVisit;
use Illuminate\Support\Facades\Log;

class CreateUtmVisitRecord
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UtmCampaignVisited $event): void
    {
        UtmVisit::create([
            'user_ip_address' => $event->userIpAddress,
            'utm_campaign' => $event->utmCampaign,
            'utm_medium' => $event->utmMedium,
            'utm_source' => $event->utmSource,
            'utm_term' => $event->utmTerm,
            'utm_content' => $event->utmContent,
            'referer' => $event->referer,
            'user_id' => $event->userId,
        ]);
    }
}
