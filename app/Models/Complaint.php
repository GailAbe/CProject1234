<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'complainant',
        'date_time',
        'witness',
        'complaint_to',
        'notes',
    ];

    protected $casts = [
        'date_time' => 'datetime',
    ];

    public function images()
    {
        return $this->hasOne(Complaint_image::class);
    }
}
