@props([
    'reviews' => [],
    'category' => 'general'
])

@php
// Default reviews by category
$defaultReviews = [
    'general' => [
        ['text' => "It's not just prompts, it's a concise guide to how they work 👌🏻👌🏻👌🏻", 'author' => 'James Scott', 'business' => 'Retail & E-commerce', 'stars' => 5],
        ['text' => "Absolutely transformed my workflow. The attention to detail is incredible!", 'author' => 'Sarah M.', 'business' => 'Creative Studio', 'stars' => 5],
        ['text' => "Professional, responsive, and delivers beyond expectations every time.", 'author' => 'James T.', 'business' => 'Tech Startup', 'stars' => 5],
        ['text' => "Working with Ellipsis Etcetera was a game-changer for our brand identity.", 'author' => 'Michelle K.', 'business' => 'Marketing Agency', 'stars' => 5],
        ['text' => "The quality of work speaks for itself. Highly recommend to anyone!", 'author' => 'David R.', 'business' => 'E-commerce Brand', 'stars' => 5],
        ['text' => "Creative solutions that actually work. A true professional in the field.", 'author' => 'Emily W.', 'business' => 'Design Firm', 'stars' => 5],
    ],
    'courses' => [
        ['text' => "The course content is incredibly well-structured and easy to follow.", 'author' => 'Alex P.', 'business' => 'Student', 'stars' => 5],
        ['text' => "Learned more in one course than months of self-teaching. Worth every penny!", 'author' => 'Jordan L.', 'business' => 'Freelancer', 'stars' => 5],
        ['text' => "The instructor explains complex topics in a way anyone can understand.", 'author' => 'Taylor S.', 'business' => 'Developer', 'stars' => 5],
    ],
    'gallery' => [
        ['text' => "The portfolio showcases incredible range and creativity.", 'author' => 'Morgan B.', 'business' => 'Art Director', 'stars' => 5],
        ['text' => "Each piece tells a story. Truly inspiring work!", 'author' => 'Casey N.', 'business' => 'Photographer', 'stars' => 5],
        ['text' => "The attention to detail in every project is remarkable.", 'author' => 'Riley K.', 'business' => 'Designer', 'stars' => 5],
    ],
    'shop' => [
        ['text' => "Fast delivery and the product quality exceeded my expectations!", 'author' => 'Chris M.', 'business' => 'Verified Buyer', 'stars' => 5],
        ['text' => "Best purchase I've made this year. Absolutely love it!", 'author' => 'Jamie H.', 'business' => 'Verified Buyer', 'stars' => 5],
        ['text' => "Great value for money. Will definitely be buying more.", 'author' => 'Pat D.', 'business' => 'Repeat Customer', 'stars' => 5],
    ],
    'trading' => [
        ['text' => "The trading insights have been incredibly accurate and helpful.", 'author' => 'Sam W.', 'business' => 'Day Trader', 'stars' => 5],
        ['text' => "Finally found a resource that actually delivers results.", 'author' => 'Drew F.', 'business' => 'Investor', 'stars' => 5],
        ['text' => "Clear, actionable advice. My portfolio has never looked better.", 'author' => 'Quinn R.', 'business' => 'Trader', 'stars' => 5],
    ],
    'clients' => [
        ['text' => "Working with them was seamless from start to finish.", 'author' => 'Leslie G.', 'business' => 'Business Owner', 'stars' => 5],
        ['text' => "They truly understand what businesses need. Exceptional service!", 'author' => 'Avery J.', 'business' => 'Startup Founder', 'stars' => 5],
        ['text' => "Professional, reliable, and always on time. Couldn't ask for more.", 'author' => 'Blake T.', 'business' => 'Agency Owner', 'stars' => 5],
    ],
];

// Use custom reviews if provided, otherwise use category defaults, fallback to general
$reviewData = !empty($reviews) ? $reviews : ($defaultReviews[$category] ?? $defaultReviews['general']);
$uniqueId = 'carousel_' . uniqid();
@endphp

<div class="w-full z-10 relative" x-data="{{ $uniqueId }}()" x-init="startAutoPlay()">
    <div class="w-full max-w-xl mx-auto px-4 pt-2">
        <div class="w-full max-w-sm mx-auto">
            <label class="text-xs font-medium text-gray-400 mb-1 block font-['Bricolage_Grotesque',sans-serif]">Reviews:</label>
            <div class="backdrop-blur-md bg-[#252525]/80 border border-[#3A3A3A] rounded-lg p-4 h-[140px] flex flex-col justify-between relative overflow-hidden">
                <template x-for="(review, index) in reviews" :key="index">
                    <div 
                        x-show="currentReview === index"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform translate-x-4"
                        x-transition:enter-end="opacity-100 transform translate-x-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-x-0"
                        x-transition:leave-end="opacity-0 transform -translate-x-4"
                        class="absolute inset-0 p-4 flex flex-col justify-between"
                    >
                        <blockquote class="text-white text-xs leading-relaxed mb-3 font-['Bricolage_Grotesque',sans-serif] flex-1 overflow-hidden" x-text="'&quot;' + review.text + '&quot;'"></blockquote>
                        <div class="flex items-center justify-between flex-shrink-0">
                            <p class="text-gray-300 text-xs font-medium font-['Bricolage_Grotesque',sans-serif]" x-text="review.author + ', ' + review.business"></p>
                            <div class="flex items-center gap-0.5">
                                <template x-for="star in review.stars" :key="star">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-3 w-3 fill-[#E9D502] text-[#E9D502]">
                                        <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                    </svg>
                                </template>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <div class="flex justify-center mt-4 gap-1">
                <template x-for="(review, index) in reviews" :key="index">
                    <button 
                        @click="goToReview(index)"
                        :class="currentReview === index ? 'bg-[#FDFBD8]' : 'bg-gray-600 hover:bg-gray-500'"
                        class="w-1.5 h-1.5 rounded-full transition-colors cursor-pointer"
                        :aria-label="'Go to review ' + (index + 1)"
                    ></button>
                </template>
            </div>
        </div>
    </div>
</div>

<script>
    function {{ $uniqueId }}() {
        return {
            currentReview: 0,
            autoPlayInterval: null,
            reviews: @json($reviewData),
            startAutoPlay() {
                this.autoPlayInterval = setInterval(() => {
                    this.nextReview();
                }, 5000);
            },
            stopAutoPlay() {
                if (this.autoPlayInterval) {
                    clearInterval(this.autoPlayInterval);
                }
            },
            nextReview() {
                this.currentReview = (this.currentReview + 1) % this.reviews.length;
            },
            goToReview(index) {
                this.stopAutoPlay();
                this.currentReview = index;
                this.startAutoPlay();
            }
        }
    }
</script>
