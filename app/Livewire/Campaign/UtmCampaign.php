<?php

namespace App\Livewire\Campaign;

use App\Models\UtmCampaign as ModelsUtmCampaign;
use Livewire\Component;

class UtmCampaign extends Component
{
    public ModelsUtmCampaign $utmCampaign;

    public function mount()
    {
        if(request()->has('utm_campaign')) {
            $utmCampaign = ModelsUtmCampaign::whereUtmCampaign(request()->get('utm_campaign'))->first();

            if(!is_null($utmCampaign)) {
                $this->utmCampaign = $utmCampaign;
            }
        }
    }

    public function render()
    {
        return view('livewire.campaign.utm-campaign');
    }
}
