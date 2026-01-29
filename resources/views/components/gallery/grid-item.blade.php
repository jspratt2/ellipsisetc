@props([
    'index' => 0,
    'item' => [],
    'showMultipleIndicator' => true,
])

@php
    $images = $item['images'] ?? [];
    $title = $item['title'] ?? '';
    $category = $item['category'] ?? '';
@endphp

<div class="gallery-item group cursor-pointer" onclick="openPostView({{ $index }})">
    <img
        src="{{ $images[0] ?? '' }}"
        alt="{{ $title }}"
        loading="{{ $index === 0 ? 'eager' : 'lazy' }}" />
    <div class="gallery-overlay">
        <div class="text-center px-2">
            <p class="text-white text-xs font-semibold font-['Bricolage_Grotesque',sans-serif]">{{ $title }}</p>
            <p class="text-gray-300 text-xs font-['Bricolage_Grotesque',sans-serif]">{{ $category }}</p>
        </div>
    </div>
    
    {{-- Custom overlay content from slot --}}
    {{ $slot }}
    
    {{-- Multiple images indicator --}}
    @if($showMultipleIndicator && count($images) > 1)
    <div style="position: absolute; top: 8px; right: 8px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="white" stroke="none" class="drop-shadow-lg">
            <rect x="3" y="3" width="15" height="15" rx="2" fill="none" stroke="white" stroke-width="2"/>
            <rect x="6" y="6" width="15" height="15" rx="2" fill="white" stroke="white" stroke-width="2"/>
        </svg>
    </div>
    @endif
</div>
