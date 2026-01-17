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
}
