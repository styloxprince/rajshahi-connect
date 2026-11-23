<?php

use App\Http\Controllers\BloodRequestController;
use App\Http\Controllers\DonorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// রক্তদাতা হিসেবে নিবন্ধন (হিরো ও নিচের লাল বাটন)
Route::get('/donor/register', [DonorController::class, 'create'])->name('donor.register');
Route::post('/donor/register', [DonorController::class, 'store'])->name('donor.store');

// রক্তের অনুরোধ (হোমপেজের মডাল এখানে POST করে)
Route::get('/blood-request/create', [BloodRequestController::class, 'create'])->name('blood-request.create');
Route::post('/blood-request', [BloodRequestController::class, 'store'])
    ->middleware('throttle:5,10') // একই আইপি থেকে ১০ মিনিটে ৫টির বেশি নয়
    ->name('blood-request.store');

// এই পেজগুলোর ভিউ বানানোর পর কমেন্ট খুলে দাও (ভিউ না থাকলে এরর দেবে)
// Route::view('/about', 'about')->name('about');
// Route::view('/contact', 'contact')->name('contact');
// Route::view('/services', 'services')->name('services');

// লগইন: Filament ব্যবহার করলে নিজের প্যানেলের পাথ দাও, যেমন /admin/login
Route::redirect('/login', '/admin/login')->name('login');