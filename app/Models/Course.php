<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Course extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'title',
        'description',
        'level',
        'language',
        'duration',
        'slug',
        'thumbnail_path', // Course Image URL.
        'is_published'
    ];


    /**
     * The attributes that should be cast to native types.
     */

    protected $casts = [
        'is_published' => 'boolean'
    ];


    /**
    * Get the route key for the model.
    *
    * @return string
    */

    public function getRouteKeyName()
    {
        return 'slug';
    }


    /**
     * Get the URL of the course thumbnail.
     *
     * @return string
     */

    public function getCourseThumbnailUrlAttribute(): string
    {
        if ($this->thumbnail_path) {
            return asset('storage/' . $this->thumbnail_path); // Returns The Path of The Stored Image.
        }

        return asset('images/aurora/default-course.png'); // Returns The Default Image Path.
    }


}