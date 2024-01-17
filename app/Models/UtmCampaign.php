<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UtmCampaign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'utm_campaign',
        'title',
        'description',
        'created_by',
    ];

    /**
     * Get the creator that owns the UtmVisit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the utmVisits for the UtmVisits
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function utmVisits(): HasMany
    {
        return $this->hasMany(UtmVisit::class, 'utm_campaign', 'utm_campaign');
    }
}
