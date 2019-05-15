<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $table = 'class';
    public $timestamps = false;

    public static function getSchoolClassById($id) {
        return SchoolClass::find($id);
    }
}
