<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestSchudules extends Model
{
    use HasFactory;

    protected $table = 'testSchedules';

    protected $fillable = [
        'test_date',
        'test_type',
        'location',
        'email_sent',
    ];
}
