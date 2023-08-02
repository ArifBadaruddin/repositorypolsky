<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function posts()
    {
        return $this->hasMany(post::class);
    }

    public function scopeFilter($query , array $filters)
    {



        $query->when($filters['keyword'] ?? false, function($query, $search) {
            return $query->where('name', 'like', '%'. $search . '%');
        });


        // // ini dimatikan saja dulu
        // $query->when($filters['author'] ?? false, fn($query, $author) =>
        //     $query->whereHas('user', fn($query) =>
        //          $query->where('ketua', $author)
        //     )
        //     );
    }


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

}
