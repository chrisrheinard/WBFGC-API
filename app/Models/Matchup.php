<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matchup extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'tournament_id',
        'state',
        'bracket_round',
        'best_of',
        'winner_player_id',
    ];

    /**
     * Relationships
     */
    public function matchGame()
    {
        return $this->hasMany(MatchGame::class);
    }

    public function ratingEvent()
    {
        return $this->hasMany(RatingEvent::class);
    }
    
    /**
     * Relationships (Inverse)
     */ 
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
