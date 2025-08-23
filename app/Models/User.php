<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{


    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'profile_picture_path',
        'terms_accepted_at'
    ];


    /**
     * The attributes that should be hidden for serialization
     *
     * @var list<string>
     */

    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Get the attributes that should be cast
     *
     * @return array<string, string>
     */

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Encrypt The Password
        ];
    }


    /**
     * Get the route key for the model.
     */

    public function getRouteKeyName(): string
    {
        return 'username';
    }


    /**
     * Get the URL for the user's profile image.
     *
     * @return string
     */

    public function getProfilePictureUrlAttribute(): string
    {
        if ($this->profile_picture_path) {
            return asset('storage/' . $this->profile_picture_path); // Returns The Path of The Stored Image.
        }

        return asset('images/aurora/default-profile.png'); // Returns The Default Image Path.
    }


}