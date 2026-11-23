<?php

namespace App\Http\Controllers;

use App\Models\BloodRequest;
use App\Models\Donor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BloodRequestController extends Controller
{
    /**
     * /blood-request/create সরাসরি খুললে হোমপেজে গিয়ে মডাল খুলবে
     * (জাভাস্ক্রিপ্ট বন্ধ থাকলেও কার্ডের লিংক কাজ করবে)।
     */
    public function create(Request $request): RedirectResponse
    {
        $group = $request->query('group');

        return redirect('/')->with('open_request', in_array($group, Donor::BLOOD_GROUPS, true) ? $group : '');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'blood_group' => ['required', Rule::in(Donor::BLOOD_GROUPS)],
            'bags' => ['required', 'integer', 'between:1,4'],
            'needed_when' => ['required', Rule::in(BloodRequest::NEEDED_WHEN)],
            'hospital' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'regex:/^01[3-9][0-9]{8}$/'],
        ], [
            'blood_group.required' => 'রোগীর ব্লাড গ্রুপ বেছে নিন।',
            'blood_group.in' => 'সঠিক ব্লাড গ্রুপ বেছে নিন।',
            'bags.required' => 'কত ব্যাগ লাগবে তা বেছে নিন।',
            'needed_when.required' => 'কখন লাগবে তা বেছে নিন।',
            'hospital.required' => 'হাসপাতাল বা স্থানের নাম লিখুন।',
            'phone.required' => 'আপনার মোবাইল নম্বর দিন।',
            'phone.regex' => '১১ ডিজিটের সঠিক বাংলাদেশি মোবাইল নম্বর দিন (যেমন 01712345678)।',
        ]);

        BloodRequest::create($data + [
            'public_token' => (string) Str::uuid(),
            'status' => 'open',
        ]);

        return redirect('/')->with('request_sent', true);
    }
}
