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
}
