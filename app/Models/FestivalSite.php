<?php

namespace App\Models;

use App\Enums\FestivalSiteStatus;
use App\Traits\Uuids;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Storage;

class FestivalSite extends Model implements Viewable
{
    use HasFactory, Uuids;
    use InteractsWithViews;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'user_id',
        'app_id',
        'name',
        'count',
        'url',
        'logo',
        'status',
        'score',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'app_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => FestivalSiteStatus::class,
    ];

    /**
     * Get all of the votes for the festival site.
     */
    public function votes(): MorphToMany
    {
        return $this->morphToMany(Vote::class, 'votable')->withTimestamps();;
    }

    /**
     * Get the user that owns the site
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getLogoUrlAttribute(): string|null
    {
        if ($this->logo && Storage::disk('public')->exists($this->logo)) {
            return Storage::disk('public')->url($this->logo);
        }

        return asset('images/thumbnail.jpg');
    }
}
