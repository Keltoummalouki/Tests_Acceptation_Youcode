<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateInfo extends Model
{
    use HasFactory;

    protected $table = 'candidateInfo';

    protected $fillable = [
        'phone',
        'address',
        'city',
        'date_of_birth',
        'zip',
        'document_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


