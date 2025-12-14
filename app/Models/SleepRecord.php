<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SleepRecord extends Model
{
    protected $table = 'sleep_records';

    protected $fillable = [
        'user_id',
        'date',
        'sleep_time',
        'wake_time',
        'sleep_minutes',
        'quality',
    ];

    public $timestamps = true;
}
