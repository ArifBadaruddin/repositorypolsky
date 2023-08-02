<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $guarded = ['id'];
    // protected $fillable = [
    //     'name',
    //     'username',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function scopeFilter($query , array $filters)
    {



        $query->when($filters['keyword'] ?? false, function($query, $search) {
            return $query->where('nama', 'like', '%'. $search . '%')
                         ->orWhere('nomorinduk','like', '%'. $search . '%');
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


     public function posts()
     {
         return $this->hasMany(post::class);
     }

     public function users()
     {
         return $this->hasMany(post::class);
     }




}
