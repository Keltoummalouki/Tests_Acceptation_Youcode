<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateInfo extends Model
{
    use HasFactory;

    protected $table = 'candidateInfo';

    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'city',
        'date_of_birth',
        'document_type',
        'document_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


