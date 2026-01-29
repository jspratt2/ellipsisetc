@props([
    'name' => 'Ellipsis Etcetera',
    'bio' => 'Seasonal drops, apparel & accessories ✨',
    'postCount' => 0,
    'products' => '10+',
    'since' => '2026',
])

<!-- Profile Section (Instagram-style) -->
<div class="max-w-lg mx-auto px-4 py-6 border-b border-[#3A3A3A]">
    <div class="flex items-center gap-6">
        <!-- Profile Image / Logo -->
        <img src="/images/Gemini_Generated_Image_e3v0xje3v0xje3v0.png" alt="Ellipsis Etc" class="flex-shrink-0 rounded-xl object-cover" style="width: 80px; height: 80px;" />
        <!-- Stats -->
        <div class="flex-1">
            <h2 class="text-white font-semibold text-lg font-['Bricolage_Grotesque',sans-serif] mb-2">{{ $name }}</h2>
            <div class="flex gap-6 text-sm">
                <div class="text-center">
                    <span class="text-white font-semibold" id="post-count">{{ $postCount }}</span>
                    <p class="text-gray-400 text-xs">items</p>
                </div>
                <div class="text-center">
                    <span class="text-white font-semibold">{{ $products }}</span>
                    <p class="text-gray-400 text-xs">products</p>
                </div>
                <div class="text-center">
                    <span class="text-white font-semibold">{{ $since }}</span>
                    <p class="text-gray-400 text-xs">since</p>
                </div>
            </div>
        </div>
    </div>
    <p class="text-gray-300 text-sm mt-4 font-['Bricolage_Grotesque',sans-serif]">{{ $bio }}</p>
    <p class="text-gray-500 text-xs mt-2 font-['Bricolage_Grotesque',sans-serif]">
        <span class="text-[#FF5349]">⚡</span> Newsletter subscribers get early access to new drops
    </p>
</div>
