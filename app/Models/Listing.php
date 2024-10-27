<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'tag',
        'email',
        'link',
        'image',
        'approved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //filter search
    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        if ($filters['search'] ?? false) {
            // dd($filters);
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('desc', 'like', '%' . request('search') . '%');
        }
    }
}
