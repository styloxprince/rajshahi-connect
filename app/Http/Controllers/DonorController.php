<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class DonorController extends Controller
{
    public function create(): View
    {
        return view('donor.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'regex:/^01[3-9][0-9]{8}$/', 'unique:donors,phone'],
            'blood_group' => ['required', Rule::in(Donor::BLOOD_GROUPS)],
            'area' => ['required', Rule::in(Donor::AREAS)],
            'last_donated_at' => ['nullable', 'date', 'before_or_equal:today'],
            'consent' => ['accepted'],
        ], [
            'name.required' => 'আপনার নাম লিখুন।',
            'phone.required' => 'মোবাইল নম্বর দিন।',
            'phone.regex' => '১১ ডিজিটের সঠিক বাংলাদেশি মোবাইল নম্বর দিন (যেমন 01712345678)।',
            'phone.unique' => 'এই নম্বরটি আগেই নিবন্ধিত হয়েছে।',
            'blood_group.required' => 'আপনার ব্লাড গ্রুপ বেছে নিন।',
            'blood_group.in' => 'সঠিক ব্লাড গ্রুপ বেছে নিন।',
            'area.required' => 'আপনার এলাকা বেছে নিন।',
            'area.in' => 'তালিকা থেকে এলাকা বেছে নিন।',
            'last_donated_at.date' => 'সঠিক তারিখ দিন।',
            'last_donated_at.before_or_equal' => 'তারিখ আজকের পরের হতে পারবে না।',
            'consent.accepted' => 'এগিয়ে যেতে সম্মতি দিন।',
        ]);

        Donor::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'blood_group' => $data['blood_group'],
            'area' => $data['area'],
            'last_donated_at' => $data['last_donated_at'] ?? null,
            'is_available' => true,
            'consented_at' => now(),
        ]);

        return redirect()->route('donor.register')->with('success', $data['name']);
    }
}
