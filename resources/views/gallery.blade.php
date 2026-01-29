<x-layouts.gallery
    title="Gallery"
    pageType="gallery"
    profileBio="Creative works & visual explorations ✨"
    stat1Label="posts"
    stat2Value="—"
    stat2Label="projects"
    tabLabel="POSTS"
    :showViewToggle="true"
    detailRoute="/gallery/:id"
>
    <x-slot:tabIcon>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
            <line x1="9" x2="9" y1="3" y2="21" />
            <line x1="15" x2="15" y1="3" y2="21" />
            <line x1="3" x2="21" y1="9" y2="9" />
            <line x1="3" x2="21" y1="15" y2="15" />
        </svg>
    </x-slot:tabIcon>

    <!-- Grid View -->
    <div id="grid-view" class="gallery-grid">
        @foreach($galleryItems as $index => $item)
        <x-gallery.grid-item :index="$index" :item="$item" />
        @endforeach
    </div>

    <!-- List View -->
    <div id="list-view" class="gallery-list" style="display: none;">
        @foreach($galleryItems as $index => $item)
        <div class="list-item" onclick="openPostView({{ $index }})">
            <div class="list-item-thumbnail">
                <img src="{{ $item['images'][0] }}" alt="{{ $item['title'] }}" loading="lazy" />
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
            </div>
        </div>
        @endforeach
    </div>

    <x-slot:postScrollView>
        @foreach($galleryItems as $index => $item)
        <x-gallery.post-item 
            :index="$index" 
            :item="$item" 
            :totalItems="count($galleryItems)"
            :detailUrl="'/gallery/' . $index"
        />
        @endforeach
    </x-slot:postScrollView>
</x-layouts.gallery>
