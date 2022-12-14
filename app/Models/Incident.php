<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incident extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'victim',
        'date',
        'location',
        'cause',
        'incident_description',
        'injury',
        'person_involved'
    ];

    protected $casts = [
        'date' => 'datetime'
    ];
}
