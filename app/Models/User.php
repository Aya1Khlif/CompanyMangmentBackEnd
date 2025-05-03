<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Filament\Panel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function canAccessPanel(Panel $panel): bool
    {
        // return str_ends_with($this->email, '@admin.com') && $this->hasVerifiedEmail();
        return true;
    }


    // علاقة: مستخدم واحد يملك منتجات كتير
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    // علاقة: مستخدم واحد يملك خدمات كتير
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    // علاقة: مستخدم واحد يتعامل مع رسائل تواصل كتير
    public function contacts(): HasMany
    {
        return $this->hasMany(ContactUs::class);
    }
}
