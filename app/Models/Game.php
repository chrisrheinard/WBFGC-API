<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'avatar',
    ];

    /**
     * Relationships
     */
    public function gameCharacter()
    {
        return $this->hasMany(GameCharacter::class);
    }

    public function tournament()
    {
        return $this->hasMany(Tournament::class);
    }

    public function playerRating()
    {
        return $this->hasMany(PlayerRating::class);
    }

    public function ratingEvent()
    {
        return $this->hasMany(RatingEvent::class);
    }

     /**
     * Relationships (Inverse)
     */ 
}
