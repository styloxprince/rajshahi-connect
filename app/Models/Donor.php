<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    public const BLOOD_GROUPS = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'];

    public const AREAS = [
        'বোয়ালিয়া',
        'রাজপাড়া',
        'মতিহার',
        'শাহ মখদুম',
        'চন্দ্রিমা',
        'কাশিয়াডাঙ্গা',
        'রাজশাহীর অন্য এলাকা',
    ];

    protected $fillable = [
        'name',
        'phone',
        'blood_group',
        'area',
        'last_donated_at',
        'is_available',
        'consented_at',
    ];

    protected function casts(): array
    {
        return [
            'last_donated_at' => 'date',
            'is_available' => 'boolean',
            'consented_at' => 'datetime',
        ];
    }
}
