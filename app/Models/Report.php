<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'week_id',
        'student_id',
        'report_date',
        'traits',
        'hobbies',
        'manners',
        'relationships',
        'weakup',
        'classrooms',
        'notes',
        'openinos',
    ];

    public function week()
    {
        return $this->belongsTo('App\Models\Week','week_id');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student','student_id');
    }

    //    traits
    public function setTraitsAttribute($value)
    {
        $this->attributes['traits'] = json_encode($value);
    }

    public function getTraitsAttribute($value)
    {
        return $this->attributes['traits'] = json_decode($value);
    }


    //    manners
    public function setMannersAttribute($value)
    {
        $this->attributes['manners'] = json_encode($value);
    }

    public function getMannersAttribute($value)
    {
        return $this->attributes['manners'] = json_decode($value);
    }


    //    relationships
    public function setRelationshipsAttribute($value)
    {
        $this->attributes['relationships'] = json_encode($value);
    }

    public function getRelationshipsAttribute($value)
    {
        return $this->attributes['relationships'] = json_decode($value);
    }

    //    weakup
    public function setWeakupAttribute($value)
    {
        $this->attributes['weakup'] = json_encode($value);
    }

    public function getWeakupAttribute($value)
    {
        return $this->attributes['weakup'] = json_decode($value);
    }

    //    classrooms
    public function setClassroomsAttribute($value)
    {
        $this->attributes['classrooms'] = json_encode($value);
    }

    public function getClassroomsAttribute($value)
    {
        return $this->attributes['classrooms'] = json_decode($value);
    }
}
