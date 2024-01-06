<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\SexEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use RKocak\Gravatar\Facades\Gravatar;
use RKocak\Gravatar\Traits\HasGravatar;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasGravatar;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'birth_date',
        'job_title',
        'sex',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth_date' => 'datetime:Y/m/d',
        'sex' => SexEnum::class,
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getNameAttribute(): string
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function getProfilePhotoUrlAttribute(): string
    {
        if ($this->profile_photo_path) {
            return  Storage::disk($this->profilePhotoDisk())
                ->url($this->profile_photo_path);
        } elseif (Gravatar::exists($this->email)) {
            return Gravatar::url($this->email);
        }
        return $this->defaultProfilePhotoUrl();
    }

    public function isCompleted(): bool
    {
        if(empty($this->birth_date) || empty($this->job_title) || empty($this->sex)) {
            return false;
        }
        return true;
    }

    public function getAgeAttribute(): string | null
    {
        return !empty($this->birth_date) ?
            verta()->parse($user->birth_date)->diffYears() . ' ' . __('years old') :
            null;
    }
}
