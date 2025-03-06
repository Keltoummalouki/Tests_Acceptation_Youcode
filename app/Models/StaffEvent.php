<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffEvent extends Model
{
    use HasFactory;

    protected $table = 'staffEvents';

    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'time_start' => 'datetime',
        'time_end' => 'datetime',
    ];

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
