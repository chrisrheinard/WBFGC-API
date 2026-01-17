<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerRating extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'player_id',
        'game_id',
        'rating',
        'rating_deviation',
        'volatility',
    ];

    /**
     * Relationships
     */

     /**
     * Relationships (Inverse)
     */ 
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
