<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    public $timestamps = false;

    public function schedule() {
        return $this->hasOne(Schedule::class, 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'class_id');
    }

    public static function getSchoolClassById($id) {
        return SchoolClass::find($id);
    }
}
