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


    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }


    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')->withTimestamps();;
    }


    public function lessonProgress()
    {
        return $this->hasMany(UserLessonProgress::class);
    }


    /**
     * Check if the user is enrolled in a specific course.
     */

    public function isEnrolledIn(Course $course): bool
    {
        return $this->enrollments()->where('course_id', $course->id)->exists();
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