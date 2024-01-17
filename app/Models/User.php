<?php

namespace App\Models;

use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;
use App\Enums\SexEnum;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use RKocak\Gravatar\Facades\Gravatar;
use RKocak\Gravatar\Traits\HasGravatar;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, FilamentUser
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasGravatar;
    use HasSuperAdmin;
    use SoftDeletes;
    use HasRoles;
    use HasPermissions;

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

    public function canAccessPanel(Panel $panel): bool
    {
        if (app()->environment() === 'dev') {
            return true;
        }

        return $this->hasVerifiedEmail() && $this->hasAnyRole(['Super Admin', 'admin', 'admin-panel']);
    }

    /**
     * Get User Attributes
     */
    public function attributes(): HasMany
    {
        return $this->hasMany(UserAttribute::class);
    }

    /**
     * Get User Attributes
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function getNameAttribute(): string
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function getProfilePhotoUrlAttribute(): string
    {
        try {
            if ($this->profile_photo_path) {
                return Storage::disk($this->profilePhotoDisk())
                    ->url($this->profile_photo_path);
            } elseif (Gravatar::exists($this->email)) {
                return Gravatar::url($this->email);
            }
        } catch (\Throwable $th) {
        }
        return $this->defaultProfilePhotoUrl();
    }

    public function isCompleted(): bool
    {
        if (empty($this->birth_date) || empty($this->sex) || $this->attributes()->count() < 5) {
            return false;
        }
        return true;
    }

    public function getAgeAttribute(): string | null
    {
        return !empty($this->birth_date) ?
        verta()->parse($this->birth_date)->diffYears() . ' ' . __('years old') :
        null;
    }
}
