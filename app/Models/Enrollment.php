<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\Pivot;


class Enrollment extends Pivot
{


    /**
     * The table associated with the model.
     *
     * @var string
     */


    protected $table = 'enrollments';

    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'user_id',
        'course_id',
        'enrolled_at',
        'completed_at'
    ];


    // If you don't use automatic ID and have a composite primary key.

    protected $primaryKey = [
        'user_id',
        'course_id'
    ];

    public $incrementing = false;

    protected $keyType = 'integer'; // Can be string or integer depending on the types of the keys.


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    /**
     * Get the user's progress for the enrolled course (as a percentage).
     *
     * @return float
     */

    public function getProgressPercentageAttribute()
    {

        // Get all classes of the course associated with this enrollment
    
        $totalLessons = $this->course->lessons->count();


        // If there are no classes in the course, progress is 0% (or 100% if it is a complete "empty" course)

        if ($totalLessons === 0) {
            return 0.0;
        }


        // Get the IDs of the lessons completed by the user in this course
        // We use the User's lessonProgress relationship, but filter for the current course.

        $completedLessonsCount = $this->user->lessonProgress
            ->where('completed', true)
            ->whereIn('lesson_id', $this->course->lessons->pluck('id'))
            ->count();


        // Calculate the percentage

        return round(($completedLessonsCount / $totalLessons) * 100, 2); // Rounds to 2 decimal places
    

    }


}