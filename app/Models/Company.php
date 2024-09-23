<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'industry',
        'address',
        'country',
        'city',
        'phone',
        'email',
        'validity_date',
        'status'
    ];
}
