<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} - Clients</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        /* Hide scrollbar */
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        html, body {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        html::-webkit-scrollbar, body::-webkit-scrollbar {
            display: none;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
        }

        .gallery-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            padding: 12px 0;
        }

        .gallery-item {
            aspect-ratio: 1;
            position: relative;
            overflow: hidden;
            background: #1a1a1a;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .list-item {
            display: flex;
            gap: 12px;
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: background 0.2s ease;
        }

        .list-item:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .list-item-thumbnail {
            width: 160px;
            height: 90px;
            flex-shrink: 0;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            background: #1a1a1a;
        }

        .list-item-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .list-item-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            gap: 4px;
            min-width: 0;
        }

        .list-item-title {
            font-size: 14px;
            font-weight: 600;
            color: white;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .list-item-meta {
            font-size: 12px;
            color: #9ca3af;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .list-item-client {
            font-size: 12px;
            font-weight: 500;
            color: #FDFBD8;
        }

        .view-toggle-btn {
            padding: 6px;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .view-toggle-btn.active {
            background: white;
            color: #2D2D2D;
        }

        .view-toggle-btn:not(.active) {
            color: #9ca3af;
        }

        .view-toggle-btn:not(.active):hover {
            color: white;
        }
    </style>
</head>

<body class="bg-[#2D2D2D] min-h-screen">
    <script>
        ((e, t, r, n, a, o, l, i) => {
            let u = document.documentElement,
                s = ["light", "dark"];

            function c(t) {
                (Array.isArray(e) ? e : [e]).forEach(e => {
                    let r = "class" === e,
                        n = r && o ? a.map(e => o[e] || e) : a;
                    r ? (u.classList.remove(...n), u.classList.add(o && o[t] ? o[t] : t)) : u.setAttribute(e, t)
                }), i && s.includes(t) && (u.style.colorScheme = t)
            }
            if (n) c(n);
            else try {
                let e = localStorage.getItem(t) || r,
                    n = l && "system" === e ? window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light" : e;
                c(n)
            } catch (e) {}
        })("class", "theme", "dark", null, ["light", "dark"], null, false, true)
    </script>

    <div class="min-h-screen w-full bg-[#2D2D2D]">
        <x-clients.profile />

        <!-- Tab Bar -->
        <div class="max-w-lg mx-auto border-b border-[#3A3A3A]">
            <div class="flex items-center justify-between px-4">
                <button class="flex-1 py-3 flex items-center justify-center gap-2 text-white border-b-2 border-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span class="text-xs font-medium">CLIENTS</span>
                </button>
                <div class="flex items-center gap-1">
                    <button id="grid-view-btn" onclick="setView('grid')" class="view-toggle-btn active" title="Grid view">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                        </svg>
                    </button>
                    <button id="list-view-btn" onclick="setView('list')" class="view-toggle-btn" title="List view">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="8" y1="6" x2="21" y2="6"></line>
                            <line x1="8" y1="12" x2="21" y2="12"></line>
                            <line x1="8" y1="18" x2="21" y2="18"></line>
                            <line x1="3" y1="6" x2="3.01" y2="6"></line>
                            <line x1="3" y1="12" x2="3.01" y2="12"></line>
                            <line x1="3" y1="18" x2="3.01" y2="18"></line>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Clients Grid -->
        <div class="max-w-lg mx-auto no-scrollbar" style="overflow-y: auto;">
            @php
            $clientItems = [
                [
                    'title' => 'Tech Startup Rebrand',
                    'category' => 'Branding',
                    'client' => 'NovaTech Inc.',
                    'images' => [
                        'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=800&h=800&fit=crop',
                        'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800&h=800&fit=crop',
                        'https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?w=800&h=800&fit=crop',
                    ],
                ],
                [
                    'title' => 'E-commerce Platform',
                    'category' => 'UI/UX Design',
                    'client' => 'StyleHub',
                    'images' => [
                        'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&h=800&fit=crop',
                        'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=800&fit=crop',
                    ],
                ],
                [
                    'title' => 'AI Content Strategy',
                    'category' => 'Marketing',
                    'client' => 'FutureMedia',
                    'images' => [
                        'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&h=800&fit=crop',
                    ],
                ],
                [
                    'title' => 'Product Launch Campaign',
                    'category' => 'Campaign',
                    'client' => 'Vitality Fitness',
                    'images' => [
                        'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=800&h=800&fit=crop',
                        'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=800&h=800&fit=crop',
                        'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=800&h=800&fit=crop',
                    ],
                ],
                [
                    'title' => 'Restaurant Brand Identity',
                    'category' => 'Branding',
                    'client' => 'Sakura Kitchen',
                    'images' => [
                        'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800&h=800&fit=crop',
                        'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800&h=800&fit=crop',
                    ],
                ],
                [
                    'title' => 'Mobile App Design',
                    'category' => 'UI/UX Design',
                    'client' => 'WellnessTrack',
                    'images' => [
                        'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=800&h=800&fit=crop',
                    ],
                ],
                [
                    'title' => 'Social Media Campaign',
                    'category' => 'Marketing',
                    'client' => 'Urban Threads',
                    'images' => [
                        'https://images.unsplash.com/photo-1611162617474-5b21e879e113?w=800&h=800&fit=crop',
                        'https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?w=800&h=800&fit=crop',
                    ],
                ],
                [
                    'title' => 'Corporate Website',
                    'category' => 'Web Development',
                    'client' => 'Apex Consulting',
                    'images' => [
                        'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=800&h=800&fit=crop',
                    ],
                ],
                [
                    'title' => 'Event Visual Package',
                    'category' => 'Design',
                    'client' => 'Summit Conference',
                    'images' => [
                        'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&h=800&fit=crop',
                        'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=800&h=800&fit=crop',
                        'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=800&h=800&fit=crop',
                    ],
                ],
            ];
            @endphp

            <!-- Grid View -->
            <div id="grid-view" class="gallery-grid">
                @foreach($clientItems as $index => $item)
                <div class="gallery-item group cursor-pointer" onclick="openPostView({{ $index }})">
                    <img
                        src="{{ $item['images'][0] }}"
                        alt="{{ $item['title'] }}"
                        loading="{{ $index === 0 ? 'eager' : 'lazy' }}" />
                    <div class="gallery-overlay">
                        <div class="text-center px-2">
                            <p class="text-white text-xs font-semibold font-['Bricolage_Grotesque',sans-serif]">{{ $item['title'] }}</p>
                            <p class="text-gray-300 text-xs font-['Bricolage_Grotesque',sans-serif]">{{ $item['client'] }}</p>
                        </div>
                    </div>
                    @if(count($item['images']) > 1)
                    <div style="position: absolute; top: 8px; right: 8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="white" stroke="none" class="drop-shadow-lg">
                            <rect x="3" y="3" width="15" height="15" rx="2" fill="none" stroke="white" stroke-width="2"/>
                            <rect x="6" y="6" width="15" height="15" rx="2" fill="white" stroke="white" stroke-width="2"/>
                        </svg>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>

            <!-- List View (YouTube-style) -->
            <div id="list-view" class="gallery-list" style="display: none;">
                @foreach($clientItems as $index => $item)
                <div class="list-item" onclick="openPostView({{ $index }})">
                    <div class="list-item-thumbnail">
                        <img
                            src="{{ $item['images'][0] }}"
                            alt="{{ $item['title'] }}"
                            loading="lazy" />
                        @if(count($item['images']) > 1)
                        <div style="position: absolute; top: 4px; right: 4px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="white" stroke="none" class="drop-shadow-lg">
                                <rect x="3" y="3" width="15" height="15" rx="2" fill="none" stroke="white" stroke-width="2"/>
                                <rect x="6" y="6" width="15" height="15" rx="2" fill="white" stroke="white" stroke-width="2"/>
                            </svg>
                        </div>
                        @endif
                    </div>
                    <div class="list-item-info font-['Bricolage_Grotesque',sans-serif]">
                        <p class="list-item-title">{{ $item['title'] }}</p>
                        <p class="list-item-meta">{{ $item['category'] }}</p>
                        <p class="list-item-client">{{ $item['client'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Mobile Post Scroll View -->
        <div id="post-scroll-view" class="fixed inset-0 bg-[#2D2D2D] z-50 hidden" style="overflow: hidden;">
            <!-- Header -->
            <div class="absolute top-0 left-0 right-0 bg-gradient-to-b from-black/60 to-transparent z-10 pointer-events-none" style="height: 80px;">
                <div class="px-4 py-3 flex items-center pointer-events-auto">
                    <button onclick="closePostView()" class="text-white hover:text-[#FDFBD8] transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m12 19-7-7 7-7"/>
                            <path d="M19 12H5"/>
                        </svg>
                    </button>
                    <span class="flex-1 text-center text-white font-semibold font-['Bricolage_Grotesque',sans-serif]">Clients</span>
                    <div class="w-6"></div>
                </div>
            </div>
            
            <!-- Scrollable Posts with Snap -->
            <div id="posts-container" style="height: 100%; overflow-y: auto; scroll-snap-type: y mandatory; -webkit-overflow-scrolling: touch;">
                @foreach($clientItems as $index => $item)
                <div class="post-item" data-index="{{ $index }}" data-images="{{ json_encode($item['images']) }}" style="height: 100vh; scroll-snap-align: start; scroll-snap-stop: always; display: flex; flex-direction: column; position: relative;">
                    <!-- Media Carousel -->
                    <div class="media-carousel" style="position: absolute; inset: 0; overflow: hidden;">
                        <div class="carousel-track" style="display: flex; height: 100%; width: {{ count($item['images']) * 100 }}%; transition: transform 0.3s ease-out;">
                            @foreach($item['images'] as $imgIndex => $image)
                            <div style="width: {{ 100 / count($item['images']) }}%; height: 100%; flex-shrink: 0;">
                                <img src="{{ $image }}" alt="{{ $item['title'] }} - Image {{ $imgIndex + 1 }}" style="width: 100%; height: 100%; object-fit: cover;" />
                            </div>
                            @endforeach
                        </div>
                        <!-- Gradient overlay for text readability -->
                        <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 40%, transparent 60%, rgba(0,0,0,0.4) 100%); pointer-events: none;"></div>
                    </div>
                    
                    <!-- Media Indicators (dots) -->
                    @if(count($item['images']) > 1)
                    <div class="media-indicators" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: flex; gap: 6px; z-index: 5;">
                        @foreach($item['images'] as $imgIndex => $image)
                        <div class="indicator-dot" data-slide="{{ $imgIndex }}" style="width: 8px; height: 8px; border-radius: 50%; background: {{ $imgIndex === 0 ? 'white' : 'rgba(255,255,255,0.4)' }}; transition: background 0.2s;"></div>
                        @endforeach
                    </div>
                    @endif
                    
                    <!-- Post Info - Bottom -->
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 24px; padding-bottom: 40px; z-index: 5;">
                        <div class="flex items-center gap-3 mb-3">
                            <img src="/images/Gemini_Generated_Image_e3v0xje3v0xje3v0.png" alt="Ellipsis Etcetera" class="flex-shrink-0 rounded-xl object-cover" style="width: 40px; height: 40px;" />
                            <span class="text-white text-sm font-semibold font-['Bricolage_Grotesque',sans-serif]">Ellipsis Etcetera</span>
                        </div>
                        <a href="/clients/{{ $index }}" class="block cursor-pointer hover:opacity-80 transition-opacity">
                            <div class="flex items-end justify-between">
                                <div>
                                    <p class="text-white text-lg font-semibold font-['Bricolage_Grotesque',sans-serif]">{{ $item['title'] }}</p>
                                    <p class="text-gray-300 text-sm font-['Bricolage_Grotesque',sans-serif] mt-1">{{ $item['category'] }} · {{ $item['client'] }}</p>
                                </div>
                                <span class="text-[#FDFBD8] text-sm font-['Bricolage_Grotesque',sans-serif]">view more...</span>
                            </div>
                        </a>
                    </div>
                    
                    <!-- Post Counter -->
                    <div style="position: absolute; top: 60px; right: 16px; z-index: 5;" class="text-white/70 text-xs font-['Bricolage_Grotesque',sans-serif]">
                        {{ $index + 1 }} / {{ count($clientItems) }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Footer -->
        <div class="max-w-lg mx-auto px-4 py-6 text-center">
            <p class="text-gray-500 text-xs font-['Bricolage_Grotesque',sans-serif]">&copy; 2026 Ellipsis Etcetera</p>
        </div>
    </div>

    <script>
        // View toggle function
        function setView(view) {
            const gridView = document.getElementById('grid-view');
            const listView = document.getElementById('list-view');
            const gridBtn = document.getElementById('grid-view-btn');
            const listBtn = document.getElementById('list-view-btn');

            if (view === 'grid') {
                gridView.style.display = 'grid';
                listView.style.display = 'none';
                gridBtn.classList.add('active');
                listBtn.classList.remove('active');
            } else {
                gridView.style.display = 'none';
                listView.style.display = 'flex';
                gridBtn.classList.remove('active');
                listBtn.classList.add('active');
            }
        }

        // Carousel state management
        const carouselStates = new Map();
        let activeAutoPlayTimers = new Map();

        document.addEventListener('DOMContentLoaded', function() {
            // Update post count
            const postCount = document.querySelectorAll('.gallery-item').length;
            document.getElementById('post-count').textContent = postCount;

            // Initialize carousels
            initializeCarousels();
        });

        function initializeCarousels() {
            const postItems = document.querySelectorAll('.post-item');
            
            postItems.forEach((post, postIndex) => {
                const images = JSON.parse(post.dataset.images || '[]');
                const carousel = post.querySelector('.media-carousel');
                const track = post.querySelector('.carousel-track');
                const dots = post.querySelectorAll('.indicator-dot');
                
                if (images.length <= 1 || !carousel || !track) return;

                // Initialize state
                carouselStates.set(postIndex, {
                    currentSlide: 0,
                    totalSlides: images.length,
                    track: track,
                    dots: dots
                });

                // Touch/Swipe handling
                let touchStartX = 0;
                let touchStartY = 0;
                let touchEndX = 0;
                let isDragging = false;
                let startTranslate = 0;

                carousel.addEventListener('touchstart', (e) => {
                    touchStartX = e.touches[0].clientX;
                    touchStartY = e.touches[0].clientY;
                    isDragging = true;
                    const state = carouselStates.get(postIndex);
                    startTranslate = -state.currentSlide * (100 / state.totalSlides);
                    track.style.transition = 'none';
                    
                    // Stop auto-play on interaction
                    stopAutoPlay(postIndex);
                }, { passive: true });

                carousel.addEventListener('touchmove', (e) => {
                    if (!isDragging) return;
                    
                    const touchCurrentX = e.touches[0].clientX;
                    const touchCurrentY = e.touches[0].clientY;
                    const diffX = touchCurrentX - touchStartX;
                    const diffY = touchCurrentY - touchStartY;
                    
                    // Only handle horizontal swipes
                    if (Math.abs(diffX) > Math.abs(diffY)) {
                        e.preventDefault();
                        const state = carouselStates.get(postIndex);
                        const movePercent = (diffX / window.innerWidth) * (100 / state.totalSlides);
                        track.style.transform = `translateX(${startTranslate + movePercent}%)`;
                    }
                }, { passive: false });

                carousel.addEventListener('touchend', (e) => {
                    if (!isDragging) return;
                    isDragging = false;
                    
                    touchEndX = e.changedTouches[0].clientX;
                    const diffX = touchEndX - touchStartX;
                    const state = carouselStates.get(postIndex);
                    
                    track.style.transition = 'transform 0.3s ease-out';
                    
                    // Determine swipe direction (threshold of 50px)
                    if (Math.abs(diffX) > 50) {
                        if (diffX < 0 && state.currentSlide < state.totalSlides - 1) {
                            // Swipe left - next slide
                            goToSlide(postIndex, state.currentSlide + 1);
                        } else if (diffX > 0 && state.currentSlide > 0) {
                            // Swipe right - previous slide
                            goToSlide(postIndex, state.currentSlide - 1);
                        } else {
                            // Snap back
                            goToSlide(postIndex, state.currentSlide);
                        }
                    } else {
                        // Snap back to current slide
                        goToSlide(postIndex, state.currentSlide);
                    }
                    
                    // Restart auto-play after interaction
                    startAutoPlay(postIndex);
                }, { passive: true });
            });
        }

        function goToSlide(postIndex, slideIndex) {
            const state = carouselStates.get(postIndex);
            if (!state) return;
            
            state.currentSlide = slideIndex;
            const translateX = -slideIndex * (100 / state.totalSlides);
            state.track.style.transform = `translateX(${translateX}%)`;
            
            // Update dots
            state.dots.forEach((dot, i) => {
                dot.style.background = i === slideIndex ? 'white' : 'rgba(255,255,255,0.4)';
            });
        }

        function startAutoPlay(postIndex) {
            const state = carouselStates.get(postIndex);
            if (!state || state.totalSlides <= 1) return;
            
            // Clear existing timer
            stopAutoPlay(postIndex);
            
            // Start new timer
            const timer = setInterval(() => {
                const currentState = carouselStates.get(postIndex);
                const nextSlide = (currentState.currentSlide + 1) % currentState.totalSlides;
                currentState.track.style.transition = 'transform 0.3s ease-out';
                goToSlide(postIndex, nextSlide);
            }, 4000);
            
            activeAutoPlayTimers.set(postIndex, timer);
        }

        function stopAutoPlay(postIndex) {
            const timer = activeAutoPlayTimers.get(postIndex);
            if (timer) {
                clearInterval(timer);
                activeAutoPlayTimers.delete(postIndex);
            }
        }

        function stopAllAutoPlay() {
            activeAutoPlayTimers.forEach((timer) => clearInterval(timer));
            activeAutoPlayTimers.clear();
        }

        function startVisibleAutoPlay() {
            // Start auto-play for all visible posts
            carouselStates.forEach((state, postIndex) => {
                startAutoPlay(postIndex);
            });
        }

        function openPostView(index) {
            // Desktop: redirect to detail page
            if (window.innerWidth > 768) {
                window.location.href = '/clients/' + index;
                return;
            }
            
            // Mobile: open scroll view
            const scrollView = document.getElementById('post-scroll-view');
            scrollView.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            // Reset all carousels to first slide
            carouselStates.forEach((state, postIndex) => {
                goToSlide(postIndex, 0);
            });
            
            // Scroll to the clicked post
            const postItem = document.querySelector(`.post-item[data-index="${index}"]`);
            if (postItem) {
                setTimeout(() => {
                    postItem.scrollIntoView({ behavior: 'instant', block: 'start' });
                    // Start auto-play for all carousels
                    startVisibleAutoPlay();
                }, 10);
            }
        }

        function closePostView() {
            const scrollView = document.getElementById('post-scroll-view');
            scrollView.classList.add('hidden');
            document.body.style.overflow = '';
            
            // Stop all auto-play
            stopAllAutoPlay();
        }

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePostView();
            }
        });
    </script>
</body>

</html>
