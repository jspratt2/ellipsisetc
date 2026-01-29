<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} - Trading</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Alpine.js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <style>
            .profit { color: #4ade80; }
            .loss { color: #f87171; }
            .shimmer-text {
                background: linear-gradient(90deg, #9ca3af 0%, #ffffff 50%, #9ca3af 100%);
                background-size: 200% auto;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                animation: shimmer 3s linear infinite;
            }
            @keyframes shimmer {
                0% { background-position: 200% center; }
                100% { background-position: -200% center; }
            }
            .pulse-green {
                animation: pulse-green 2s ease-in-out infinite;
            }
            @keyframes pulse-green {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.6; }
            }
        </style>
    </head>
    <body class="bg-[#2D2D2D] overflow-hidden h-full">
        <script>((e,t,r,n,a,o,l,i)=>{let u=document.documentElement,s=["light","dark"];function c(t){(Array.isArray(e)?e:[e]).forEach(e=>{let r="class"===e,n=r&&o?a.map(e=>o[e]||e):a;r?(u.classList.remove(...n),u.classList.add(o&&o[t]?o[t]:t)):u.setAttribute(e,t)}),i&&s.includes(t)&&(u.style.colorScheme=t)}if(n)c(n);else try{let e=localStorage.getItem(t)||r,n=l&&"system"===e?window.matchMedia("(prefers-color-scheme: dark)").matches?"dark":"light":e;c(n)}catch(e){}})("class","theme","dark",null,["light","dark"],null,false,true)</script>
        <div class="min-h-screen w-screen flex flex-col bg-[#2D2D2D] relative">
            <main class="flex-1 flex flex-col items-center justify-center p-4 relative gap-8">
                <div class="w-full max-w-xl z-10 relative pt-8">
                    <div class="w-full max-w-xl mx-auto font-['Bricolage_Grotesque',sans-serif] relative z-10">
                        <div class="relative flex flex-col justify-start items-center min-h-[300px]">
                            <x-back-button label="Trading Hub" style="floating" />
                            <div class="w-full max-w-md">
                                <div class="w-full rounded-b-xl shadow-sm overflow-hidden backdrop-blur-md bg-[#252525]/80 border border-[#3A3A3A]" style="opacity: 1; height: auto;">
                                    
                                    <!-- Portfolio Stats Section -->
                                    <div class="px-3 py-2 border-b border-[#3A3A3A]">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FDFBD8]">
                                                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                                                </svg>
                                                <span class="text-xs font-medium text-gray-400 font-['Bricolage_Grotesque',sans-serif]">PORTFOLIO</span>
                                            </div>
                                            <div class="flex items-center gap-4">
                                                <div class="text-right">
                                                    <p class="text-sm font-bold text-white font-['Bricolage_Grotesque',sans-serif]">$12,847</p>
                                                    <p class="text-[10px] profit font-['Bricolage_Grotesque',sans-serif]">+24.5%</p>
                                                </div>
                                                <div class="text-right border-l border-[#3A3A3A] pl-4">
                                                    <p class="text-sm font-bold profit font-['Bricolage_Grotesque',sans-serif]">+$847</p>
                                                    <p class="text-[10px] text-gray-400 font-['Bricolage_Grotesque',sans-serif]">24h</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Active Holdings -->
                                    <div class="px-3 py-2 border-b border-[#3A3A3A]">
                                        <div class="flex items-center justify-between mb-1">
                                            <div class="flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FDFBD8]">
                                                    <circle cx="8" cy="8" r="6"/>
                                                    <path d="M18.09 10.37A6 6 0 1 1 10.34 18"/>
                                                    <path d="M7 6h1v4"/>
                                                    <path d="m16.71 13.88.7.71-2.82 2.82"/>
                                                </svg>
                                                <span class="text-xs font-medium text-gray-400 font-['Bricolage_Grotesque',sans-serif]">POSITIONS</span>
                                            </div>
                                        </div>
                                        <div class="space-y-1">
                                            <div class="flex items-center justify-between py-1 px-1 rounded hover:bg-zinc-800/30 transition-colors">
                                                <div class="flex items-center gap-2">
                                                    <div class="w-5 h-5 rounded-full bg-gradient-to-r from-orange-400 to-yellow-400 flex items-center justify-center text-[10px]">🐕</div>
                                                    <span class="text-xs text-white font-['Bricolage_Grotesque',sans-serif]">DOGE</span>
                                                    <span class="text-[10px] text-gray-500 font-['Bricolage_Grotesque',sans-serif]">42K</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="text-xs text-white font-['Bricolage_Grotesque',sans-serif]">$4,200</span>
                                                    <span class="text-[10px] profit font-['Bricolage_Grotesque',sans-serif] w-10 text-right">+18.3%</span>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between py-1 px-1 rounded hover:bg-zinc-800/30 transition-colors">
                                                <div class="flex items-center gap-2">
                                                    <div class="w-5 h-5 rounded-full bg-gradient-to-r from-green-400 to-emerald-400 flex items-center justify-center text-[10px]">🐸</div>
                                                    <span class="text-xs text-white font-['Bricolage_Grotesque',sans-serif]">PEPE</span>
                                                    <span class="text-[10px] text-gray-500 font-['Bricolage_Grotesque',sans-serif]">5.2M</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="text-xs text-white font-['Bricolage_Grotesque',sans-serif]">$3,847</span>
                                                    <span class="text-[10px] profit font-['Bricolage_Grotesque',sans-serif] w-10 text-right">+42.1%</span>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between py-1 px-1 rounded hover:bg-zinc-800/30 transition-colors">
                                                <div class="flex items-center gap-2">
                                                    <div class="w-5 h-5 rounded-full bg-gradient-to-r from-blue-400 to-purple-400 flex items-center justify-center text-[10px]">🦊</div>
                                                    <span class="text-xs text-white font-['Bricolage_Grotesque',sans-serif]">SHIB</span>
                                                    <span class="text-[10px] text-gray-500 font-['Bricolage_Grotesque',sans-serif]">180M</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="text-xs text-white font-['Bricolage_Grotesque',sans-serif]">$2,800</span>
                                                    <span class="text-[10px] loss font-['Bricolage_Grotesque',sans-serif] w-10 text-right">-5.2%</span>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between py-1 px-1 rounded hover:bg-zinc-800/30 transition-colors">
                                                <div class="flex items-center gap-2">
                                                    <div class="w-5 h-5 rounded-full bg-gradient-to-r from-purple-400 to-pink-400 flex items-center justify-center text-[10px]">⚡</div>
                                                    <span class="text-xs text-white font-['Bricolage_Grotesque',sans-serif]">SOL</span>
                                                    <span class="text-[10px] text-gray-500 font-['Bricolage_Grotesque',sans-serif]">12</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="text-xs text-white font-['Bricolage_Grotesque',sans-serif]">$2,000</span>
                                                    <span class="text-[10px] profit font-['Bricolage_Grotesque',sans-serif] w-10 text-right">+8.7%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Trading Courses -->
                                    <ul class="font-['Bricolage_Grotesque',sans-serif]">
                                        <li class="px-3 py-2 hover:bg-zinc-800/50 rounded-md font-['Bricolage_Grotesque',sans-serif] action-item" style="opacity: 1; transform: none;">
                                            <a href="#" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between w-full cursor-pointer">
                                                <div class="flex items-center gap-2 justify-between">
                                                    <div class="flex items-center gap-2">
                                                        <span class="text-gray-300">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap h-4 w-4 text-[#FDFBD8]">
                                                                <path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"></path>
                                                                <path d="M22 10v6"></path>
                                                                <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"></path>
                                                            </svg>
                                                        </span>
                                                        <span class="text-sm text-white font-['Bricolage_Grotesque',sans-serif] action-item-label">
                                                            Meme Coin Mastery
                                                        </span>
                                                        <span class="text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif]">
                                                            Full Course
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif] shimmer-text">
                                                        Coming soon
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="px-3 py-2 hover:bg-zinc-800/50 rounded-md font-['Bricolage_Grotesque',sans-serif] action-item" style="opacity: 1; transform: none;">
                                            <a href="#" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between w-full cursor-pointer">
                                                <div class="flex items-center gap-2 justify-between">
                                                    <div class="flex items-center gap-2">
                                                        <span class="text-gray-300">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 text-[#FDFBD8]">
                                                                <path d="M3 3v18h18"/>
                                                                <path d="m19 9-5 5-4-4-3 3"/>
                                                            </svg>
                                                        </span>
                                                        <span class="text-sm text-white font-['Bricolage_Grotesque',sans-serif] action-item-label">
                                                            Day Trading Basics
                                                        </span>
                                                        <span class="text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif]">
                                                            Beginner
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif] shimmer-text">
                                                        Coming soon
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="px-3 py-2 hover:bg-zinc-800/50 rounded-md font-['Bricolage_Grotesque',sans-serif] action-item" style="opacity: 1; transform: none;">
                                            <a href="#" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between w-full cursor-pointer">
                                                <div class="flex items-center gap-2 justify-between">
                                                    <div class="flex items-center gap-2">
                                                        <span class="text-gray-300">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 text-[#FDFBD8]">
                                                                <path d="M12 20V10"/>
                                                                <path d="M18 20V4"/>
                                                                <path d="M6 20v-4"/>
                                                            </svg>
                                                        </span>
                                                        <span class="text-sm text-white font-['Bricolage_Grotesque',sans-serif] action-item-label">
                                                            Technical Analysis
                                                        </span>
                                                        <span class="text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif]">
                                                            Advanced
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="text-xs text-gray-400 font-['Bricolage_Grotesque',sans-serif] shimmer-text">
                                                        Coming soon
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                    <div class="border-t border-[#3A3A3A] my-2"></div>
                                    
                                    <!-- Resources & Tools -->
                                    <div class="px-3 pb-2">
                                        <h4 class="text-xs font-medium text-gray-400 mb-2 font-['Bricolage_Grotesque',sans-serif]">Resources & Tools</h4>
                                        <div class="flex flex-col gap-2">
                                            <a href="#" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-xs text-gray-400 hover:text-[#FDFBD8] font-['Bricolage_Grotesque',sans-serif]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3 w-3">
                                                    <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                                                    <polyline points="14 2 14 8 20 8"/>
                                                    <line x1="16" x2="8" y1="13" y2="13"/>
                                                    <line x1="16" x2="8" y1="17" y2="17"/>
                                                    <line x1="10" x2="8" y1="9" y2="9"/>
                                                </svg>
                                                <span>Trading Journal Template</span>
                                            </a>
                                            <a href="#" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-xs text-gray-400 hover:text-[#FDFBD8] font-['Bricolage_Grotesque',sans-serif]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3 w-3">
                                                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                                                    <polyline points="7.5 4.21 12 6.81 16.5 4.21"/>
                                                    <polyline points="7.5 19.79 7.5 14.6 3 12"/>
                                                    <polyline points="21 12 16.5 14.6 16.5 19.79"/>
                                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                                                    <line x1="12" x2="12" y1="22.08" y2="12"/>
                                                </svg>
                                                <span>Risk Calculator</span>
                                            </a>
                                            <a href="#" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-xs text-gray-400 hover:text-[#FDFBD8] font-['Bricolage_Grotesque',sans-serif]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3 w-3">
                                                    <circle cx="12" cy="12" r="10"/>
                                                    <path d="M12 16v-4"/>
                                                    <path d="M12 8h.01"/>
                                                </svg>
                                                <span>Coin Research Guide</span>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <!-- Follow for Updates -->
                                    <div class="border-t border-[#3A3A3A] pt-3 pb-2 px-3">
                                        <h4 class="text-xs font-medium text-gray-300 mb-2 font-['Bricolage_Grotesque',sans-serif]">Trading Community:</h4>
                                        <div class="flex flex-col gap-2">
                                            <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-xs text-gray-400 hover:text-[#FDFBD8] font-['Bricolage_Grotesque',sans-serif]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3 w-3">
                                                    <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/>
                                                </svg>
                                                <span>Twitter / X</span>
                                                <span class="text-[10px] text-green-400 pulse-green">● Live</span>
                                            </a>
                                            <a href="https://discord.com" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-xs text-gray-400 hover:text-[#FDFBD8] font-['Bricolage_Grotesque',sans-serif]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3 w-3">
                                                    <path d="M15 6.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                    <path d="M18 17.5v-1a4 4 0 0 0-4-4h-4a4 4 0 0 0-4 4v1"/>
                                                    <circle cx="12" cy="12" r="10"/>
                                                </svg>
                                                <span>Discord Community</span>
                                            </a>
                                            <a href="https://t.me" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-xs text-gray-400 hover:text-[#FDFBD8] font-['Bricolage_Grotesque',sans-serif]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3 w-3">
                                                    <path d="m22 2-7 20-4-9-9-4Z"/>
                                                    <path d="M22 2 11 13"/>
                                                </svg>
                                                <span>Telegram Alerts</span>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <!-- Footer -->
                                    <div class="px-3 py-2 border-t border-[#3A3A3A]">
                                        <div class="flex items-center justify-between text-xs text-gray-500 font-['Bricolage_Grotesque',sans-serif]">
                                            <span>&copy; 2026 Ellipsis Etcetera</span>
                                            <span class="text-[10px] text-gray-600">NFA · DYOR</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-reviews-carousel category="trading" />
            </main>
        </div>
    </body>
</html>
