<!DOCTYPE html>
<html lang="bn" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#C90016">
    <title>রক্তদাতা হোন — রাজশাহী কানেক্ট</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-sans text-[#222222] antialiased">

    <!-- Header -->
    <header class="border-b border-gray-100 bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 lg:px-8">
            <a href="{{ url('/') }}" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="রাজশাহী কানেক্ট" class="h-12 w-auto sm:h-14">
            </a>
            <a href="{{ url('/') }}"
                class="rounded-xl border border-gray-200 px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:border-[#C90016] hover:text-[#C90016]">
                হোমে ফিরুন
            </a>
        </div>
    </header>

    <main class="relative isolate overflow-hidden bg-[#FFF8F8]">
        <div class="pointer-events-none absolute -right-32 -top-32 h-96 w-96 rounded-full bg-red-100/50 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-40 left-0 h-80 w-80 rounded-full bg-red-50 blur-3xl"></div>

        <div class="relative mx-auto grid max-w-7xl items-start gap-10 px-5 py-10 sm:py-14 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-16">

            <!-- Left: why register -->
            <div class="max-w-xl">
                <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-red-100 bg-white px-4 py-2 shadow-sm">
                    <span class="h-2 w-2 rounded-full bg-[#C90016]"></span>
                    <span class="text-xs font-semibold text-[#C90016] sm:text-sm">রক্তদাতা নিবন্ধন</span>
                </div>

                <h1 class="text-4xl font-bold leading-[1.25] tracking-tight text-[#222222] sm:text-5xl">
                    আপনার রক্ত,
                    <span class="block text-[#C90016]">কারও নতুন সকাল</span>
                </h1>

                <p class="mt-6 text-base leading-8 text-gray-600 sm:text-lg">
                    নিবন্ধন করলে রাজশাহীতে আপনার গ্রুপের রক্ত লাগলেই আপনাকে বার্তা পাঠানো হবে। যাবেন কি না, সেটা আপনার সিদ্ধান্ত।
                </p>

                <ul class="mt-8 space-y-4">
                    @foreach ([
                        ['আপনার নম্বর গোপন থাকবে', 'কেউ রাজি হলে তবেই রক্তগ্রহীতার কাছে আপনার নম্বর যাবে, তার আগে নয়।'],
                        ['শুধু প্রয়োজনে বার্তা', 'আপনার গ্রুপ ও এলাকার সঙ্গে মিললে তবেই আপনাকে ডাকা হবে।'],
                        ['যখন খুশি বিরতি নিন', 'রক্তদানের পর কিছুদিন আপনাকে নিজে থেকেই বিরতিতে রাখা হবে।'],
                    ] as [$title, $desc])
                        <li class="flex gap-3">
                            <span class="mt-1 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-[#C90016] text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 5 5L20 7"/></svg>
                            </span>
                            <div>
                                <p class="font-bold text-[#222222]">{{ $title }}</p>
                                <p class="mt-0.5 text-sm leading-6 text-gray-600">{{ $desc }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Right: form or success -->
            <div class="w-full">
                @if (session('success'))
                    <div class="rounded-3xl border border-gray-100 bg-white p-8 text-center shadow-xl shadow-red-100/60 sm:p-10">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#C90016] text-white shadow-lg shadow-red-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 5 5L20 7"/></svg>
                        </div>
                        <h2 class="mt-5 text-2xl font-bold text-[#222222]">ধন্যবাদ, {{ session('success') }}</h2>
                        <p class="mt-3 text-base leading-7 text-gray-600">
                            আপনি রক্তদাতা হিসেবে নিবন্ধিত হয়েছেন। আপনার গ্রুপের রক্ত লাগলে আপনাকে জানানো হবে।
                        </p>
                        <a href="{{ url('/') }}"
                            class="mt-7 inline-block rounded-2xl bg-[#C90016] px-7 py-3.5 text-base font-bold text-white shadow-lg shadow-red-200/70 transition hover:bg-[#A90012]">
                            হোমে ফিরুন
                        </a>
                    </div>
                @else
                    <form method="POST" action="{{ route('donor.store') }}" novalidate
                        class="rounded-3xl border border-gray-100 bg-white p-6 shadow-xl shadow-red-100/60 sm:p-8">
                        @csrf

                        <h2 class="text-2xl font-bold text-[#222222]">রক্তদাতা হিসেবে যুক্ত হোন</h2>
                        <p class="mt-1 text-sm text-gray-500">নিচের তথ্যগুলো দিন, এক মিনিটেরও কম সময় লাগবে।</p>

                        <div class="mt-6 space-y-5">

                            <div>
                                <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">আপনার নাম</label>
                                <input id="name" name="name" type="text" required maxlength="100" value="{{ old('name') }}"
                                    autocomplete="name"
                                    class="w-full rounded-xl border px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:border-[#C90016] focus:outline-none focus:ring-2 focus:ring-red-100 @error('name') border-red-400 @else border-gray-200 @enderror">
                                @error('name') <p class="mt-1.5 text-xs text-[#C90016]">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="phone" class="mb-2 block text-sm font-semibold text-gray-700">মোবাইল নম্বর</label>
                                <input id="phone" name="phone" type="tel" inputmode="numeric" required maxlength="11"
                                    value="{{ old('phone') }}" placeholder="01XXXXXXXXX" autocomplete="tel"
                                    class="w-full rounded-xl border px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:border-[#C90016] focus:outline-none focus:ring-2 focus:ring-red-100 @error('phone') border-red-400 @else border-gray-200 @enderror">
                                @error('phone') <p class="mt-1.5 text-xs text-[#C90016]">{{ $message }}</p> @enderror
                            </div>

                            <fieldset>
                                <legend class="mb-2 text-sm font-semibold text-gray-700">আপনার ব্লাড গ্রুপ</legend>
                                <div class="grid grid-cols-4 gap-2">
                                    @foreach (\App\Models\Donor::BLOOD_GROUPS as $g)
                                        <label class="cursor-pointer">
                                            <input type="radio" name="blood_group" value="{{ $g }}" class="peer sr-only" @checked(old('blood_group') === $g)>
                                            <span class="block rounded-xl border border-gray-200 py-2 text-center text-sm font-bold text-gray-600 transition peer-checked:border-[#C90016] peer-checked:bg-red-50 peer-checked:text-[#C90016] peer-focus-visible:ring-2 peer-focus-visible:ring-red-300">{{ $g }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('blood_group') <p class="mt-1.5 text-xs text-[#C90016]">{{ $message }}</p> @enderror
                            </fieldset>

                            <div>
                                <label for="area" class="mb-2 block text-sm font-semibold text-gray-700">আপনার এলাকা</label>
                                <select id="area" name="area" required
                                    class="w-full rounded-xl border bg-white px-4 py-2.5 text-sm text-gray-800 focus:border-[#C90016] focus:outline-none focus:ring-2 focus:ring-red-100 @error('area') border-red-400 @else border-gray-200 @enderror">
                                    <option value="">এলাকা বেছে নিন</option>
                                    @foreach (\App\Models\Donor::AREAS as $area)
                                        <option value="{{ $area }}" @selected(old('area') === $area)>{{ $area }}</option>
                                    @endforeach
                                </select>
                                @error('area') <p class="mt-1.5 text-xs text-[#C90016]">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="last_donated_at" class="mb-2 block text-sm font-semibold text-gray-700">
                                    শেষ কবে রক্ত দিয়েছেন <span class="font-normal text-gray-400">(ঐচ্ছিক)</span>
                                </label>
                                <input id="last_donated_at" name="last_donated_at" type="date" max="{{ now()->toDateString() }}"
                                    value="{{ old('last_donated_at') }}"
                                    class="w-full rounded-xl border px-4 py-2.5 text-sm text-gray-800 focus:border-[#C90016] focus:outline-none focus:ring-2 focus:ring-red-100 @error('last_donated_at') border-red-400 @else border-gray-200 @enderror">
                                <p class="mt-1.5 text-xs text-gray-400">কখনো না দিয়ে থাকলে ঘরটি খালি রাখুন।</p>
                                @error('last_donated_at') <p class="mt-1.5 text-xs text-[#C90016]">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="flex cursor-pointer items-start gap-3">
                                    <input type="checkbox" name="consent" value="1" @checked(old('consent'))
                                        class="mt-1 h-4 w-4 shrink-0 rounded border-gray-300 text-[#C90016] focus:ring-red-200">
                                    <span class="text-sm leading-6 text-gray-600">
                                        আমি রক্তদাতা হিসেবে যুক্ত হতে চাই এবং আমার গ্রুপের রক্ত লাগলে আমাকে বার্তা পাঠানোর অনুমতি দিচ্ছি।
                                    </span>
                                </label>
                                @error('consent') <p class="mt-1.5 text-xs text-[#C90016]">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <button type="submit"
                            class="mt-7 w-full rounded-2xl bg-[#C90016] px-5 py-3.5 text-base font-bold text-white shadow-lg shadow-red-200/70 transition hover:-translate-y-0.5 hover:bg-[#A90012]">
                            নিবন্ধন করুন
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </main>

</body>
</html>
