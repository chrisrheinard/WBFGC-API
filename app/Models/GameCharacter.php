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
}
