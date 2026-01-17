<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchGame extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'matchup_id',
        'game_number',
        'winner_player_id',
    ];
}
