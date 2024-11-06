<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [ ];

    public function course_category() {
        return $this->belongsTo(CourseCategory::class)->withDefault();
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }
    // public function users() {
    //     return $this->hasMany(User::class);
    // }
    public function videos() {
        return $this->hasMany(video::class);
    }
    public function assignments() {
        return $this->hasMany(Assignment::class);
    }


}
