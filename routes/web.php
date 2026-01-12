<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::get('/clients', function () {
    return view('clients');
});

Route::get('/contact', function () {
    return view('contact');
});
    Route::post('/contact/send', [
        ContactController::class, 'send'
        ])->name('contact.send'
    );

Route::get('/course', function () {
    return view('course');
});
Route::get('/newsletter', function () {
    return view('newsletter');
});
Route::get('/packages', function () {
    return view('packages');
});
Route::get('/shop', function () {
    return view('shop');
});
