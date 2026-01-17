<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RatingEvent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'player_id',
        'game_id',
        'matchup_id',
        'rating_delta',
        'rd_delta',
        'volatility_delta',
        'is_valid',
        'applied_at'
    ];
}
