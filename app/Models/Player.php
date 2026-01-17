<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'nickname',
        'phone',
        'address',
        'biodata',
        'social_media',
        'avatar',
    ];

    /**
     * Relationships
     */
    public function matchup()
    {
        return $this->hasMany(Matchup::class);
    }

    public function matchGame()
    {
        return $this->hasMany(MatchGame::class);
    }

    public function matchGameCharacter()
    {
        return $this->hasMany(MatchGameCharacter::class);
    }

    public function participant()
    {
        return $this->hasMany(Participant::class);
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
