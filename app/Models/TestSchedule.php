<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestSchedule extends Model
{

    protected $table = 'testSchedules';

    protected $fillable = [
        'candidateInfo_id',
        'staff_id',
        'test_date',
        'test_type',
        'location',
        'email_sent',
    ];

    protected $casts = [
        'test_date' => 'datetime',
        'email_sent' => 'boolean',
    ];

    public function candidateInfo()
    {
        return $this->belongsTo(CandidateInfo::class, 'candidateInfo_id');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}