<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    public const NEEDED_WHEN = ['now', 'today', 'tomorrow'];

    protected $fillable = [
        'public_token',
        'blood_group',
        'bags',
        'needed_when',
        'hospital',
        'phone',
        'status',
    ];
}
