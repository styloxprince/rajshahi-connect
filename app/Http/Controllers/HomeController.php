<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // প্রতি ব্লাড গ্রুপে সক্রিয় ডোনার (১ মিনিট ক্যাশ)
        $donorCounts = Cache::remember('donor_counts_by_group', 60, function (): array {
            return Donor::where('is_available', true)
                ->selectRaw('blood_group, count(*) as total')
                ->groupBy('blood_group')
                ->pluck('total', 'blood_group')
                ->all();
        });

        return view('welcome', ['donorCounts' => $donorCounts]);
    }
}