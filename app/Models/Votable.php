<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Votable extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'vote_id',
        'voteable_id',
        'voteable_name',
        'vote',
    ];

    /**
     * Get the vote that owns the votable
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voted(): BelongsTo
    {
        return $this->belongsTo(Vote::class);
    }

    /**
     * Get the Voter user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
