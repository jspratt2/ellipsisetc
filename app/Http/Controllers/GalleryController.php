<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
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
        return view('gallery.index', compact('galleryItems'));
    }
}
