@vite(['resources/js/canvas.js'])

<x-card cardClasses="text-center border border-primary-400" :title="__('🔥Share Poster')">
    <div class="w-0 h-0 overflow-hidden opacity-0">
        <div id="base-canvas-post" class="relative" style="width: 1080px; height: 1080px; background-image: url({{ asset('images/festival-post-back.jpg') }})">
            <img class="w-[180px] h-[180px] rounded-[28px] absolute top-[490px] right-[122px]" src="{{ $site->logo_url }}" alt="{{ $site->name }}" />
                <div class="absolute justify-center gap-4 max-w-[620px] max-h-[186px] h-[186px] top-[457px] right-[340px] flex flex-col">
                    <p class="text-5xl text-secondary-50 font-bold leading-snug">{{ $site->name }}</p>
                    <p class="text-3xl text-secondary-200 text-right" dir="ltr">{{ $site->url }}</p>
                </div>
                <div class="qrcode absolute top-[793px] right-[781px]">
                    {!! QrCode::size(150)->format('svg')->generate($shortUrl); !!}
            </div>
            <p class="absolute top-[876px] text-secondary-200 right-[119px] text-3xl" dir="ltr">{{ $shortUrl }}</p>
        </div>
    </div>
    <div class="w-0 h-0 overflow-hidden opacity-0">
        <div id="base-canvas-story" class="relative" style="width: 1080px; height: 1920px; background-image: url({{ asset('images/festival-story-back.jpg') }})">
            <img class="w-[272px] h-[272px] rounded-[28px] absolute top-[578.5px] right-[404px]" src="{{ $site->logo_url }}" alt="{{ $site->name }}" />
                <div class="absolute justify-center gap-8 text-center max-h-[186px] h-[186px] top-[850px] left-[140px] right-[140px] flex flex-col">
                    <p class="text-6xl font-bold text-secondary-50 leading-normal">{{ $site->name }}</p>
                    <p class="text-4xl text-secondary-200" dir="ltr">{{ $site->url }}</p>
                </div>
                <div class="qrcode absolute top-[1320px] right-[148px]">
                    {!! QrCode::size(150)->format('svg')->generate($shortUrl); !!}
            </div>
            <p class="absolute text-secondary-200 top-[1430px] right-[365px] text-3xl" dir="ltr">{{ $shortUrl }}</p>
        </div>
    </div>
    <div class="flex gap-4 poster-image" x-data>
        <div class="flex flex-col gap-2">
            <div id="base-post" class="w-full overflow-hidden rounded-lg h-ful max-w-64 max-h-64"></div>
            <a id="base-post-download" class="flex flex-col w-full" download="post.png">
                <x-button icon="download" @click="download('base-post')" :label="__('Download Image')" />
            </a>
        </div>
        <div class="flex flex-col gap-2">
            <div id="base-story" class="w-auto aspect-[9/16] overflow-hidden aspect rounded-lg h-ful max-w-64 max-h-64"></div>
            <a id="base-story-download" class="flex flex-col w-full" download="story.png">
                <x-button icon="download" @click="download('base-story')" :label="__('Download Image')" />
            </a>
        </div>
    </div>
</x-card>

<script>
    function download(id) {
        const download = document.getElementById(`${id}-download`);
        const image = document.getElementById(id).children[0].toDataURL("image/jpeg")
            .replace("image/jpeg", "image/octet-stream");
        download.setAttribute("href", image);
    }
</script>
