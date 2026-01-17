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
}
