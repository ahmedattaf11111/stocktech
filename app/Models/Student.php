<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = [];
    public function mediaManager()
    {
        return $this->belongsTo(MediaManager::class);
    }
    public function birth()
    {
        return $this->belongsTo(MediaManager::class);
    }
    public function national()
    {
        return $this->belongsTo(MediaManager::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes["password"] = Hash::make($value);
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [
            "id" => $this->id,
            "email" => $this->email,
            "name" => $this->name,
        ];
    }
}
