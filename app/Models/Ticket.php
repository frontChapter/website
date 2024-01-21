<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use RKocak\Gravatar\Facades\Gravatar;

class Ticket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'price',
        'mobile',
        'email',
        'last_name',
        'first_name',
        'ticket_id',
        'ticket_title',
        'ticket_price',
        'ticket_description',
        'discount_code',
        'discount_percentage',
        'discount_price',
        'order_price',
        'data',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'data',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'data' => 'object',
    ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'buyer_profile_photo_url',
        'buyer_name',
    ];

    /**
     * Get the user that owns the UtmVisit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function getBuyerNameAttribute(): string
    {
        if(is_null($this->user)) {
            return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
        }
        return $this->user->attributes['first_name'] . ' ' . $this->user->attributes['last_name'];
    }

    public function getBuyerProfilePhotoUrlAttribute(): string
    {
        if(is_null($this->user)) {
            return Gravatar::for($this->email ?? '')->default('identicon')->get();
        }
        return $this->user->profile_photo_url;
    }
}
