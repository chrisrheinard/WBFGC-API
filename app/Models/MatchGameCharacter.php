<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchGameCharacter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'match_game_id',
        'player_id',
        'game_character_id',
    ];
}
