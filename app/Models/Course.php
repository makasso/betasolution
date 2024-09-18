<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'objectives',
        'prerequisites',
        'private_link',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $casts = [
        'created_at' => 'date:d-m-Y',
    ];

    public function scopeSearch($query, $value)
    {
        $query->where('title', 'like', "%{$value}%");
    }

    public function scopeSearchCategory($query, $value)
    {
        if ($value) {
            $query->where('category_id', $value);
        }
    }

}
