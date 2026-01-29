<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\GalleryController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::get('/clients', function () {
    return view('clients.index');
});

Route::get('/contact', function () {
    return view('contact');
});
    Route::post('/contact/send', [
        ContactController::class, 'send'
        ])->name('contact.send'
    );

Route::get('/course', function () {
    return view('courses');
});
Route::get('/courses', function () {
    return view('courses');
});
Route::get('/newsletter', function () {
    return view('newsletter');
});
Route::get('/packages', function () {
    return view('packages-new');
});
Route::get('/shop', function () {
    return view('shop-new');
});
Route::get('/trading', function () {
    return view('trading');
});
Route::get('/mayhemprojects', function () {
    return view('mayhemprojects');
});

Route::get('/shop/{slug}', function ($slug) {
    $products = [
        'seasonal-tee-winter-2026' => [
            'title' => 'Seasonal Tee — Winter 2026',
            'description' => 'Limited edition winter drop. Premium heavyweight cotton with seasonal graphic. This exclusive design celebrates the winter season with a unique AI-generated pattern that captures the essence of the cold months. Each tee is made from 100% organic cotton and printed using eco-friendly inks.',
            'price' => 38,
            'cta' => 'Buy it',
            'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=800&h=800&fit=crop',
            'stock' => 24,
            'category' => 'Limited Edition',
            'sizes' => ['XS', 'S', 'M', 'L', 'XL', '2XL'],
            'features' => [
                'Premium heavyweight 100% organic cotton',
                'Relaxed unisex fit',
                'AI-generated seasonal design',
                'Eco-friendly printing process',
                'Pre-shrunk fabric'
            ]
        ],
        'seasonal-hoodie-winter-2026' => [
            'title' => 'Seasonal Hoodie — Winter 2026',
            'description' => 'Limited edition winter drop. Cozy heavyweight hoodie with seasonal embroidery. Stay warm while looking cool with our signature winter hoodie featuring hand-stitched embroidery and a fleece-lined interior perfect for those cold creative sessions.',
            'price' => 72,
            'cta' => 'Buy it',
            'image' => 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=800&h=800&fit=crop',
            'stock' => 18,
            'category' => 'Limited Edition',
            'sizes' => ['XS', 'S', 'M', 'L', 'XL', '2XL'],
            'features' => [
                'Heavyweight 400gsm fleece',
                'Hand-stitched embroidery',
                'Kangaroo pocket',
                'Ribbed cuffs and hem',
                'Oversized fit'
            ]
        ],
        'mystery-sticker-pack' => [
            'title' => 'Mystery Sticker Pack',
            'description' => 'Randomized collection of 5 holographic stickers. Every pack is different! Get a surprise assortment from our entire sticker collection including rare and limited designs. Perfect for decorating your laptop, water bottle, or creative workspace.',
            'price' => 12,
            'cta' => 'Surprise Me',
            'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&h=800&fit=crop',
            'stock' => null,
            'category' => 'Accessories',
            'features' => [
                '5 holographic stickers per pack',
                'Waterproof and UV-resistant',
                'Mix of sizes (2" to 4")',
                'Chance for rare designs',
                'No duplicates guaranteed'
            ]
        ],
        'ellipsis-beanie' => [
            'title' => 'Ellipsis Beanie',
            'description' => 'Knit beanie with embroidered "..." logo. One size fits most. Our signature beanie keeps you warm while showing off your love for the ellipsis. Made from soft acrylic yarn with a double-layer construction for extra warmth.',
            'price' => 28,
            'cta' => 'Buy it',
            'image' => 'https://images.unsplash.com/photo-1576871337622-98d48d1cf531?w=800&h=800&fit=crop',
            'stock' => null,
            'category' => 'Accessories',
            'features' => [
                'Soft acrylic yarn',
                'Double-layer construction',
                'Embroidered "..." logo',
                'One size fits most',
                'Stretchy ribbed cuff'
            ]
        ],
        'creator-coffee-mug' => [
            'title' => 'Creator Coffee Mug',
            'description' => 'Ceramic mug for your late night prompting sessions. 12oz capacity. The perfect companion for those deep creative sessions. Features our signature design and is microwave and dishwasher safe.',
            'price' => 18,
            'cta' => 'Buy it',
            'image' => 'https://images.unsplash.com/photo-1514228742587-6b1558fcca3d?w=800&h=800&fit=crop',
            'stock' => null,
            'category' => 'Accessories',
            'features' => [
                '12oz / 350ml capacity',
                'Premium ceramic construction',
                'Microwave safe',
                'Dishwasher safe',
                'Comfortable handle grip'
            ]
        ],
        'overflow-shirts' => [
            'title' => 'Overflow Shirts',
            'description' => 'Leftovers from previous seasonal tees. Assorted designs, limited sizes. Grab a piece of Ellipsis history at a discount! Each overflow shirt comes from our past seasonal collections and is available while supplies last.',
            'price' => 22,
            'cta' => 'View Options',
            'image' => 'https://images.unsplash.com/photo-1503341504253-dff4815485f1?w=800&h=800&fit=crop',
            'stock' => null,
            'category' => 'Sale',
            'sizes' => ['S', 'M', 'XL'],
            'features' => [
                'Previous seasonal designs',
                'Premium cotton quality',
                'Limited sizes available',
                'Discounted from original price',
                'Final sale - no returns'
            ]
        ],
    ];

    if (!isset($products[$slug])) {
        abort(404);
    }

    return view('product', ['product' => $products[$slug]]);
})->name('shop.product');

