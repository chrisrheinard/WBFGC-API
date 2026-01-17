<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'player_id',
        'seed',
        'tournament_id',
    ];

    /**
     * Relationships
     */

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
