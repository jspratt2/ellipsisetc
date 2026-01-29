@props([
    'index' => 0,
    'item' => [],
    'totalItems' => 1,
    'detailUrl' => null,
    'profileImage' => '/images/Gemini_Generated_Image_e3v0xje3v0xje3v0.png',
    'profileName' => 'Ellipsis Etcetera',
])

@php
    $images = $item['images'] ?? [];
    $title = $item['title'] ?? '';
    $category = $item['category'] ?? '';
@endphp

<div class="post-item" data-index="{{ $index }}" data-images="{{ json_encode($images) }}" style="height: 100vh; scroll-snap-align: start; scroll-snap-stop: always; display: flex; flex-direction: column; position: relative;">
    <!-- Media Carousel -->
    <div class="media-carousel" style="position: absolute; inset: 0; overflow: hidden;">
        <div class="carousel-track" style="display: flex; height: 100%; width: {{ count($images) * 100 }}%; transition: transform 0.3s ease-out;">
            @foreach($images as $imgIndex => $image)
            <div style="width: {{ 100 / count($images) }}%; height: 100%; flex-shrink: 0;">
                <img src="{{ $image }}" alt="{{ $title }} - Image {{ $imgIndex + 1 }}" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
            @endforeach
        </div>
        <!-- Gradient overlay for text readability -->
        <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 40%, transparent 60%, rgba(0,0,0,0.4) 100%); pointer-events: none;"></div>
    </div>
    
    <!-- Media Indicators (dots) -->
    @if(count($images) > 1)
    <div class="media-indicators" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: flex; gap: 6px; z-index: 5;">
        @foreach($images as $imgIndex => $image)
        <div class="indicator-dot" data-slide="{{ $imgIndex }}" style="width: 8px; height: 8px; border-radius: 50%; background: {{ $imgIndex === 0 ? 'white' : 'rgba(255,255,255,0.4)' }}; transition: background 0.2s;"></div>
        @endforeach
    </div>
    @endif
    
    <!-- Post Info - Bottom -->
    <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 24px; padding-bottom: 40px; z-index: 5;">
        <div class="flex items-center gap-3 mb-3">
            <img src="{{ $profileImage }}" alt="{{ $profileName }}" class="flex-shrink-0 rounded-xl object-cover" style="width: 40px; height: 40px;" />
            <span class="text-white text-sm font-semibold font-['Bricolage_Grotesque',sans-serif]">{{ $profileName }}</span>
        </div>
        @if($detailUrl)
        <a href="{{ $detailUrl }}" class="block cursor-pointer hover:opacity-80 transition-opacity">
        @endif
            <div class="flex items-end justify-between">
                <div>
                    <p class="text-white text-lg font-semibold font-['Bricolage_Grotesque',sans-serif]">{{ $title }}</p>
                    <p class="text-gray-300 text-sm font-['Bricolage_Grotesque',sans-serif] mt-1">{{ $category }}</p>
                    {{-- Custom content slot --}}
                    {{ $slot }}
                </div>
                @if($detailUrl)
                <span class="text-[#FDFBD8] text-sm font-['Bricolage_Grotesque',sans-serif]">view more...</span>
                @endif
            </div>
        @if($detailUrl)
        </a>
        @endif
    </div>
    
    <!-- Post Counter -->
    <div style="position: absolute; top: 60px; right: 16px; z-index: 5;" class="text-white/70 text-xs font-['Bricolage_Grotesque',sans-serif]">
        {{ $index + 1 }} / {{ $totalItems }}
    </div>
</div>
