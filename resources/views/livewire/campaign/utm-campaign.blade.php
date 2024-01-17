<div class="container px-2 mx-auto md:max-w-3xl">
    @if($utmCampaign)
    <x-card cardClasses="mt-5 text-center" headerClasses="!justify-center border-b dark:border-secondary-700" type="warning" :title="$utmCampaign->title">
        <p>{{ $utmCampaign->description }}</p>
    </x-card>
    @endif
</div>
