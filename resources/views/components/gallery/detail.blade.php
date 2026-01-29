@props(['item'])

<style>
    .image-carousel {
        display: flex;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }
    .image-carousel::-webkit-scrollbar {
        display: none;
    }
    .image-carousel-item {
        flex: 0 0 100%;
        scroll-snap-align: start;
    }
</style>

<!-- Header -->
<header class="sticky top-0 z-50 bg-[#2D2D2D] border-b border-[#3A3A3A]">
    <div class="max-w-lg mx-auto px-4 py-3 flex items-center gap-4">
        <a href="/gallery" class="flex items-center text-white hover:text-[#FDFBD8] transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m12 19-7-7 7-7" />
                <path d="M19 12H5" />
            </svg>
        </a>
        <div class="px-4 py-1.5 h-9 text-sm rounded-lg border border-zinc-700 text-white font-['Bricolage_Grotesque',sans-serif] flex items-center backdrop-blur-md bg-zinc-800/70">
            Back to Gallery
        </div>
    </div>
</header>

<!-- Image Carousel -->
<div class="max-w-lg mx-auto">
    <div class="image-carousel" id="imageCarousel">
        @foreach($item['images'] as $imgIndex => $image)
        <div class="image-carousel-item">
            <div class="aspect-square">
                <img src="{{ $image }}" alt="{{ $item['title'] }} - Image {{ $imgIndex + 1 }}" class="w-full h-full object-cover" />
            </div>
        </div>
        @endforeach
    </div>
    
    <!-- Image Indicators -->
    @if(count($item['images']) > 1)
    <div class="flex justify-center gap-1.5 py-3">
        @foreach($item['images'] as $imgIndex => $image)
        <button 
            class="carousel-dot w-2 h-2 rounded-full transition-colors {{ $imgIndex === 0 ? 'bg-[#FDFBD8]' : 'bg-gray-600' }}"
            data-index="{{ $imgIndex }}"
            onclick="scrollToImage({{ $imgIndex }})"
        ></button>
        @endforeach
    </div>
    @endif
</div>

<!-- Content -->
<div class="max-w-lg mx-auto px-4 py-6">
    <!-- Title & Category -->
    <div class="mb-6">
        <span class="text-[#FDFBD8] text-xs font-medium font-['Bricolage_Grotesque',sans-serif] uppercase tracking-wider">{{ $item['category'] }}</span>
        <h1 class="text-white text-2xl font-bold font-['Bricolage_Grotesque',sans-serif] mt-1">{{ $item['title'] }}</h1>
    </div>

    <!-- Meta Info -->
    <div class="flex items-center gap-4 mb-6 pb-6 border-b border-[#3A3A3A]">
        <div class="flex items-center gap-3">
            <img src="/images/Gemini_Generated_Image_e3v0xje3v0xje3v0.png" alt="Ellipsis Etcetera" class="flex-shrink-0 rounded-xl object-cover" style="width: 40px; height: 40px;" />
            <div>
                <p class="text-white text-sm font-semibold font-['Bricolage_Grotesque',sans-serif]">Ellipsis Etcetera</p>
                <p class="text-gray-400 text-xs font-['Bricolage_Grotesque',sans-serif]">{{ $item['date'] }}</p>
            </div>
        </div>
    </div>

    <!-- Description -->
    <div class="mb-6">
        <h2 class="text-white text-sm font-semibold font-['Bricolage_Grotesque',sans-serif] mb-2">About this project</h2>
        <p class="text-gray-300 text-sm leading-relaxed font-['Bricolage_Grotesque',sans-serif]">{{ $item['description'] }}</p>
    </div>

    <!-- Client -->
    <div class="mb-6 pb-6 border-b border-[#3A3A3A]">
        <h2 class="text-white text-sm font-semibold font-['Bricolage_Grotesque',sans-serif] mb-2">Client</h2>
        <p class="text-gray-300 text-sm font-['Bricolage_Grotesque',sans-serif]">{{ $item['client'] }}</p>
    </div>

    <!-- CTA -->
    <div class="flex gap-3">
        <a href="/contact" class="flex-1 py-3 px-4 bg-[#FDFBD8] text-[#2D2D2D] text-sm font-semibold font-['Bricolage_Grotesque',sans-serif] rounded-lg text-center hover:bg-[#E9D502] transition-colors">
            Work with me
        </a>
        <button onclick="shareGalleryProject()" class="py-3 px-4 border border-[#3A3A3A] text-white text-sm font-semibold font-['Bricolage_Grotesque',sans-serif] rounded-lg hover:border-[#FDFBD8] transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="18" cy="5" r="3"/>
                <circle cx="6" cy="12" r="3"/>
                <circle cx="18" cy="19" r="3"/>
                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/>
                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>
            </svg>
        </button>
    </div>
</div>

<!-- Footer -->
<div class="max-w-lg mx-auto px-4 py-6 text-center border-t border-[#3A3A3A]">
    <p class="text-gray-500 text-xs font-['Bricolage_Grotesque',sans-serif]">&copy; 2026 Ellipsis Etcetera</p>
</div>

<script>
    const carousel = document.getElementById('imageCarousel');
    const dots = document.querySelectorAll('.carousel-dot');

    function scrollToImage(index) {
        const items = carousel.querySelectorAll('.image-carousel-item');
        if (items[index]) {
            items[index].scrollIntoView({ behavior: 'smooth', inline: 'start' });
        }
    }

    // Update dots on scroll
    if (carousel) {
        carousel.addEventListener('scroll', () => {
            const scrollLeft = carousel.scrollLeft;
            const itemWidth = carousel.offsetWidth;
            const currentIndex = Math.round(scrollLeft / itemWidth);
            
            dots.forEach((dot, i) => {
                if (i === currentIndex) {
                    dot.classList.remove('bg-gray-600');
                    dot.classList.add('bg-[#FDFBD8]');
                } else {
                    dot.classList.remove('bg-[#FDFBD8]');
                    dot.classList.add('bg-gray-600');
                }
            });
        });
    }

    function shareGalleryProject() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $item['title'] }} - Ellipsis Etcetera',
                text: '{{ $item['description'] }}',
                url: window.location.href
            });
        } else {
            navigator.clipboard.writeText(window.location.href);
            alert('Link copied to clipboard!');
        }
    }
</script>
