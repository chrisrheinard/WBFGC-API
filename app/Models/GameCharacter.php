<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameCharacter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'game_id',
        'name',
        'avatar'
    ];

    /**
     * Relationships
     */
    public function matchGameCharacter()
    {
        return $this->hasMany(MatchGameCharacter::class);
    }

     /**
     * Relationships (Inverse)
     */ 
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
