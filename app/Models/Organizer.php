<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
        'biodata',
        'social_media',
        'avatar',
    ];

    /**
     * Relationships
     */

     /**
     * Relationships (Inverse)
     */ 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
