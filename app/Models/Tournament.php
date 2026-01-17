<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'state',
        'name',
        'url',
        'tournament_type',
        'game_id',
        'is_public',
        'description',
        'start_at',
        'end_at'
    ];

    /**
     * Relationships
     */
    public function participant()
    {
        return $this->hasMany(Participant::class);
    }

    public function matchup()
    {
        return $this->hasMany(Matchup::class);
    }

     /**
     * Relationships (Inverse)
     */ 
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
