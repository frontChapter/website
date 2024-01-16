<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtmVisit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'utm_campaign',
        'utm_medium',
        'utm_source',
        'utm_term',
        'utm_content',
        'referer',
        'user_ip_address',
        'user_id',
    ];

}

