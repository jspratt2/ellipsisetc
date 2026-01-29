@props(['label' => 'Go back', 'style' => 'header'])

@if($style === 'header')
{{-- Header style: Used on shop, gallery, clients, courses --}}
<header class="sticky top-0 z-50 bg-[#2D2D2D]/80 backdrop-blur-md border-b border-[#3A3A3A]">
    <div class="max-w-lg mx-auto px-4 py-3 flex items-center gap-4">
        <a href="javascript:void(0)" onclick="window.history.length > 1 ? window.history.back() : window.location.href = '/'" class="flex items-center text-white hover:text-[#FDFBD8] transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m12 19-7-7 7-7" />
                <path d="M19 12H5" />
            </svg>
        </a>
        <div class="px-4 py-1.5 h-9 text-sm rounded-lg border border-zinc-700 text-white font-['Bricolage_Grotesque',sans-serif] flex items-center backdrop-blur-md bg-zinc-800/70">
            {{ $label }}
        </div>
    </div>
</header>
@else
{{-- Floating style: Used on mayhemprojects, trading --}}
<div class="w-full max-w-md sticky top-0 z-10 pt-4 pb-1 rounded-t-lg bg-transparent">
    <div class="relative">
        <a href="javascript:void(0)" onclick="window.history.length > 1 ? window.history.back() : window.location.href = '/'" class="pl-3 pr-9 py-1.5 h-9 text-sm rounded-lg border border-zinc-700 text-white font-['Bricolage_Grotesque',sans-serif] flex items-center cursor-pointer backdrop-blur-md bg-zinc-800/70 hover:border-[#FDFBD8] transition-colors" tabindex="0">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-[#FDFBD8]">
                <path d="m12 19-7-7 7-7" />
                <path d="M19 12H5" />
            </svg>
            {{ $label }}
        </a>
    </div>
</div>
@endif
