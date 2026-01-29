<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} - Gallery</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
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
        <!-- Header with Back Arrow and Title -->
        <header class="sticky top-0 z-50 bg-[#2D2D2D] border-b border-[#3A3A3A]">
            <div class="max-w-lg mx-auto px-4 py-3 flex items-center gap-4">
                <a href="/" class="flex items-center text-white hover:text-[#FDFBD8] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m12 19-7-7 7-7" />
                        <path d="M19 12H5" />
                    </svg>
                </a>
                <div class="px-4 py-1.5 h-9 text-sm rounded-lg border border-zinc-700 text-white font-['Bricolage_Grotesque',sans-serif] flex items-center backdrop-blur-md bg-zinc-800/70">
                    Go back
                </div>
            </div>
        </header>

        <x-gallery.profile />

        <!-- Tab Bar -->
        <div class="max-w-lg mx-auto border-b border-[#3A3A3A]">
            <div class="flex">
                <button class="flex-1 py-3 flex items-center justify-center gap-2 text-white border-b-2 border-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                        <line x1="9" x2="9" y1="3" y2="21" />
                        <line x1="15" x2="15" y1="3" y2="21" />
                        <line x1="3" x2="21" y1="9" y2="9" />
                        <line x1="3" x2="21" y1="15" y2="15" />
                    </svg>
                    <span class="text-xs font-medium">POSTS</span>
                </button>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="max-w-lg mx-auto">
            @php
            $galleryItems = [
            [
            'title' => 'Brand Identity System',
            'category' => 'Branding',
            'images' => [
                'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?w=800&h=800&fit=crop',
            ],
            ],
            [
            'title' => 'E-commerce Redesign',
            'category' => 'UI/UX Design',
            'images' => [
                'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=800&h=800&fit=crop',
            ],
            ],
            [
            'title' => 'AI Prompt Library',
            'category' => 'Content System',
            'images' => [
                'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&h=800&fit=crop',
            ],
            ],
            [
            'title' => 'Product Photography',
            'category' => '3D / CGI',
            'images' => [
                'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1618004912476-29818d81ae2d?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=800&h=800&fit=crop',
            ],
            ],
            [
            'title' => 'Social Campaign',
            'category' => 'Marketing',
            'images' => [
                'https://images.unsplash.com/photo-1611162617474-5b21e879e113?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?w=800&h=800&fit=crop',
            ],
            ],
            [
            'title' => 'Landing Page Design',
            'category' => 'Web Development',
            'images' => [
                'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=800&h=800&fit=crop',
            ],
            ],
            [
            'title' => 'Mobile App Concept',
            'category' => 'UI/UX Design',
            'images' => [
                'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&h=800&fit=crop',
            ],
            ],
            [
            'title' => 'Typography Exploration',
            'category' => 'Design',
            'images' => [
                'https://images.unsplash.com/photo-1618004912476-29818d81ae2d?w=800&h=800&fit=crop',
            ],
            ],
            [
            'title' => 'Creative Direction',
            'category' => 'Art Direction',
            'images' => [
                'https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=800&h=800&fit=crop',
            ],
            ],
            ];
            @endphp

            <div class="gallery-grid">
                @foreach($galleryItems as $index => $item)
                <div class="gallery-item group cursor-pointer" onclick="openPostView({{ $index }})">
                    <img
                        src="{{ $item['images'][0] }}"
                        alt="{{ $item['title'] }}"
                        loading="{{ $index === 0 ? 'eager' : 'lazy' }}" />
                    <div class="gallery-overlay">
                        <div class="text-center px-2">
                            <p class="text-white text-xs font-semibold font-['Bricolage_Grotesque',sans-serif]">{{ $item['title'] }}</p>
                            <p class="text-gray-300 text-xs font-['Bricolage_Grotesque',sans-serif]">{{ $item['category'] }}</p>
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
                    <span class="flex-1 text-center text-white font-semibold font-['Bricolage_Grotesque',sans-serif]">Posts</span>
                    <div class="w-6"></div>
                </div>
            </div>
            
            <!-- Scrollable Posts with Snap -->
            <div id="posts-container" style="height: 100%; overflow-y: auto; scroll-snap-type: y mandatory; -webkit-overflow-scrolling: touch;">
                @foreach($galleryItems as $index => $item)
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
                        <a href="/gallery/{{ $index }}" class="block cursor-pointer hover:opacity-80 transition-opacity">
                            <div class="flex items-end justify-between">
                                <div>
                                    <p class="text-white text-lg font-semibold font-['Bricolage_Grotesque',sans-serif]">{{ $item['title'] }}</p>
                                    <p class="text-gray-300 text-sm font-['Bricolage_Grotesque',sans-serif] mt-1">{{ $item['category'] }}</p>
                                </div>
                                <span class="text-[#FDFBD8] text-sm font-['Bricolage_Grotesque',sans-serif]">view more...</span>
                            </div>
                        </a>
                    </div>
                    
                    <!-- Post Counter -->
                    <div style="position: absolute; top: 60px; right: 16px; z-index: 5;" class="text-white/70 text-xs font-['Bricolage_Grotesque',sans-serif]">
                        {{ $index + 1 }} / {{ count($galleryItems) }}
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
                window.location.href = '/gallery/' + index;
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
