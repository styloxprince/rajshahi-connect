<!DOCTYPE html>
<html lang="bn" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#C90016">
    <title>Rajshahi Connect</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-sans text-[#222222] antialiased">

<div class="flex min-h-screen flex-col">

    <!-- Header -->
    <header data-site-header class="site-header sticky top-0 z-40 border-b border-gray-100 bg-white shadow-md shadow-gray-200/70">
        <div class="site-header-inner mx-auto flex max-w-7xl items-center justify-between px-5 py-4 lg:px-8">

            <!-- Logo -->
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="রাজশাহী কানেক্ট"
                     class="site-header-logo h-12 w-auto sm:h-14">
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden items-center gap-8 lg:flex">
                <a href="{{ url('/') }}" class="text-sm font-semibold text-[#C90016]">হোম</a>
                <a href="{{ url('/about') }}" class="text-sm font-medium text-gray-600 transition hover:text-[#C90016]">আমাদের সম্পর্কে</a>
                <a href="{{ url('/contact') }}" class="text-sm font-medium text-gray-600 transition hover:text-[#C90016]">যোগাযোগ</a>
                <a href="{{ url('/services') }}" class="text-sm font-medium text-gray-600 transition hover:text-[#C90016]">সেবা সমূহ</a>
            </nav>

            <!-- Desktop Login -->
            <div class="hidden lg:block">
                <a href="{{ url('/login') }}"
                    class="inline-block rounded-xl border border-gray-200 px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:border-[#C90016] hover:text-[#C90016]">
                    লগইন
                </a>
            </div>

            <!-- Mobile Menu Icon -->
            <button type="button" id="menu-btn" aria-label="মেনু" aria-expanded="false" aria-controls="mobile-menu"
                class="flex h-10 w-10 items-center justify-center rounded-lg border border-gray-200 text-gray-700 lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round">
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
        <!-- Mobile Menu Panel -->
    <div id="mobile-menu" class="hidden border-t border-gray-100 bg-white px-5 py-4 lg:hidden">
        <nav class="flex flex-col gap-1 text-base">
            <a href="{{ url('/') }}" class="rounded-lg px-3 py-2.5 font-semibold text-[#C90016]">হোম</a>
            <a href="{{ url('/about') }}" class="rounded-lg px-3 py-2.5 font-medium text-gray-700 hover:bg-red-50">আমাদের সম্পর্কে</a>
            <a href="{{ url('/contact') }}" class="rounded-lg px-3 py-2.5 font-medium text-gray-700 hover:bg-red-50">যোগাযোগ</a>
            <a href="{{ url('/services') }}" class="rounded-lg px-3 py-2.5 font-medium text-gray-700 hover:bg-red-50">সেবা সমূহ</a>
            <a href="{{ url('/login') }}" class="mt-2 rounded-xl border border-gray-200 px-4 py-2.5 text-center font-semibold text-gray-700">লগইন</a>
        </nav>
    </div>
</header>


    <!-- Hero Section -->
    <main class="flex flex-1">
        <section class="relative isolate flex flex-1 overflow-hidden bg-gradient-to-br from-[#FFF8F8] via-white to-[#FFF0F2]">

            <!-- Decorative Background -->
            <div class="pointer-events-none absolute -right-32 -top-32 h-96 w-96 rounded-full bg-red-100/50 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-40 left-0 h-80 w-80 rounded-full bg-red-50 blur-3xl"></div>

            <div class="relative mx-auto grid w-full max-w-7xl self-start gap-y-8 px-5 py-10 sm:py-12 lg:grid-cols-2 lg:gap-x-16 lg:gap-y-6 lg:px-8 lg:py-14">

                <!-- Left Content -->
                <div class="flex max-w-xl flex-col lg:col-start-1 lg:row-start-1">

                    <div class="mb-6 inline-flex self-start items-center gap-2 rounded-full border border-red-100 bg-white px-4 py-2 shadow-sm">
                        <span class="h-2 w-2 rounded-full bg-[#C90016]"></span>
                        <span class="text-xs font-semibold text-[#C90016] sm:text-sm">
                            রাজশাহীর মানুষের জন্য, রাজশাহীর মানুষের দ্বারা
                        </span>
                    </div>

                    <h2 class="text-4xl font-bold leading-[1.25] tracking-tight text-[#222222] sm:text-5xl lg:text-[56px]">
                        এক ফোঁটা রক্ত
                        <span class="block text-[#C90016]">একটি জীবনের আশা</span>
                    </h2>

                    <p class="mt-6 max-w-lg text-base leading-6 text-gray-800 sm:text-lg">
                        আপনার প্রয়োজনে খুঁজে নিন রক্তদাতা। <br>
                        অথবা নিজেই হয়ে উঠুন কারও জীবন বাঁচানোর একজন সহযাত্রী।
                    </p>

                    <!-- Action Buttons -->
                    <div class="mt-9 grid grid-cols-1 gap-3 sm:grid-cols-2 sm:gap-4 lg:mt-auto lg:pt-9">

                        
                        <!-- Blood Request -->
                        <a href="{{ url('/blood-request/create') }}" data-request-open
                            class="group flex items-center justify-between gap-3 rounded-2xl bg-[#C90016] px-5 py-4 text-left text-white shadow-lg shadow-red-200/70 transition duration-300 hover:-translate-y-1 hover:bg-[#A90012] hover:shadow-xl">

                            <div>
                                <span class="block text-lg font-bold">রক্ত প্রয়োজন?</span>
                                <span class="mt-0.5 block text-sm text-red-100">অনুরোধ পাঠান</span>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="transition group-hover:translate-x-1">
                                <path d="M7 17 17 7M7 7h10v10"/>
                            </svg>
                        </a>

                        <!-- Donor Registration -->
                        <a href="{{ url('/donor/register') }}"  
                            class="group flex items-center justify-between gap-3 rounded-2xl border border-red-200 bg-white px-5 py-4 text-left text-[#C90016] shadow-sm transition duration-300 hover:-translate-y-1 hover:border-[#C90016] hover:shadow-lg">
                            <div>
                                <span class="block text-lg font-bold">রক্তদাতা হোন</span>
                                <span class="mt-0.5 block text-sm text-gray-500">নিবন্ধন করুন</span>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="transition group-hover:translate-x-1">
                                <path d="M7 17 17 7M7 7h10v10"/>
                            </svg>
                        </a>

                    </div>

                    
                </div>

                <!-- Left Footer -->
                



                <!-- Right Content: Blood Groups -->
                <div id="blood-groups" class="flex w-full flex-col lg:col-start-2 lg:row-start-1">

                    <div class="mb-6 inline-flex self-start items-center gap-2 rounded-full border border-red-100 bg-white px-4 py-2 shadow-sm">
                        <span class="h-2 w-2 rounded-full bg-[#C90016]"></span>
                        <span class="text-xs font-semibold text-[#C90016] sm:text-sm">
                            আপনার প্রয়োজনীয় রক্তের গ্রুপ নির্বাচন করুন।
                        </span>
                    </div>

                    <div class="grid grid-cols-4 gap-2 sm:gap-4 lg:flex-1 lg:grid-rows-2">

                        @php
                            $bloodGroups = [
                                ['group' => 'A+', 'name' => 'এ পজিটিভ'],
                                ['group' => 'A-', 'name' => 'এ নেগেটিভ'],
                                ['group' => 'B+', 'name' => 'বি পজিটিভ'],
                                ['group' => 'B-', 'name' => 'বি নেগেটিভ'],
                                ['group' => 'O+', 'name' => 'ও পজিটিভ'],
                                ['group' => 'O-', 'name' => 'ও নেগেটিভ'],
                                ['group' => 'AB+', 'name' => 'এবি পজিটিভ'],
                                ['group' => 'AB-', 'name' => 'এবি নেগেটিভ'],
                            ];

                            $counts = $donorCounts ?? [];
                            $bn = fn ($n) => strtr((string) $n, ['0' => '০', '1' => '১', '2' => '২', '3' => '৩', '4' => '৪', '5' => '৫', '6' => '৬', '7' => '৭', '8' => '৮', '9' => '৯']);
                        @endphp

                        @foreach ($bloodGroups as $blood)
                            <a href="{{ url('/blood-request/create') }}?group={{ urlencode($blood['group']) }}" data-request-open data-group="{{ $blood['group'] }}"
                                class="flex flex-col justify-center group relative overflow-hidden rounded-2xl border border-gray-100 bg-white p-2.5 text-center shadow-sm transition duration-300 hover:-translate-y-1 hover:border-red-200 hover:shadow-xl hover:shadow-red-100/70 sm:p-4">

                                <div class="absolute right-0 top-0 h-10 w-10 rounded-bl-full sm:h-14 sm:w-14 bg-red-50 transition group-hover:bg-red-100"></div>

                                <div class="relative">
                                    <span class="block text-2xl font-bold tracking-tight text-[#C90016] sm:text-3xl">
                                        {{ $blood['group'] }}
                                    </span>

                                    <span class="mt-1 block text-[10px] font-medium text-gray-500 sm:text-xs">
                                        {{ $blood['name'] }}
                                    </span>

                                    <div class="mx-auto my-2 h-px w-8 bg-red-100"></div>

                                    <span class="block text-sm font-bold text-gray-800">
                                        {{ $bn($counts[$blood['group']] ?? 0) }} জন
                                    </span>

                                    <span class="mt-0.5 block text-[10px] text-gray-400 sm:text-xs">
                                        সক্রিয় ডোনার
                                    </span>
                                </div>
                            </a>
                        @endforeach

                    </div>

                    
                </div>

                <!-- Right Footer -->
                 
                


            </div>
        </section>
    </main>

    <!-- Trust Strip -->
    <section class="bg-[#C90016] text-white">
        @php
            $trust = [
                ['title' => 'নিরাপদ ও নির্ভরযোগ্য', 'desc' => 'যাচাইকৃত রক্তদাতা',
                 'icon' => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>'],
                ['title' => 'দ্রুত সেবা', 'desc' => 'জরুরি প্রয়োজনে পাশে',
                 'icon' => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>'],
                ['title' => 'একটি বড় কমিউনিটি', 'desc' => 'রাজশাহীর মানুষের জন্য',
                 'icon' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>'],
                ['title' => 'মানবতার বন্ধন', 'desc' => 'সবার জন্য, সবসময়',
                 'icon' => '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>'],
            ];
        @endphp

        <div class="mx-auto grid max-w-7xl grid-cols-2 gap-y-5 px-5 py-5 lg:grid-cols-4 lg:gap-y-0 lg:px-8 lg:py-6">
            @foreach ($trust as $item)
                <div class="flex items-center gap-3 lg:justify-center lg:px-4 {{ !$loop->first ? 'lg:border-l lg:border-white/25' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                         class="h-8 w-8 shrink-0 sm:h-9 sm:w-9">
                        {!! $item['icon'] !!}
                    </svg>
                    <div>
                        <span class="block text-sm font-bold leading-tight sm:text-base">{{ $item['title'] }}</span>
                        <span class="mt-0.5 block text-xs text-red-100 sm:text-sm">{{ $item['desc'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</div>

    <!-- How It Works -->
<section id="how-it-works" class="relative bg-white py-16 sm:py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold leading-4 tracking-tight text-[#222222] sm:text-4xl">
                কীভাবে কাজ করে
            </h2>
            <p class="mt-4 text-base leading-4 text-gray-600">
               আমাদের রাজশাহীতে কেউ যেন জরুরি সময়ে রক্তদাতা খুঁজে না পেয়ে অসহায় হয়ে না পড়েন।  <br> আপনার প্রয়োজনকে সঠিক মানুষের কাছে পৌঁছে দেওয়াই আমাদের লক্ষ্য। 
            </p>
        </div>

        @php
            $steps = [
                [
                    'no' => '০১',
                    'title' => 'রক্তের অনুরোধ পাঠান',
                    'desc' => 'রোগীর রক্তের গ্রুপ, প্রয়োজনীয় রক্তের পরিমাণ, অবস্থান, কখন লাগবে ও যোগাযোগের তথ্য দিয়ে সহজেই অনুরোধ জমা দিন।',
                    'icon' => '<path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"/>',
                ],
                [
                    'no' => '০২',
                    'title' => 'রক্তদাতাদের অবহিত করা হবে',
                    'desc' => 'আপনার অনুরোধটি স্বয়ংক্রিয়ভাবে ওই রক্তের গ্রুপের রক্তদাতাদের কাছে পৌঁছে যাবে। যে রক্তদাতা আগ্রহী হবে, তার ফোন নম্বর সহ বিস্তারিত আপনার কাছে চলে যাবে',
                    'icon' => '<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>',
                ],
                [
                    'no' => '০৩',
                    'title' => 'আমাদের স্বেচ্ছাসেবী টিম',
                    'desc' => 'নির্দিষ্ট সময়ের মধ্যে কোনো রক্তদাতা সাড়া না দিলে আমাদের স্বেচ্ছাসেবীরা ওই রক্তের গ্রুপের নিবন্ধিত অন্যান্য সকল রক্তদাতার সঙ্গে সরাসরি যোগাযোগ করবেন।',
                    'icon' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>',
                ],
                [
                    'no' => '০৪',
                    'title' => 'সামাজিক মাধ্যমে প্রচার',
                    'desc' => 'প্রয়োজন অনুযায়ী আপনার রক্তের অনুরোধ স্বয়ংক্রিয়ভাবে রাজশাহী কানেক্টের ফেসবুক পেজ ও বিভিন্ন রক্তদানবিষয়ক ফেসবুক গ্রুপে প্রকাশ করা হবে, যাতে আরও বেশি মানুষের কাছে পৌঁছানো যায়।',
                    'icon' => '<path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/>',
                ],
            ];
        @endphp

        <div class="mt-12 grid items-stretch gap-5 sm:auto-rows-fr sm:grid-cols-2 lg:mt-14 lg:grid-cols-4 lg:gap-5">
            @foreach ($steps as $step)
                <div class="group relative h-full overflow-hidden rounded-3xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-red-200 hover:shadow-xl hover:shadow-red-100/70">

                    <span class="absolute right-5 top-3 text-5xl font-bold leading-none text-red-50 transition group-hover:text-red-100">
                        {{ $step['no'] }}
                    </span>

                    <div class="relative">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#C90016] text-white shadow-lg shadow-red-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                {!! $step['icon'] !!}
                            </svg>
                        </div>

                        <h3 class="mt-5 text-lg font-bold leading-snug text-[#222222]">{{ $step['title'] }}</h3>
                        <p class="mt-2.5 text-sm leading-6 text-gray-600">{{ $step['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        



    <div class="mx-auto mt-10 w-full max-w-3xl">
    <div class="flex items-center justify-center gap-3 rounded-2xl border border-red-100 bg-red-50 px-5 py-4" role="note">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0 text-[#C90016]">
        <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"/>
        <path d="M12 9v4M12 17h.01"/>
    </svg>

        <p class="text-center text-sm font-medium leading-6 text-gray-700 sm:text-base">
            <span class="font-bold text-[#C90016]">Rajshahi Connect</span>
            সম্পূর্ণ বিনামূল্যে মানবিক সহযোগিতার একটি উদ্যোগ।
            <span class="font-bold text-[#C90016]">যেকোনো লেনদেন থেকে বিরত থাকুন।</span>
        </p>
    </div>
</div>
</section>

    
    <script>
        (function () {
            const btn = document.getElementById('menu-btn');
            const menu = document.getElementById('mobile-menu');
            if (!btn || !menu) return;
            const setOpen = (open) => {
                menu.classList.toggle('hidden', !open);
                btn.setAttribute('aria-expanded', open ? 'true' : 'false');
            };
            btn.addEventListener('click', () => setOpen(menu.classList.contains('hidden')));
            menu.querySelectorAll('a').forEach((a) => a.addEventListener('click', () => setOpen(false)));
            window.matchMedia('(min-width: 1024px)').addEventListener('change', (e) => { if (e.matches) setOpen(false); });
        })();
    </script>

    <!-- Blood Request Modal -->
    <div id="request-modal" class="fixed inset-0 z-50 hidden items-end justify-center bg-black/45 sm:items-center sm:p-4" role="dialog" aria-modal="true" aria-labelledby="request-title">
        <div class="max-h-[92vh] w-full max-w-md overflow-y-auto rounded-t-3xl bg-white p-5 shadow-2xl sm:rounded-3xl sm:p-6">

            <div class="flex items-start justify-between gap-3">
                <div>
                    <h3 id="request-title" class="text-xl font-bold text-[#222222]">রক্তের অনুরোধ</h3>
                    <p class="mt-1 text-sm leading-6 text-gray-500">অনুরোধ পাঠালে মিল আছে এমন রক্তদাতাদের কাছে বার্তা যাবে।</p>
                </div>
                <button type="button" data-request-close aria-label="বন্ধ করুন"
                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full text-gray-400 transition hover:bg-gray-100 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                </button>
            </div>

            @if ($errors->any())
                <div class="mt-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-[#C90016]">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ url('/blood-request') }}" class="mt-5 space-y-5">
                @csrf

                <fieldset>
                    <legend class="mb-2 text-sm font-semibold text-gray-700">রোগীর ব্লাড গ্রুপ</legend>
                    <div class="grid grid-cols-4 gap-2">
                        @foreach (['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $g)
                            <label class="cursor-pointer">
                                <input type="radio" name="blood_group" value="{{ $g }}" required class="peer sr-only" @checked(old('blood_group') === $g)>
                                <span class="block rounded-xl border border-gray-200 py-2 text-center text-sm font-bold text-gray-600 transition peer-checked:border-[#C90016] peer-checked:bg-red-50 peer-checked:text-[#C90016] peer-focus-visible:ring-2 peer-focus-visible:ring-red-300">{{ $g }}</span>
                            </label>
                        @endforeach
                    </div>
                    <p class="mt-2 text-xs leading-5 text-gray-400">রিপোর্ট বা হাসপাতালের কাছ থেকে গ্রুপ নিশ্চিত হয়ে নিন।</p>
                </fieldset>

                <fieldset>
                    <legend class="mb-2 text-sm font-semibold text-gray-700">কত ব্যাগ লাগবে?</legend>
                    <div class="flex gap-2">
                        @foreach (['1' => '১', '2' => '২', '3' => '৩', '4' => '৪+'] as $v => $label)
                            <label class="cursor-pointer">
                                <input type="radio" name="bags" value="{{ $v }}" required class="peer sr-only" @checked(old('bags', '1') === (string) $v)>
                                <span class="block min-w-12 rounded-full border border-gray-200 px-4 py-1.5 text-center text-sm font-medium text-gray-600 transition peer-checked:border-[#C90016] peer-checked:bg-red-50 peer-checked:font-bold peer-checked:text-[#C90016] peer-focus-visible:ring-2 peer-focus-visible:ring-red-300">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="mb-2 text-sm font-semibold text-gray-700">কখন লাগবে?</legend>
                    <div class="flex flex-wrap gap-2">
                        @foreach (['now' => 'এখনই', 'today' => 'আজ', 'tomorrow' => 'কাল'] as $v => $label)
                            <label class="cursor-pointer">
                                <input type="radio" name="needed_when" value="{{ $v }}" required class="peer sr-only" @checked(old('needed_when', 'now') === $v)>
                                <span class="block rounded-full border border-gray-200 px-4 py-1.5 text-sm font-medium text-gray-600 transition peer-checked:border-[#C90016] peer-checked:bg-red-50 peer-checked:font-bold peer-checked:text-[#C90016] peer-focus-visible:ring-2 peer-focus-visible:ring-red-300">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </fieldset>

                <div>
                    <label for="hospital" class="mb-2 block text-sm font-semibold text-gray-700">হাসপাতাল বা স্থান</label>
                    <input id="hospital" name="hospital" type="text" required maxlength="120" value="{{ old('hospital') }}"
                        placeholder="যেমন: রাজশাহী মেডিকেল কলেজ হাসপাতাল"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:border-[#C90016] focus:outline-none focus:ring-2 focus:ring-red-100">
                </div>

                <div>
                    <label for="phone" class="mb-2 block text-sm font-semibold text-gray-700">আপনার মোবাইল নম্বর</label>
                    <input id="phone" name="phone" type="tel" inputmode="numeric" required value="{{ old('phone') }}"
                        pattern="01[3-9][0-9]{8}" maxlength="11" placeholder="01XXXXXXXXX"
                        title="১১ ডিজিটের বাংলাদেশি মোবাইল নম্বর দিন (যেমন 01712345678)"
                        class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:border-[#C90016] focus:outline-none focus:ring-2 focus:ring-red-100">
                    <p class="mt-2 text-xs leading-5 text-gray-400">রক্তদাতা রাজি হলে তবেই আপনার নম্বর তাঁকে দেখানো হবে।</p>
                </div>

                <button type="submit"
                    class="w-full rounded-2xl bg-[#C90016] px-5 py-3.5 text-base font-bold text-white shadow-lg shadow-red-200/70 transition hover:bg-[#A90012]">
                    অনুরোধ পাঠান
                </button>
            </form>
        </div>
    </div>

    <script>
        (function () {
            const modal = document.getElementById('request-modal');
            if (!modal) return;

            const open = (group) => {
                if (group) {
                    const radio = modal.querySelector('input[name="blood_group"][value="' + group + '"]');
                    if (radio) radio.checked = true;
                }
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            };
            const close = () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            };

            document.querySelectorAll('[data-request-open]').forEach((el) => {
                el.addEventListener('click', (e) => {
                    e.preventDefault();
                    open(el.dataset.group || null);
                });
            });
            modal.querySelectorAll('[data-request-close]').forEach((el) => el.addEventListener('click', close));
            modal.addEventListener('click', (e) => { if (e.target === modal) close(); });
            document.addEventListener('keydown', (e) => { if (e.key === 'Escape') close(); });

            @if ($errors->any() || session()->has('open_request'))
                open(@json(session('open_request') ?: null));
            @endif
        })();
    </script>

    @if (session('request_sent'))
        <div id="request-toast" role="status"
            class="fixed inset-x-4 top-4 z-[60] mx-auto flex max-w-md items-start gap-3 rounded-2xl border border-red-100 bg-white p-4 shadow-xl shadow-red-100/70">
            <span class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#C90016] text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 5 5L20 7"/></svg>
            </span>
            <div class="flex-1">
                <p class="font-bold text-[#222222]">আপনার অনুরোধ জমা হয়েছে</p>
                <p class="mt-0.5 text-sm leading-6 text-gray-600">আপনার দেওয়া নম্বরটি খোলা রাখুন।</p>
            </div>
            <button type="button" aria-label="বন্ধ করুন" onclick="this.closest('#request-toast').remove()"
                class="text-gray-400 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
        </div>
        <script>setTimeout(function () { var t = document.getElementById('request-toast'); if (t) t.remove(); }, 8000);</script>
    @endif

</body>
</html>