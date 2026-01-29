@props([
    'title',
    'description' => null,
    'price' => null,
    'cta' => 'View',
    'image' => null,
    'link' => '#',
    'stock' => null,
])

<a href="{{ $link }}" class="block group">
    <div class="backdrop-blur-md bg-[#252525]/80 border border-[#3A3A3A] rounded-lg overflow-hidden hover:border-[#FDFBD8]/50 transition-all">
        {{-- Product Image --}}
        <div class="aspect-square w-full bg-zinc-800 relative overflow-hidden">
            @if($image)
                <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            @else
                <div class="w-full h-full bg-gradient-to-br from-[#3A3A3A] to-[#252525] flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" class="text-gray-600">
                        <path d="M6 8h12l-1 12H7L6 8z"></path>
                        <path d="M9 8V6a3 3 0 0 1 6 0v2"></path>
                    </svg>
                </div>
            @endif
            
            {{-- Stock Badge (top-left) --}}
            @if($stock !== null)
                <div class="absolute top-2 left-2">
                    <span class="px-2 py-1 text-xs font-semibold bg-[#2D2D2D]/90 text-[#FDFBD8] rounded font-['Bricolage_Grotesque',sans-serif] border border-[#FDFBD8]/30">
                        {{ $stock }} left
                    </span>
                </div>
            @endif

            {{-- Price Badge (top-right) --}}
            <div class="absolute top-2 right-2">
                @if($price === 'sold-out')
                    <span class="px-2 py-1 text-xs font-semibold bg-gray-800/90 text-gray-400 rounded font-['Bricolage_Grotesque',sans-serif]">Sold Out</span>
                @elseif($price === null)
                    <span class="px-2 py-1 text-xs font-semibold bg-[#FF5349] text-white rounded font-['Bricolage_Grotesque',sans-serif]">FREE</span>
                @else
                    <span class="px-2 py-1 text-xs font-semibold bg-[#FDFBD8] text-[#2D2D2D] rounded font-['Bricolage_Grotesque',sans-serif]">${{ $price }}</span>
                @endif
            </div>
        </div>

        {{-- Content --}}
        <div class="p-4">
            <h3 class="text-white text-sm font-semibold font-['Bricolage_Grotesque',sans-serif] mb-1 group-hover:text-[#FDFBD8] transition-colors line-clamp-1">
                {{ $title }}
            </h3>
            @if($description)
                <p class="text-gray-400 text-xs font-['Bricolage_Grotesque',sans-serif] line-clamp-2 mb-3">
                    {{ $description }}
                </p>
            @endif
            
            {{-- CTA Button --}}
            <div class="flex items-center justify-between">
                <span class="text-xs text-[#FF5349] font-medium font-['Bricolage_Grotesque',sans-serif] group-hover:text-[#FDFBD8] transition-colors">
                    {{ $cta }} →
                </span>
            </div>
        </div>
    </div>
</a>
