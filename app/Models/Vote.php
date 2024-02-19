<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Vote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'icon',
        'title',
        'description',
        'created_by',
    ];

    /**
     * Get the creator that owns the vote
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the festivalSites that are assigned this vote.
     */
    public function festivalSites(): MorphToMany
    {
        return $this->morphedByMany(FestivalSite::class, 'votable')
            ->withPivot('vote')
            ->withTimestamps();
    }
}
