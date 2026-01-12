@props([
    'title' => 'Course Title',
    'description' => 'Course description',
    'price' => '$0',
    'buttonText' => 'View',
    'buttonLink' => '#',
    'icon' => 'graduation-cap',
])

<div class="group backdrop-blur-md bg-[#252525]/80 border border-[#3A3A3A] rounded-xl overflow-hidden hover:border-[#FF5349] transition-all duration-300">
    <div class="aspect-square bg-gradient-to-br from-[#FF5349]/20 to-[#1a1a1a] flex items-center justify-center overflow-hidden">
        <div class="w-full h-full bg-[#2a2a2a] flex items-center justify-center">
            {{ $slot }}
        </div>
    </div>
    <div class="p-2 flex flex-col h-full">
        <h3 class="text-lg font-bold text-white mb-2 font-['Bricolage_Grotesque',sans-serif]">{{ $title }}</h3>
        <p class="text-sm text-gray-300 mb-4 flex-grow font-['Bricolage_Grotesque',sans-serif]">{{ $description }}</p>
        <div class="flex items-center justify-between">
            <span class="text-2xl font-bold text-[#FF5349] font-['Bricolage_Grotesque',sans-serif]">{{ $price }}</span>
            <a href="{{ $buttonLink }}" target="_blank" rel="noopener noreferrer" class="px-4 py-2 bg-[#FF5349] text-white rounded-lg text-xs font-bold hover:bg-[#ff6b63] transition-colors font-['Bricolage_Grotesque',sans-serif]">{{ $buttonText }}</a>
        </div>
    </div>
</div>
