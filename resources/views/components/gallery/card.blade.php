@props([
    'title' => 'Project Title',
    'category' => 'Category',
    'date' => 'Jan 2026',
    'image' => null,
    'status' => 'coming-soon', // 'coming-soon', 'live', 'in-progress'
    'link' => null,
])

@php
    $statusLabels = [
        'coming-soon' => 'Coming Soon',
        'live' => 'Live',
        'in-progress' => 'In Progress',
    ];
    $statusLabel = $statusLabels[$status] ?? 'Coming Soon';
@endphp

<div class="group relative aspect-square rounded-lg overflow-hidden bg-zinc-800/50 border border-[#3A3A3A] hover:border-[#FDFBD8]/50 transition-all cursor-pointer">
    @if($image)
        <img src="{{ $image }}" alt="{{ $title }}" class="absolute inset-0 w-full h-full object-cover" />
    @else
        <div class="absolute inset-0 flex items-center justify-center">
            <span class="text-gray-500 text-sm font-['Bricolage_Grotesque',sans-serif]">{{ $statusLabel }}</span>
        </div>
    @endif
    
    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
    
    <div class="absolute bottom-0 left-0 right-0 p-3 translate-y-full group-hover:translate-y-0 transition-transform">
        <div class="flex items-center justify-between">
            <p class="text-white text-sm font-medium font-['Bricolage_Grotesque',sans-serif]">{{ $title }}</p>
            <p class="text-gray-500 text-xs font-['Bricolage_Grotesque',sans-serif]">{{ $date }}</p>
        </div>
        <p class="text-gray-400 text-xs font-['Bricolage_Grotesque',sans-serif]">{{ $category }}</p>
    </div>
</div>
