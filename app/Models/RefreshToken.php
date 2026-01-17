<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefreshToken extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'token_hash',
        'expires_at',
        'revoked_at',
    ];

    /**
     * Relationships
     */

     /**
     * Relationships (Inverse)
     */ 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
