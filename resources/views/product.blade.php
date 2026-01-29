<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} - {{ $product['title'] }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=bricolage-grotesque:400,500,600,700" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <style>
            .size-btn.selected {
                background-color: #FDFBD8;
                color: #2D2D2D;
                border-color: #FDFBD8;
            }
        </style>
    </head>
    <body class="bg-[#2D2D2D] overflow-hidden h-full">
        <div class="min-h-screen w-screen flex flex-col bg-[#2D2D2D] relative">
            <main class="flex-1 flex flex-col items-center justify-center p-4 relative gap-8">
                <div class="w-full max-w-xl z-10 relative pt-8">
                    <div class="w-full max-w-xl mx-auto font-['Bricolage_Grotesque',sans-serif] relative z-10">
                        <div class="relative flex flex-col justify-start items-center min-h-[300px]">
                            {{-- Header with back button --}}
                            <div class="w-full max-w-md sticky top-0 z-10 pt-4 pb-1 rounded-t-lg bg-transparent">
                                <div class="relative">
                                    <a href="/shop" class="pl-3 pr-9 py-1.5 h-9 text-sm rounded-lg border border-zinc-700 text-white font-['Bricolage_Grotesque',sans-serif] flex items-center cursor-pointer backdrop-blur-md bg-zinc-800/70 hover:border-[#FDFBD8]/50 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-gray-400">
                                            <path d="m12 19-7-7 7-7"/>
                                            <path d="M19 12H5"/>
                                        </svg>
                                        <span class="text-gray-400">Back to Shop</span>
                                    </a>
                                </div>
                            </div>
                            
                            {{-- Product Card --}}
                            <div class="w-full max-w-md">
                                <div class="w-full rounded-b-xl shadow-sm overflow-hidden backdrop-blur-md bg-[#252525]/80 border border-[#3A3A3A]" style="opacity: 1; height: auto;">
                                    
                                    {{-- Product Image --}}
                                    <div class="relative aspect-square w-full overflow-hidden bg-[#1a1a1a]">
                                        @if($product['image'])
                                            <img 
                                                src="{{ $product['image'] }}" 
                                                alt="{{ $product['title'] }}" 
                                                class="w-full h-full object-cover"
                                            >
                                        @else
                                            <div class="w-full h-full bg-gradient-to-br from-[#3A3A3A] to-[#252525] flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" class="text-gray-600">
                                                    <path d="M6 8h12l-1 12H7L6 8z"></path>
                                                    <path d="M9 8V6a3 3 0 0 1 6 0v2"></path>
                                                </svg>
                                            </div>
                                        @endif
                                        
                                        {{-- Stock Badge --}}
                                        @if(isset($product['stock']) && $product['stock'] !== null)
                                            <div class="absolute top-3 left-3">
                                                <span class="px-2 py-1 text-xs font-bold bg-[#2D2D2D]/90 text-[#FF5349] rounded-full border border-[#FF5349]/30">
                                                    Only {{ $product['stock'] }} left
                                                </span>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Product Info --}}
                                    <div class="px-4 py-4">
                                        {{-- Category --}}
                                        @if(isset($product['category']))
                                            <span class="text-xs text-[#FF5349] uppercase tracking-wider mb-1 block">{{ $product['category'] }}</span>
                                        @endif

                                        {{-- Title & Price Row --}}
                                        <div class="flex items-start justify-between gap-4 mb-3">
                                            <h1 class="text-lg font-bold text-[#FDFBD8] leading-tight">{{ $product['title'] }}</h1>
                                            <div class="flex-shrink-0">
                                                @if($product['price'] === 'sold-out')
                                                    <span class="text-lg font-bold text-gray-500">Sold Out</span>
                                                @elseif($product['price'] === null)
                                                    <span class="text-lg font-bold text-[#FF5349]">FREE</span>
                                                @else
                                                    <span class="text-lg font-bold text-[#FDFBD8]">${{ $product['price'] }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- Description --}}
                                        @if($product['description'])
                                            <p class="text-xs text-gray-400 mb-4 leading-relaxed">{{ Str::limit($product['description'], 120) }}</p>
                                        @endif

                                        {{-- Size Selector (compact) --}}
                                        @if(isset($product['sizes']) && count($product['sizes']) > 0)
                                            <div class="mb-4">
                                                <span class="text-xs text-gray-500 uppercase tracking-wider mb-2 block">Size</span>
                                                <div class="flex flex-wrap gap-1.5">
                                                    @foreach($product['sizes'] as $index => $size)
                                                        <button 
                                                            class="size-btn px-3 py-1.5 border border-[#3A3A3A] rounded text-xs font-medium text-gray-300 hover:border-[#FDFBD8] hover:text-[#FDFBD8] transition-all {{ $index === 0 ? 'selected' : '' }}"
                                                            onclick="selectSize(this)"
                                                        >
                                                            {{ $size }}
                                                        </button>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                        {{-- CTA Button --}}
                                        @if($product['price'] !== 'sold-out')
                                            <button class="w-full py-3 bg-[#FF5349] text-white font-bold rounded-lg hover:bg-[#ff6b63] transition-all text-sm shadow-lg shadow-[#FF5349]/20 hover:shadow-[#FF5349]/30 active:scale-[0.98]">
                                                {{ $product['cta'] }}
                                            </button>
                                        @else
                                            <button class="w-full py-3 bg-gray-700 text-gray-400 font-bold rounded-lg cursor-not-allowed text-sm" disabled>
                                                Sold Out
                                            </button>
                                        @endif
                                    </div>

                                    {{-- Footer --}}
                                    <div class="border-t border-[#3A3A3A] px-4 py-3">
                                        <div class="flex items-center justify-between text-xs text-gray-500 font-['Bricolage_Grotesque',sans-serif]">
                                            <span>&copy; 2026 Ellipsis Etcetera</span>
                                            <div class="flex items-center gap-3">
                                                <span class="flex items-center gap-1 text-gray-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[#FDFBD8]">
                                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                    </svg>
                                                    Secure
                                                </span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4 text-[#FDFBD8] hover:text-white">
                                                    <circle cx="6" cy="12" r="2" />
                                                    <circle cx="12" cy="12" r="2" />
                                                    <circle cx="18" cy="12" r="2" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script>
            // Size Selection
            function selectSize(btn) {
                document.querySelectorAll('.size-btn').forEach(el => {
                    el.classList.remove('selected');
                });
                btn.classList.add('selected');
            }
        </script>
    </body>
</html>
