@props([
    'title' => 'Gallery',
    'pageType' => 'gallery',
    'profileName' => 'Ellipsis Etcetera',
    'profileBio' => 'Creative works & visual explorations ✨',
    'profileImage' => '/images/Gemini_Generated_Image_e3v0xje3v0xje3v0.png',
    'stat1Value' => '0',
    'stat1Label' => 'posts',
    'stat2Value' => '—',
    'stat2Label' => 'projects',
    'stat3Value' => '2026',
    'stat3Label' => 'since',
    'profileExtra' => null,
    'tabIcon' => null,
    'tabLabel' => 'POSTS',
    'showViewToggle' => false,
    'items' => [],
    'detailRoute' => null,
    'reviewCategory' => 'gallery',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} - {{ $title }}</title>

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

        .price-badge {
            position: absolute;
            top: 8px;
            left: 8px;
            background: #FDFBD8;
            color: #2D2D2D;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            font-family: 'Bricolage Grotesque', sans-serif;
        }

        .stock-badge {
            position: absolute;
            bottom: 8px;
            left: 8px;
            background: rgba(0, 0, 0, 0.7);
            color: #FF5349;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 500;
            font-family: 'Bricolage Grotesque', sans-serif;
        }

        {{ $styles ?? '' }}
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
        <!-- Profile Section -->
        <div class="max-w-lg mx-auto px-4 py-6 border-b border-[#3A3A3A]">
            <div class="flex items-center gap-6">
                <img src="{{ $profileImage }}" alt="{{ $profileName }}" class="flex-shrink-0 rounded-xl object-cover" style="width: 80px; height: 80px;" />
                <div class="flex-1">
                    <h2 class="text-white font-semibold text-lg font-['Bricolage_Grotesque',sans-serif] mb-2">{{ $profileName }}</h2>
                    <div class="flex gap-6 text-sm">
                        <div class="text-center">
                            <span class="text-white font-semibold" id="post-count">{{ $stat1Value }}</span>
                            <p class="text-gray-400 text-xs">{{ $stat1Label }}</p>
                        </div>
                        <div class="text-center">
                            <span class="text-white font-semibold">{{ $stat2Value }}</span>
                            <p class="text-gray-400 text-xs">{{ $stat2Label }}</p>
                        </div>
                        <div class="text-center">
                            <span class="text-white font-semibold">{{ $stat3Value }}</span>
                            <p class="text-gray-400 text-xs">{{ $stat3Label }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-gray-300 text-sm mt-4 font-['Bricolage_Grotesque',sans-serif]">{{ $profileBio }}</p>
            @if($profileExtra)
            <p class="text-gray-500 text-xs mt-2 font-['Bricolage_Grotesque',sans-serif]">{!! $profileExtra !!}</p>
            @endif
        </div>

        <!-- Tab Bar -->
        <div class="max-w-lg mx-auto border-b border-[#3A3A3A]">
            <div class="flex items-center justify-between px-4">
                <button class="flex-1 py-3 flex items-center justify-center gap-2 text-white border-b-2 border-white">
                    @if($tabIcon)
                    {!! $tabIcon !!}
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                        <line x1="9" x2="9" y1="3" y2="21" />
                        <line x1="15" x2="15" y1="3" y2="21" />
                        <line x1="3" x2="21" y1="9" y2="9" />
                        <line x1="3" x2="21" y1="15" y2="15" />
                    </svg>
                    @endif
                    <span class="text-xs font-medium">{{ $tabLabel }}</span>
                </button>
                @if($showViewToggle)
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
                @endif
            </div>
        </div>

        <!-- Main Content (Grid) -->
        <div class="max-w-lg mx-auto no-scrollbar" style="overflow-y: auto;">
            {{ $slot }}
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
                    <span class="flex-1 text-center text-white font-semibold font-['Bricolage_Grotesque',sans-serif]">{{ $title }}</span>
                    <div class="w-6"></div>
                </div>
            </div>
            
            <!-- Scrollable Posts with Snap -->
            <div id="posts-container" style="height: 100%; overflow-y: auto; scroll-snap-type: y mandatory; -webkit-overflow-scrolling: touch;">
                {{ $postScrollView ?? '' }}
            </div>
        </div>

        <x-reviews-carousel :category="$reviewCategory" />

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

            if (!gridView || !listView) return;

            if (view === 'grid') {
                gridView.style.display = 'grid';
                listView.style.display = 'none';
                gridBtn?.classList.add('active');
                listBtn?.classList.remove('active');
            } else {
                gridView.style.display = 'none';
                listView.style.display = 'flex';
                gridBtn?.classList.remove('active');
                listBtn?.classList.add('active');
            }
        }

        // Carousel state management
        const carouselStates = new Map();
        let activeAutoPlayTimers = new Map();

        document.addEventListener('DOMContentLoaded', function() {
            // Update post count
            const postCount = document.querySelectorAll('.gallery-item').length;
            const postCountEl = document.getElementById('post-count');
            if (postCountEl && postCountEl.textContent === '0') {
                postCountEl.textContent = postCount;
            }

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
                    stopAutoPlay(postIndex);
                }, { passive: true });

                carousel.addEventListener('touchmove', (e) => {
                    if (!isDragging) return;
                    
                    const touchCurrentX = e.touches[0].clientX;
                    const touchCurrentY = e.touches[0].clientY;
                    const diffX = touchCurrentX - touchStartX;
                    const diffY = touchCurrentY - touchStartY;
                    
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
                    
                    if (Math.abs(diffX) > 50) {
                        if (diffX < 0 && state.currentSlide < state.totalSlides - 1) {
                            goToSlide(postIndex, state.currentSlide + 1);
                        } else if (diffX > 0 && state.currentSlide > 0) {
                            goToSlide(postIndex, state.currentSlide - 1);
                        } else {
                            goToSlide(postIndex, state.currentSlide);
                        }
                    } else {
                        goToSlide(postIndex, state.currentSlide);
                    }
                    
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
            
            state.dots.forEach((dot, i) => {
                dot.style.background = i === slideIndex ? 'white' : 'rgba(255,255,255,0.4)';
            });
        }

        function startAutoPlay(postIndex) {
            const state = carouselStates.get(postIndex);
            if (!state || state.totalSlides <= 1) return;
            
            stopAutoPlay(postIndex);
            
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
            carouselStates.forEach((state, postIndex) => {
                startAutoPlay(postIndex);
            });
        }

        // Page type and route configuration
        const pageType = '{{ $pageType }}';
        const detailRoute = '{{ $detailRoute ?? '' }}';

        function openPostView(index) {
            // Desktop: redirect to detail page
            if (window.innerWidth > 768) {
                if (detailRoute) {
                    window.location.href = detailRoute.replace(':id', index);
                }
                return;
            }
            
            // Mobile: open scroll view
            const scrollView = document.getElementById('post-scroll-view');
            scrollView.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            carouselStates.forEach((state, postIndex) => {
                goToSlide(postIndex, 0);
            });
            
            const postItem = document.querySelector(`.post-item[data-index="${index}"]`);
            if (postItem) {
                setTimeout(() => {
                    postItem.scrollIntoView({ behavior: 'instant', block: 'start' });
                    startVisibleAutoPlay();
                }, 10);
            }
        }

        function closePostView() {
            const scrollView = document.getElementById('post-scroll-view');
            scrollView.classList.add('hidden');
            document.body.style.overflow = '';
            stopAllAutoPlay();
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePostView();
            }
        });
    </script>

    {{ $scripts ?? '' }}
</body>
</html>
