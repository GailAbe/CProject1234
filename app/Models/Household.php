<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Household extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'household_number',
        'purok_name',
        'family_head',
        'fhead_name',
        'fhead_gender',
        'fhead_bdate',
        'fhead_bplace',
        'fhead_cstatus'
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function members()
    {
        return $this->hasMany(Household_member::class);
    }
}
