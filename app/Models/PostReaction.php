<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostReaction extends Model
{
    /** @use HasFactory<\Database\Factories\PostReactionFactory> */
    use HasFactory;
    protected $fillable = [
        'post_id',
        'user_id',
        'reaction_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reaction(){
        return $this->belongsTo(Reaction::class);
    }
}
