<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    public $timestamps = false;

    /**
     *  Relation: A SchoolClass has one Schedule.
     */
    public function schedule() {
        return $this->hasOne(Schedule::class, 'id');
    }

    /**
     *  Relation: A SchoolClass belongs to one or more users.
     */
    public function user() {
        return $this->belongsTo(User::class, 'class_id');
    }

    public static function getSchoolClassById($id) {
        return SchoolClass::find($id);
    }
}
