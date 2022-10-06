<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Household_member extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'gender',
        'bdate',
        'bplace',
        'cstatus'
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function household()
    {
        return $this->belongsTo(Household::class, 'household_id');
    }
}