Route::get('/gallery', [GalleryController::class, 'index'])
    ->name('gallery.index');

Route::get('/gallery/{id}', [GalleryController::class, 'show'])
    ->name('gallery.show');

Route::get('/clients/{id}', function ($id) {
    $clientItems = [
        [
            'title' => 'Tech Startup Rebrand',
            'category' => 'Branding',
            'client' => 'NovaTech Inc.',
            'description' => 'Complete brand overhaul for a growing tech startup. We developed a fresh visual identity that reflects innovation and trustworthiness, including logo redesign, brand guidelines, and marketing collateral.',
            'images' => [
                'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?w=800&h=800&fit=crop',
            ],
            'date' => 'January 2026',
        ],
        [
            'title' => 'E-commerce Platform',
            'category' => 'UI/UX Design',
            'client' => 'StyleHub',
            'description' => 'Designed and developed a modern e-commerce platform with focus on user experience and conversion optimization. The project included user research, wireframing, and high-fidelity prototypes.',
            'images' => [
                'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=800&fit=crop',
            ],
            'date' => 'December 2025',
        ],
        [
            'title' => 'AI Content Strategy',
            'category' => 'Marketing',
            'client' => 'FutureMedia',
            'description' => 'Developed an AI-powered content strategy that increased engagement by 300%. This included prompt engineering, content calendars, and automated workflow design.',
            'images' => [
                'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&h=800&fit=crop',
            ],
            'date' => 'November 2025',
        ],
        [
            'title' => 'Product Launch Campaign',
            'category' => 'Campaign',
            'client' => 'Vitality Fitness',
            'description' => 'Full-scale product launch campaign including visual identity, social media assets, video content, and print materials for a new fitness product line.',
            'images' => [
                'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=800&h=800&fit=crop',
            ],
            'date' => 'October 2025',
        ],
        [
            'title' => 'Restaurant Brand Identity',
            'category' => 'Branding',
            'client' => 'Sakura Kitchen',
            'description' => 'Created a warm and inviting brand identity for an upscale Japanese restaurant, including logo design, menu design, interior signage, and digital presence.',
            'images' => [
                'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800&h=800&fit=crop',
            ],
            'date' => 'September 2025',
        ],
        [
            'title' => 'Mobile App Design',
            'category' => 'UI/UX Design',
            'client' => 'WellnessTrack',
            'description' => 'Designed a health and wellness tracking mobile application with intuitive user flows, gamification elements, and accessibility features.',
            'images' => [
                'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=800&h=800&fit=crop',
            ],
            'date' => 'August 2025',
        ],
        [
            'title' => 'Social Media Campaign',
            'category' => 'Marketing',
            'client' => 'Urban Threads',
            'description' => 'Executed a viral social media campaign that reached over 2 million users. Created engaging visual content, influencer partnerships, and community engagement strategies.',
            'images' => [
                'https://images.unsplash.com/photo-1611162617474-5b21e879e113?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?w=800&h=800&fit=crop',
            ],
            'date' => 'July 2025',
        ],
        [
            'title' => 'Corporate Website',
            'category' => 'Web Development',
            'client' => 'Apex Consulting',
            'description' => 'Built a professional corporate website with modern design principles, optimized performance, and seamless CMS integration for easy content management.',
            'images' => [
                'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=800&h=800&fit=crop',
            ],
            'date' => 'June 2025',
        ],
        [
            'title' => 'Event Visual Package',
            'category' => 'Design',
            'client' => 'Summit Conference',
            'description' => 'Complete visual package for a major industry conference including stage design, digital signage, attendee badges, promotional materials, and social media templates.',
            'images' => [
                'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=800&h=800&fit=crop',
                'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=800&h=800&fit=crop',
            ],
            'date' => 'May 2025',
        ],
    ];

    if (!isset($clientItems[$id])) {
        abort(404);
    }

    return view('clients.show', ['item' => $clientItems[$id], 'id' => $id]);
})->name('clients.show');
